<?php

namespace App\Livewire\Admin;

use App\Models\Lesson;
use Livewire\Component;

class ClassList extends Component
{

    public $lessons;

    public function render()
    {

        $this->lessons = Lesson::all();

        return view('livewire.admin.class-list');
    }
}
