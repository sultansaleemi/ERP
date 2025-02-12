<?php

namespace App\Http\Controllers;

use App\DataTables\LedgerDataTable;
use App\Models\LedgerEntry;
use App\Models\Transactions;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class LedgerController extends Controller
{


  public function index(LedgerDataTable $LedgerDataTable)
  {
    /* $summary = null;
    if (request('account')) {

      if (request('billing_month')) {
        $summary = LedgerEntry::where('account_id', request('account_id'));
        $summary = $summary->where('billing_month', request('billing_month'));
        $summary = $summary->first();
      }

    } */

    return $LedgerDataTable->render('ledger.index');
  }

  public function ledger()
  {

    $transactions = Transactions::paginate(5);
    return view('ledger.ledger', compact('transactions'));
  }

}

