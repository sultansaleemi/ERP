<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\LedgerEntry;
use App\Models\Transactions;
use Carbon\Carbon;

class TransactionService
{
  public function recordTransaction($data)
  {
    //$entry_id = \Str::uuid();
    //  transaction structure
    $transactionData = [
      'account_id' => $data['account_id'],
      'reference_id' => $data['reference_id'],
      'reference_type' => $data['reference_type'],
      'trans_code' => $data['trans_code'],
      'trans_date' => $data['trans_date'],
      'narration' => $data['narration'],
      'debit' => $data['debit'] ?? 0,
      'credit' => $data['credit'] ?? 0,
      'billing_month' => $data['billing_month'] ?? now(),
    ];

    // Save transaction
    $transaction = Transactions::create($transactionData);

    // Update ledger balances
    $this->updateLedger($transaction->account_id, $transaction->debit, $transaction->credit, $transaction->billing_month);

    return $transaction;
  }

  protected function updateLedger($accountId, $debit, $credit, $billing_month)
  {
    //$billing_month = Carbon::today();
    $ledger = LedgerEntry::where('account_id', $accountId)
      ->where('billing_month', $billing_month)
      ->first();

    if (!$ledger) {
      // Create a new ledger entry for billing_month
      $lastLedger = LedgerEntry::where('account_id', $accountId)
        ->orderBy('billing_month', 'desc')
        ->first();

      $openingBalance = $lastLedger ? $lastLedger->closing_balance : 0;

      $ledger = LedgerEntry::create([
        'account_id' => $accountId,
        'billing_month' => $billing_month,
        'debit_balance' => 0,
        'credit_balance' => 0,
        'opening_balance' => $openingBalance,
        'closing_balance' => $openingBalance,
      ]);
    }

    // Update ledger balances
    $ledger->debit_balance += $debit;
    $ledger->credit_balance += $credit;
    $ledger->closing_balance = $ledger->opening_balance + $ledger->debit_balance - $ledger->credit_balance;

    $ledger->save();
  }

  public function deleteTransaction($transactionId)
  {
    // Find the transaction by ID
    $transactions = Transactions::where('trans_code', $transactionId)->get();
    foreach ($transactions as $transaction) {
      if ($transaction) {
        // Get the related ledger entry
        $ledger = LedgerEntry::where('account_id', $transaction->account_id)
          ->where('billing_month', $transaction->billing_month)
          ->first();

        if ($ledger) {
          // Reverse the effect of the transaction on the ledger
          $ledger->debit_balance -= $transaction->debit;
          $ledger->credit_balance -= $transaction->credit;
          $ledger->closing_balance = $ledger->opening_balance + $ledger->debit_balance - $ledger->credit_balance;

          // Save the updated ledger
          $ledger->save();

          // Delete the transaction
          $transaction->delete();
        }
      }
    }


  }
}



?>
