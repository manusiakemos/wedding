<?php

namespace App\Http\Livewire\User;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class UserTable extends DataTableComponent
{

    public string $defaultSortColumn = 'name';
    public string $defaultSortDirection = 'asc';
    public bool $perPageAll = true;

    public array $bulkActions = [
        'destroySelected' => 'Delete Selected',
    ];

    protected int $index = 0;
    public string $primaryKey = "user_id";

    public function destroySelected()
    {
        User::whereIn("user_id", $this->selectedRowsQuery()->pluck("user_id"))->delete();
        $this->emit("showToast", ["message" => "Users Deleted Successfully", "type"=>"success"]);
    }

    public function filters(): array
    {
        return [
            'role' => Filter::make('User Level')
                ->select([
                    '' => 'Any',
                    "super-admin" => 'Super Admin',
                    "admin" => 'Admin',
                ]),
        ];
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
            Column::make('Username')
                ->searchable()
                ->sortable(),
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Role', 'role')
                ->searchable()
                ->sortable(),
            Column::make("Action")
                ->asHtml()
                ->addClass("text-center")
                ->format(function (User $row) {
                    return view('livewire.user.action', compact('row'));
                }),
        ];
    }

    public function query(): Builder
    {
        return User::query()
            ->when($this->getFilter('role'), function ($query, $role) {
                return $query->where('role', $role);
            });
    }
}
