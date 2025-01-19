<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth; // Include Auth facade

class Onboarding extends Component
{
    public function onboard()
    {
        $user = Auth::user();
        $user->onboarded = true;
        $user->save();
    }

    public function render()
    {
        return view('livewire.onboarding');
    }
}
