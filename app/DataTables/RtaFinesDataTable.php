<?php

namespace App\DataTables;

use App\Models\RtaFine;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RtaFinesDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addColumn('action', function ($fine) {
                return view('rta_fines.datatables_action', compact('fine'))->render();
            })
            ->addColumn('vehicle', function ($fine) {
                return '<a href="' . route('rta-fines.show', $fine->id) . '">' . e($fine->vehicle) . '</a>';
            })
            ->rawColumns(['vehicle', 'action']);
    }

    public function query(RtaFine $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '100px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[5, 'desc']], // order by date
                'buttons' => [
                    // Optional: Enable buttons
                    // ['extend' => 'excel'],
                    // ['extend' => 'print'],
                ],
            ]);
    }

    protected function getColumns()
    {
        return [
            'vehicle' => ['title' => 'Vehicle'],
            'ref_id' => ['title' => 'Ref .ID'],
            'collection_account' => ['title' => 'Collection Account'],
            'category' => ['title' => 'Category'],
            'exp_head' => ['title' => 'Exp. Head'],
            'fine_date' => ['title' => 'Date'],
            'exp_amount' => ['title' => 'Exp Amount'],
        ];
    }

    protected function filename(): string
    {
        return 'rta_fines_datatable_' . time();
    }
}
