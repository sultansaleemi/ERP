<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
  public $table = 'accounts';

  public $fillable = [
    'account_code',
    'account_name',
    'account_type',
    'parent_account_id',
    'opening_balance'
  ];

  protected $casts = [
    'account_code' => 'string',
    'account_name' => 'string',
    'account_type' => 'string',
    'opening_balance' => 'decimal:2'
  ];

  public static array $rules = [

    'account_name' => 'required|string|max:100',
    'account_type' => 'required|string|max:50',
    'parent_account_id' => 'nullable',
    'opening_balance' => 'nullable|numeric'

  ];

  public function ledgerEntries()
  {
    return $this->hasMany(LedgerEntry::class);
  }

  public function transactions()
  {
    return $this->hasMany(Transactions::class);
  }


}
