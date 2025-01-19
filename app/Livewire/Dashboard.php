<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;

class Dashboard extends Component
{

    #[Url]
    public $checkedOut = false;

    public function render()
    {

        $todayLesson = Auth::user()->lessons()
            ->whereBetween('lesson_at', [Carbon::now(), Carbon::now()->endOfDay()])
            ->get();

        return view('livewire.dashboard', [
            'user' => Auth::user(),
            'todayLessons' => $todayLesson,
        ]);
    }
}
