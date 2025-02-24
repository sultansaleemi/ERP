<?php

namespace App\DataTables;

use App\Helpers\Common;
use App\Models\Transactions;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\DB;

class LedgerDataTable extends DataTable
{
  /**
   * Build DataTable class.
   */
  public function dataTable($query)
  {
    $transactions = $query->get(); // Fetch the actual transactions
    $openingBalance = $this->getOpeningBalance();

    $data = [];
    $runningBalance = $openingBalance;

    // Add Balance Forward row at the top
    $data[] = [
      'date' => '',
      'account_name' => '',
      'billing_month' => '',
      'voucher' => '',
      'narration' => '<b>Balance Forward</b>',
      'debit' => '',
      'credit' => '',
      'balance' => number_format($openingBalance, 2),
    ];

    // Process transactions and maintain running balance
    foreach ($transactions as $row) {
      $runningBalance += $row->debit - $row->credit;
      $view_file = '';
      if ($row->voucher->attach_file) {
        $view_file = '  <a href="' . url('storage/vouchers/' . $row->voucher->attach_file) . '" class="no-print"  target="_blank">View File</a>';
      }
      $vouhcer_ID = $row->voucher->voucher_type . '-' . str_pad($row->voucher->id, '4', '0', STR_PAD_LEFT);
      $data[] = [
        'date' => Common::DateFormat($row->trans_date),
        'account_name' => $row->account->account_code . '-' . $row->account->name ?? 'N/A',
        'billing_month' => date('M Y', strtotime($row->billing_month)),
        'voucher' => '<span class="d-none">' . $vouhcer_ID . '</span><a href="' . route('vouchers.show', $row->voucher->id) . '" class="no-print" target="_blank">' . $vouhcer_ID . '</a>',
        'narration' => $row->narration . $view_file,
        'debit' => number_format($row->debit, 2),
        'credit' => number_format($row->credit, 2),
        'balance' => number_format($runningBalance, 2),
      ];
    }

    return datatables()->of($data)->rawColumns(['date', 'debit', 'credit', 'balance', 'voucher', 'narration']);
  }

  /**
   * Get query source of dataTable.
   */
  public function query(Transactions $model)
  {
    $query = $model->newQuery()->with(['account']);

    if (request('account')) {
      $query->where('account_id', request('account'));
    }

    if (request('month')) {
      $query->where('billing_month', request('month') . '-01');
    }

    return $query;
  }

  /**
   * Get Opening Balance before the selected date.
   */
  private function getOpeningBalance()
  {
    if (!request('month') || !request('account')) {
      return 0;
    }

    return Transactions::where('account_id', request('account'))
      ->whereDate('billing_month', '<', request(key: 'month') . '-01')
      ->sum(DB::raw("debit - credit"));
  }

  /**
   * Optional method if you want to use HTML builder.
   */
  public function html()
  {
    return $this->builder()
      ->columns($this->getColumns())
      ->minifiedAjax()
      ->parameters([
        'dom' => 'Bfrtip',
        'order' => [[0, 'asc']], // Order by date ascending
        'ordering' => false,
        'pageLength' => 50,
        'stateSave' => true, // Ensures balance maintains on pagination
        'responsive' => true,
        /* 'stateLoadCallback' => 'function(settings) {
                var savedState = localStorage.getItem(settings.sInstance);
                if (savedState) {
                    var state = JSON.parse(savedState);
                    state.length = 50; // Force default page length
                    state.orderable = false; // Force default page length
                    return state;
                }
                return null;
            }', */
        'buttons' => [
          // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
          ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
          //                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
        ],
      ]);
  }

  /**
   * Get columns.
   */
  protected function getColumns()
  {
    return [
      'date',
      'account_name' => ['title' => 'Account'],
      'billing_month' => ['title' => 'Month'],
      'voucher',
      'narration',
      'debit',
      'credit',
      'balance'
    ];
  }

  /**
   * Get filename for export.
   */
  protected function filename(): string
  {
    return 'ledger_datatable_' . time();
  }
}
