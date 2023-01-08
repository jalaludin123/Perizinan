<?php

namespace App\DataTables;

use App\Models\Kbli4;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Kbli4DataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('golongan_3_id', function ($row) {
                return $row->kbli3->kode_kbli;
            })
            ->addColumn('action', function ($row) {
                return
                    '<div class="d-flex justify-content-between">
            <button class="btn btn-outline-warning me-2 action" data-id=' . $row->id . ' data-jenis="edit"><i class="fas fa-edit"></i></button>
            <button class="btn btn-outline-danger action" data-id=' . $row->id . ' data-jenis="delete"><i class="fas fa-trash"></i></button>
            </div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Kbli4 $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Kbli4 $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kbli4-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle();
        // ->buttons([
        //     Button::make('excel'),
        //     Button::make('csv'),
        //     Button::make('pdf'),
        //     Button::make('print'),
        //     Button::make('reset'),
        //     Button::make('reload')
        // ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false)->addClass('text-center'),
            Column::make('golongan_3_id')->title('Kode III')->width(70)->addClass('text-center'),
            Column::make('kode_kbli')->title('Kode IV')->width(70)->addClass('text-center'),
            Column::make('nama_kbli')->title('Nama'),
            Column::make('fungsi_kbli')->title('Fungsi')->width(450),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Kbli4_' . date('YmdHis');
    }
}