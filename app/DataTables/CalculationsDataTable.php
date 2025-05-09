<?php

namespace App\DataTables;

use App\Helpers\Common;
use App\Models\Calculations;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CalculationsDataTable extends DataTable
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

    $dataTable->editColumn('created_at', function (Calculations $Calculations) {
      return Common::DateTimeFormat($Calculations->created_at);
    })->toJson();
    $dataTable->addColumn('action', 'calculations.datatables_actions');
    return $dataTable;
  }

  /**
   * Get query source of dataTable.
   *
   * @param \App\Models\Calculations $model
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function query(Calculations $model)
  {
    if (auth()->user()->hasRole('User')) {
      return $model->newQuery()->where('user_id', auth()->user()->id)->orderByDesc('id');
    } else {
      return $model->newQuery()->with(relations: ['user']);
    }


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
        'stateSave' => true,
        'order' => [[0, 'desc']],
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
    if (auth()->user()->hasRole('User')) {
      return [
        'product_description' => ['title' => 'Product'],
        'grand_total' => ['title' => 'Total'],
        'created_at' => ['title' => 'Created At']

      ];
    } else {
      return [
        'id',
        'user.name' => ['title' => 'User'],
        'product_description' => ['title' => 'Product'],
        'grand_total' => ['title' => 'Total'],
        'created_at' => ['title' => 'Created At']

      ];
    }
  }

  /**
   * Get filename for export.
   *
   * @return string
   */
  protected function filename(): string
  {
    return 'calculations_datatable_' . time();
  }
}
