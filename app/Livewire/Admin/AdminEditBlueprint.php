<?php

namespace App\Livewire\Admin;

use App\Models\Blueprint;
use Livewire\Component;

class AdminEditBlueprint extends Component
{
    public $blueprint;

    protected $rules = [
        'blueprint.unit' => 'required',
        'blueprint.lesson' => 'required',
        'blueprint.description' => 'required',
    ];

    public function mount(Blueprint $blueprint)
    {
        $this->blueprint = $blueprint;
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-blueprint');
    }

    public function save()
    {
        $this->blueprint->save();

        session()->flash('saved');
    }
}
