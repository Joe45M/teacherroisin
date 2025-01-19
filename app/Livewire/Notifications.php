<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notifications extends Component
{

    public $notifications;

    public function render()
    {

        $this->notifications = Auth::user()->notifications;


        return view('livewire.notifications');
    }
}
