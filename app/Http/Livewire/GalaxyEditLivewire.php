<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GalaxyEditLivewire extends Component
{
    public $model;
    public $modelClass;
    public $fillable;
    public $data;

    public function mount()
    {
        $this->modelClass = new("\App\Models\\$this->model");
        $this->fillable = collect($this->modelClass->getFillable())->filter(fn($item) => !in_array($item, $this->modelClass->getHidden()));
    }

    public function render()
    {
        return view('livewire.galaxy-edit-livewire');
    }
}
