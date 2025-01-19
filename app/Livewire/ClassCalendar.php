<?php

namespace App\Livewire;

use App\Models\Slot;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Omnia\LivewireCalendar\LivewireCalendar;

class ClassCalendar extends LivewireCalendar
{

    public $time;
    public $timeObj;

    public $repeat = false;
    public $repeatFor = false;

    public $rhythm = [];

    public function SaveSlot()
    {


        if ($this->repeat) {
            foreach ($this->rhythm as $slot) {
                Slot::firstOrCreate([
                    'slot_at' => Carbon::parse($slot),
                ]);
            }
        }
    }

    public function generateRhythm()
    {

        $this->rhythm = [];

        if (!$this->repeat) {
            return false;
        }

        $i = 1;

        $latest = $this->timeObj;
        while ($i <= $this->repeatFor) {

            $now = CarbonImmutable::parse($this->timeObj);

            if ($i !== 1) {
                $this->rhythm[] = $now->addWeeks($i);
            } else {
                $this->rhythm[] = $now;

            }

            $i++;

        }

    }
    public function dateChange()
    {
        $this->timeObj = Carbon::parse($this->time);
    }


    public function events() : \Illuminate\Support\Collection
    {

        return Slot::query()
            ->get()
            ->map(function (Model $model) {
                return [
                    'id' => $model->id,
                    'title' => $model->slot_at->format('h:i'),
                    'description' => $model->status,
                    'date' => $model->slot_at,
                ];
            });
    }
}
