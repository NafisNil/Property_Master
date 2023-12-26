<?php

namespace App\DataTables;

use App\Models\AcademicYear;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AcademicYearsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($row) {
                return view('academical.academic-year.action', compact('row'));
            })->editColumn('is_default', function ($row) {
                if ($row->is_default) {
                    return html()->span('Default')->addClass('badge badge-success');
                }
                return '';
            });
    }

    public function query(AcademicYear $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('academic-years-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('start_date'),
            Column::make('end_date'),
            Column::make('is_default'),
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
    protected function filename()
    {
        return 'AcademicYear_' . date('YmdHis');
    }
}
