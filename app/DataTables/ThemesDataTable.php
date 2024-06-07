<?php

namespace App\DataTables;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ThemesDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pages.themes._columns.action')
            ->addColumn('logo', 'pages.themes._columns.logo')
            ->addColumn('menu', 'pages.themes._columns.menu')
            ->rawColumns(['action', 'menu', 'logo'])
            ->setRowId('id');
    }


    public function query(Theme $model): QueryBuilder
    {
        return $model->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('themes-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }


    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('menu'),
            Column::make('logo'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }


    protected function filename(): string
    {
        return 'Themes_' . date('YmdHis');
    }
}
