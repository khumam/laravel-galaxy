<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GalaxyCreateLivewire extends Component
{
    public $model;
    public $modelClass;
    public $fillable;

    public function mount()
    {
        $this->modelClass = new("\App\Models\\$this->model");
        $this->fillable = $this->modelClass->getFillable();
    }

    public function render()
    {
        return view('livewire.galaxy-create-livewire');
    }
}
