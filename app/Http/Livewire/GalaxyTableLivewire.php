<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class GalaxyTableLivewire extends DataTableComponent
{
    protected $index = 0;
    public $galaxyModel;
    protected $model;
    public bool $viewingModal = false;
    public $currentModal;
    public $selectedData;

    /**
     * Mount the class for the first time
     *
     * @return void
     */
    public function mount(): void
    {
        $this->model = new ("\\App\\Models\\$this->galaxyModel");
    }

    /**
     * Continuing mount the class
     *
     * @return void
     */
    public function hydrate(): void
    {
        $this->model = new ("\\App\\Models\\$this->galaxyModel");
    }

    /**
     * Datatable configuration
     *
     * @return void
     */
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    /**
     * List of displayed columns
     *
     * @return array
     */
    public function columns(): array
    {
        $galaxyModel = $this->galaxyModel;
        $columns = [Column::make("Id", "id")->format(fn() => ++$this->index + ($this->page - 1) * $this->perPage)];

        foreach ($this->model->getFillable() as $item) {
            if (!in_array($item, $this->model->getHidden())) {
                array_push($columns, Column::make($item, $item)->sortable()->searchable());
            }
        }

        array_push($columns, Column::make('Actions', 'id')->format(function ($value, $column, $row) use ($galaxyModel) {
            return view('components.galaxy.datatable.action', compact('galaxyModel', 'value'));
        }));

        return $columns;
    }

    /**
     * Modals view
     *
     * @return string
     */
    public function customView(): string
    {
        return 'components.galaxy.datatable.modal';
    }

    public function resetModal(): void
    {
        $this->reset('viewingModal', 'currentModal', 'selectedData');
    }

    public function viewModal($modelId): void
    {
        $this->viewingModal = true;
        $this->currentModal = $modelId;
        $this->selectedData = $this->model::where('id', $modelId)->first();
    }
}
