<?php

namespace App\Http\Livewire\Theme;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class ThemeTable extends DataTableComponent
{

    public string $defaultSortColumn = 'name';
    public string $defaultSortDirection = 'asc';
    public bool $perPageAll = true;

    public array $bulkActions = [
        'destroySelected' => 'Delete Selected',
    ];

    protected int $index = 0;
    public string $primaryKey = "theme_id";

    public function destroySelected()
    {
        Theme::whereIn($this->primaryKey, $this->selectedRowsQuery()->pluck($this->primaryKey))->delete();
        $this->emit("showToast", ["message" => "Themes Deleted Successfully", "type"=>"success"]);
    }


    public function columns(): array
    {
        if ($this->page > 1) {
            $this->index = ($this->page - 1) * $this->perPage;
        } else {
            $this->index = 0;
        }

        return [
            Column::make(__('No.'))->format(function () {
                return ++$this->index;
            }),
            Column::make('Name')
                ->searchable()
                ->sortable(),
            Column::make('Key')
                ->searchable()
                ->sortable(),
            Column::make("Action")
                ->asHtml()
                ->addClass("text-center")
                ->format(function (Theme $row) {
                    return view('livewire.theme.action', compact('row'));
                }),
        ];
    }

    public function query(): Builder
    {
        return Theme::query();
    }
}
