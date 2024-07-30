<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VendorUserDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pages.vendors._columns.action')
            ->rawColumns(['action', 'profile'])
            ->setRowId('id');
    }


    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'vendor');
            });
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendor-user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'bSort' => false,
            ]);
    }


    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('email')->orderable(false),
            Column::computed('action')
                ->exportable(false)
                ->orderable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }


    protected function filename(): string
    {
        return 'VendorUser_' . date('YmdHis');
    }
}
