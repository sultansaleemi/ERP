<?php

namespace App\DataTables;

use App\Helpers\General;
use App\Models\Riders;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RidersDataTable extends DataTable
{
  /**
   * Build DataTable class.
   *
   * @param mixed $query Results from query() method.
   * @return \Yajra\DataTables\DataTableAbstract
   */
  public function dataTable($query)
  {
    $dataTable = new EloquentDataTable($query);

    $dataTable = $dataTable->addColumn('action', 'riders.datatables_actions');

    $dataTable
      ->addColumn('status', function (Riders $rider) {
        return '<span class="badge  bg-label-success">' . General::RiderStatus($rider->status) . '</span>';
      })
      ->toJson();
    $dataTable
      ->addColumn('name', function (Riders $rider) {
        return '<a href="' . route('riders.show', $rider->id) . '">' . $rider->name . '</a>';
      })
      ->toJson();
    $dataTable->rawColumns(['name', 'status', 'action']);
    return $dataTable;
  }

  /**
   * Get query source of dataTable.
   *
   * @param \App\Models\Riders $model
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function query(Riders $model)
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
      ->columns($this->getColumns())
      ->minifiedAjax()
      ->addAction(['width' => '120px', 'printable' => false])
      ->parameters([
        'dom' => 'Bfrtip',
        'stateSave' => false,
        'order' => [[0, 'desc']],
        'pageLength' => 100,
        'responsive' => true,
        'buttons' => [
          // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
        ],
      ]);
  }

  /**
   * Get columns.
   *
   * @return array
   */
  protected function getColumns()
  {
    return [
      'rider_id',  
      'name',
      'company_contact',
      'fleet_supervisor',
      'emirate_hub',
      'status'

    ];
  }

  /**
   * Get filename for export.
   *
   * @return string
   */
  protected function filename(): string
  {
    return 'riders_datatable_' . time();
  }
}
