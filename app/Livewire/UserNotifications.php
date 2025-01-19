<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserNotifications extends Component
{
    public $notifications;

    public function render()
    {

        $this->notifications = Auth::user()->unreadNotifications;

        return view('livewire.user-notifications');
    }


    public function open($route, $notification)
    {

        foreach (Auth::user()->notifications as $notif) {
            if ($notif->id === $notification['id']) {
                $notif->markAsRead();
            }
        }

        return $this->redirect(route($route));
    }
}
