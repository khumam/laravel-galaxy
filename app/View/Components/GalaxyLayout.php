<?php

namespace App\View\Components;

use App\Services\GalaxyLoaderService;
use Illuminate\View\Component;
use Illuminate\View\View;

class GalaxyLayout extends Component
{
    public $models;
    public $model;
    /**
     * Create the component instance.
     */
    public function __construct(GalaxyLoaderService $galaxyLoaderService, string $model) {
        $this->models = $galaxyLoaderService->load();
        $this->model = $model;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.galaxy');
    }
}
