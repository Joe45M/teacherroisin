<?php

namespace App\Livewire\Admin;

use App\Models\Blueprint;
use Filament\Forms\Concerns\InteractsWithForms;
use Livewire\Component;

class AdminBlueprints extends Component
{

    public $unit;
    public $lesson;
    public $description;

    public $blueprints;

    public function render()
    {
        $this->blueprints = Blueprint::all();

        return view('livewire.admin.admin-blueprints')->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'lesson' => 'required',
            'unit' => 'required',
            'description' => 'required',
        ]);

        $blueprint = new Blueprint();
        $blueprint->lesson = $this->pull('lesson');
        $blueprint->unit = $this->pull('unit');
        $blueprint->description = $this->pull('description');
        $blueprint->save();
    }
}
