<?php

namespace App\Livewire;

use App\Models\Lesson;
use App\Models\Blueprint;
use Livewire\Component;

class LessonCard extends Component
{
    public $lesson;
    public $blueprints;
    public $link;
    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
        $this->blueprints = Blueprint::all();
    }

    public function addBlueprint(Blueprint $blueprint)
    {
        $this->lesson->blueprint()->attach($blueprint->id);
    }



    public function change(Lesson $lesson, $change)
    {
        $lesson->status = $change;
        $lesson->save();

        $lesson->refresh();

        $this->render();
    }

    public function saveLink()
    {
        $this->validate([
            'link' => 'required|url'
        ]);

        $this->lesson->link = $this->link;
        $this->lesson->save();
    }

    public function render()
    {

        $this->lesson = Lesson::find($this->lesson->id);
        return view('livewire.lesson-card');
    }

}
