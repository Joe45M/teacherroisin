<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;
use Omnia\LivewireCalendar\LivewireCalendar;

class AdminCalendar extends LivewireCalendar
{


    public $isModalOpen = false;

    public function onDayClick($year, $month, $day)
    {
        $this->isModalOpen = true;
    }


    public function events() : \Illuminate\Support\Collection
    {
        return collect([
            [
                'id' => 1,
                'title' => 'Lesson 1',
                'description' => 'PL1: greetings',
                'date' => Carbon::today(),
            ],
            [
                'id' => 2,
                'title' => 'Lesson 2',
                'description' => 'PL2: Numbers',
                'date' => Carbon::tomorrow(),
            ],
        ]);
    }
}
