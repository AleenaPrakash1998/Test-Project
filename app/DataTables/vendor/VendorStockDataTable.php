<?php

namespace App\DataTables\vendor;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorStockDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'vendors.stocks._columns.action')
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id', Auth::id());
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
        return 'VendorStock_' . date('YmdHis');
    }
}
