<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class ViewStudent extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }



    public function render()
    {
        return view('livewire.admin.view-student')
            ->layout('layouts.app');;
    }
}
