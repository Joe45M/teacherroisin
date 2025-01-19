<?php

namespace App\Livewire\Admin;

use App\Models\Lesson;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AdminHome extends Component
{
    public $classesToday;


    public function render()
    {

        $this->classesToday = Lesson::whereDate('lesson_at', '>', Carbon::now()->startOfDay()->addMinute())
            ->whereDate('lesson_at', '<=', Carbon::now()->endOfDay()->addMinute())
            ->whereIn('status', ['confirmed', 'unconfirmed'])
            ->get();

        return view('livewire.admin.admin-home', [
            'users' => User::all(),
        ])->layout('layouts.app');
    }
}
