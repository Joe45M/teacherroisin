<?php

namespace App\Livewire\Admin;

use App\Models\Lesson;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AdminHome extends Component
{
    public $classesToday;
    public $users;
    public $search;

    // Method for searching by name and english_name
    public function searchUser()
    {
        return User::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('english_name', 'like', '%'.$this->search.'%')
                    ->get();
    }

    public function render()
    {
        $this->classesToday = Lesson::whereDate('lesson_at', '>', Carbon::now()->startOfDay()->addMinute())
            ->whereDate('lesson_at', '<=', Carbon::now()->endOfDay()->addMinute())
            ->whereIn('status', ['confirmed', 'unconfirmed'])
            ->get();

        // Adding users to the result
        $this->users = $this->searchUser();

        return view('livewire.admin.admin-home', [
            'users' => $this->users,
        ])->layout('layouts.app');
    }
}
