<?php

namespace App\Http\Livewire\InvitationGallery;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Artisan;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\InvitationGallery;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class InvitationGalleryTableData extends DataTableComponent
{


    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';
    public bool $perPageAll = true;

    public array $bulkActions = [
        'destroySelected' => 'Delete Selected',
    ];

    protected int $index = 0;
    public string $primaryKey = "id";

    public function destroySelected()
    {
        InvitationGallery::whereIn("id", $this->selectedRowsQuery()->pluck("id"))->delete();
        $this->emit("showToast", ["message" => "Users Deleted Successfully", "type"=>"success"]);
    }


    public function columns(): array
    {
//        if ($this->page > 1) {
//            $this->index = ($this->page - 1) * $this->perPage;
//        } else {
//            $this->index = 0;
//        }

        return [
//            Column::make(__('No.'))->format(function () {
//                return ++$this->index;
//            }),
            Column::make('Title','title')
                ->searchable()
                ->format(function (InvitationGallery $row) {
                    return empty($row->title) ? '-' : $row->title;
                })
                ->sortable(),
            Column::make('Desc', 'desc')
                ->searchable()
                ->format(function (InvitationGallery $row) {
                   return empty($row->desc) ? '-' : $row->desc;
                })
                ->sortable(),
            Column::make('Filename', 'filename')
                ->format(function (InvitationGallery $row) {
                    return $row->filename;
                })
                ->searchable()
                ->sortable(),
            Column::make('Created At', 'created_at')
                ->format(function (InvitationGallery $row) {
                    return $row->created_at;
                })
                ->searchable()
                ->sortable(),
            Column::make("Action")
                ->asHtml()
                ->addClass("text-center")
                ->format(function (InvitationGallery $row) {
                    return view('livewire.invitation-gallery.action', compact('row'));
                }),
        ];
    }

    public function query(): Builder
    {
        return InvitationGallery::query();
    }
}
