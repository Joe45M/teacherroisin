<?php

namespace App\Livewire;

use App\Models\Lesson;
use App\Models\Slot;
use App\Models\Token;
use App\Models\User;
use App\Notifications\NewClassNotification;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingEngine extends Component
{

    public Collection $selected;

    public $insuffient = false;
    public $booked = false;

    public function mount()
    {
        $this->selected = collect();
    }

    public function toggleSlot($slot)
    {
        if ($this->selected->contains($slot)) {
            foreach ($this->selected as $key => $sel) {
                if ($sel === $slot) {
                    $this->selected->forget($key);
                }
            }
        } else {
            $this->selected->push($slot);
        }
    }

    public function continueToBuy()
    {
        dd($this->selected);
    }

    public function confirmBooking()
    {


        if (Auth::user()->balance < $this->selected->count()) {
            $this->insuffient = true;

            return;
        } else {
            $this->insuffient = false;
        }

        $token = new Token();

        $token->token = $this->selected->count();
        $token->type = 'out';
        $token->note = 'class booking';
        $token->user_id = Auth::id();
        $token->save();

        foreach ($this->selected as $selected) {

            $slot = Slot::find($selected);
            $slot->booked_by_id = Auth::id();

            $class = new Lesson();
            $class->user_id = Auth::id();
            $class->lesson_at = $slot->slot_at;
            $class->status = 'unconfirmed';
            $class->save();

            $slot->class_id = $class->id;
            $slot->save();

            $slot->update(['status' => 'booked']);

            $admins = User::where('is_admin', 1)->get();

            $this->dispatch('booked');

            $admins->each(function ($admin) use ($class) {

                $admin->notify(new NewClassNotification($class));
            });
        }



        $this->booked = true;
    }

    public function render()
    {

        $slots = Slot::where('status', 'available')->get()
            ->groupBy(fn($pv) => $pv->slot_at->format('Y-m-d'));

        return view('livewire.booking-engine', [
            'slots' => $slots
        ]);
    }
}
