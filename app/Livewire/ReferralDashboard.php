<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class ReferralDashboard extends Component
{

    public $user;


    public function mount()
    {
        $this->user = Auth::user();

        if (!$this->user->referral_code) {
            $this->user->referral_code = Str::random('8');
            $this->user->save();
        }


    }

    public function render()
    {
        return view('livewire.referral-dashboard');
    }
}
