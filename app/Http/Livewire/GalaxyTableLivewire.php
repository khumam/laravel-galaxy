<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class GalaxyTableLivewire extends DataTableComponent
{
    protected $index = 0;
    public $galaxyModel;
    protected $model;

    public function mount(): void
    {
        $this->model = new ("\\App\\Models\\$this->galaxyModel");
    }

    public function hydrate(): void
    {
        $this->model = new ("\\App\\Models\\$this->galaxyModel");
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        $galaxyModel = $this->galaxyModel;
        $columns = [Column::make("Id", "id")->format(fn() => ++$this->index + ($this->page - 1) * $this->perPage)];

        foreach ($this->model->getFillable() as $item) {
            array_push($columns, Column::make($item, $item)->sortable());
        }

        array_push($columns, Column::make('Actions', 'id')->format(function ($value, $column, $row) use ($galaxyModel) {
            return view('components.datatable.action', compact('galaxyModel', 'value'));
        }));

        return $columns;
    }
}
