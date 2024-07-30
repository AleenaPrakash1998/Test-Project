<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StockDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pages.stocks._columns.action')
            ->rawColumns(['action', 'profile'])
            ->setRowId('id');
    }

    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendor-stock-table')
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
            Column::make('quantity'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->addClass('text-center'),

        ];
    }

    protected function filename(): string
    {
        return 'Stock_' . date('YmdHis');
    }
}
