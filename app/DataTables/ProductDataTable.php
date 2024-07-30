<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('user_id', 'pages.products._columns.vendor_id')
            ->addColumn('action', 'pages.products._columns.action')
            ->rawColumns(['action', 'profile', 'vendor_id'])
            ->setRowId('id');
    }

    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()->with(['vendor']);
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
            Column::make('price'),
            Column::make('weight'),
            Column::make('vendor.name'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->addClass('text-center'),

        ];
    }

    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
