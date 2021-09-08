<?php

namespace App\Http\Livewire\Invitation;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Invitation;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class InvitationTable extends DataTableComponent
{

    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'asc';
    public bool $perPageAll = true;

    public array $bulkActions = [
        'destroySelected' => 'Delete Selected',
    ];

    protected int $index = 0;
    public string $primaryKey = "id";

    public function destroySelected()
    {
        Invitation::whereIn("id", $this->selectedRowsQuery()->pluck("id"))->delete();
        $this->emit("showToast", ["message" => "Invitations Deleted Successfully", "type" => "success"]);
    }

    /*public function filters(): array
    {
        return [
            'role' => Filter::make('Invitation Level')
                ->select([
                    '' => 'Any',
                    "super-admin" => 'Super Admin',
                    "admin" => 'Admin',
                ]),
        ];
    }*/


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
            Column::make('URL', 'invitation_url')
                ->searchable()
                ->asHtml()
                ->format(function ($row) {
                    return "<a class='text-red-400 hover:underline hover:text-red-500'
                    target='_blank'
                    href='" . route('wedding', $row->invitation_url) . "'>$row->invitation_url</a>";
                })
                ->sortable(),
            Column::make('Username', 'user.username')
                ->format(function ($row) {
                    return $row->user->username;
                }),
            Column::make('Theme', 'theme.name')
                ->format(function ($row) {
                    return $row->theme->name;
                }),
            Column::make("Action")
                ->asHtml()
                ->addClass("text-center")
                ->format(function (Invitation $row) {
                    return view('livewire.invitation.action', compact('row'));
                }),
        ];
    }

    public function query(): Builder
    {
        return Invitation::query()->with(['theme', 'user']);
    }
}
