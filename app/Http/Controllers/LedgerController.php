<?php

namespace App\Http\Controllers;

use App\DataTables\LedgerDataTable;
use App\Models\Transactions;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class LedgerController extends Controller
{


  public function index(LedgerDataTable $LedgerDataTable)
  {

    return $LedgerDataTable->render('ledger.index');
  }

  public function getLedgerData(Request $request)
  {
    $query = Transactions::with(['account']) // Assuming relationship with Account
      ->select('transactions.*');

    // Apply Date Range Filter
    if ($request->has('start_date') && $request->has('end_date')) {
      $query->whereBetween('billing_month', [$request->start_date, $request->end_date]);
    }

    return DataTables::of($query)
      ->addColumn('account_name', function ($row) {
        return $row->account->name ?? 'N/A'; // Show account name
      })
      ->addColumn('debit', function ($row) {
        return $row->type === 'debit' ? number_format($row->amount, 2) : '-';
      })
      ->addColumn('credit', function ($row) {
        return $row->type === 'credit' ? number_format($row->amount, 2) : '-';
      })
      ->addColumn('balance', function ($row) {
        static $balance = 0;
        $balance += ($row->type === 'debit' ? $row->amount : -$row->amount);
        return number_format($balance, 2);
      })
      ->rawColumns(['debit', 'credit', 'balance'])
      ->make(true);
  }
}


?>
