<?php

namespace App\DataTables;

use App\Models\Transactions;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LedgerDataTable extends DataTable
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
    $dataTable->addColumn('account_name', function ($row) {
      return $row->account->name ?? 'N/A'; // Show account name
    })
      ->addColumn('debit', function ($row) {
        return number_format($row->debit, 2) ?? '-';
      })
      ->addColumn('credit', function ($row) {
        return number_format($row->credit, 2) ?? '-';
      })
      ->addColumn('balance', function ($row) {
        $balance = 0;/*  Transactions::where('account_id', $row->account_id)
->whereDate('billing_month', '<', $row->billing_month)
->sum(\DB::raw("debit - credit")); */
        $balance += $row->debit;
        $balance -= $row->credit;
        return number_format($balance, 2);
      });

    $dataTable->rawColumns(['debit', 'credit', 'balance']);

    return $dataTable;
  }

  /**
   * Get query source of dataTable.
   *
   * @param \App\Models\Departments $model
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function query(Transactions $model)
  {
    $model = $model->newQuery()->with(['account']);

    if (request('month')) {
      //$model = $model->where(\DB::raw('DATE_FORMAT(billing_month, "%Y-%m")'), '=', request('month'));
      $model = $model->where('billing_month', request('month'));
    }

    if (request('account')) {
      $model = $model->where('account_id', request('account'));
    }
    return $model;
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
      //->addAction(['width' => '120px', 'printable' => false])
      ->parameters([
        'dom' => 'Bfrtip',
        'stateSave' => true,
        'order' => [[0, 'desc']],
        "ordering" => false,
        //"pageLength" => 5, // Set default page length
        //"lengthMenu" => [[10, 25, 50, 100], [10, 25, 50, 100]], // Custom length menu
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
      'account_name',
      'debit',
      'credit',
      'balance'


    ];
  }

  /**
   * Get filename for export.
   *
   * @return string
   */
  protected function filename(): string
  {
    return 'ledger_datatable_' . time();
  }
}
