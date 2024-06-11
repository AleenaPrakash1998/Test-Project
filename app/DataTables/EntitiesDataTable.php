<?php

namespace App\DataTables;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EntitiesDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pages.entities._columns.action')
            ->addColumn('menu', 'pages.entities._columns.menu')
            ->rawColumns(['action', 'menu'])
            ->setRowId('id');
    }

    public function query(Entity $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('entities-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'bSort' => false,
            ]);
    }


    public function getColumns(): array
    {
        return [
            Column::make('name')->orderable(false),
            Column::make('theme_id')->title('theme')->orderable(false),
            Column::make('menu')->orderable(false),
            Column::make('api_key')->orderable(false),
            Column::make('reference_key')->orderable(false),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center'),

        ];
    }

    protected function filename(): string
    {
        return 'Entities_' . date('YmdHis');
    }
}
