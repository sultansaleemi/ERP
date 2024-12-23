<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
  public $table = 'accounts';

  public $fillable = [
    'account_code',
    'name',
    'account_type',
    'parent_id',
    'opening_balance'
  ];

  protected $casts = [
    'account_code' => 'string',
    'name' => 'string',
    'account_type' => 'string',
    'opening_balance' => 'decimal:2'
  ];

  public static array $rules = [

    'account_code' => 'required|string|max:100',
    'name' => 'required|string|max:100',
    'account_type' => 'required|string|max:50',
    'parent_id' => 'nullable',
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

  public function parent()
  {
    return $this->belongsTo(self::class, 'parent_id');
  }
  public function children()
  {
    return $this->hasMany(self::class, 'parent_id')->with('children'); // Recursive relationship
  }



}
