<?php

namespace App\Livewire;

use Livewire\Component;

class StudentLink extends Component
{

    public $student;

    public function render()
    {
        return view('livewire.student-link', [
            'untaken' => $this->student->lessons()->untaken()->orderBy('lesson_at')->limit(1)->get()
        ]);
    }
}
