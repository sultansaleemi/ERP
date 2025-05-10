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
    'ref_name',
    'ref_id',
    'status',
    'notes',
    'opening_balance'
  ];

  protected $casts = [
    'account_code' => 'string',
    'name' => 'string',
    'account_type' => 'string',
    'opening_balance' => 'decimal:2'
  ];

  public static array $rules = [

    'account_code' => 'nullable|string|max:100',
    'name' => 'required|string|max:100',
    'account_type' => 'required|string|max:50',
    'parent_id' => 'nullable',
    'opening_balance' => 'nullable|numeric'

  ];


  function createDynamicAccount($childName, $groupName, $accountType = 'Liability', $refName = null, $refId = null, $openingBalance = 0) {
    // Step 1: Create or get the parent group account (like 'Suppliers', 'Vendors', etc.)
    $parent = Accounts::firstOrCreate(
        ['name' => $groupName, 'parent_id' => null],
        [
            'account_code' => generateNextAccountCode(null),
            'account_type' => $accountType,
            'status' => 'Active',
            'opening_balance' => 0
        ]
    );

    // Step 2: Create or get the child account under that group
    $existing = Accounts::where('name', $childName)
        ->where('parent_id', $parent->id)
        ->first();

    if (!$existing) {
        Accounts::create([
            'account_code' => generateNextAccountCode($parent->id),
            'name' => $childName,
            'account_type' => $accountType,
            'status' => 'Active',
            'parent_id' => $parent->id,
            'ref_name' => $refName,
            'ref_id' => $refId,
            'opening_balance' => $openingBalance,
        ]);
    }
}

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

  public static function dropdown($parent_id)
  {
    if ($parent_id) {
      $query = self::select('id', \DB::raw("CONCAT(account_code, '-', name) as full_name"))->where('parent_id', $parent_id)->pluck('full_name', 'id')->prepend('Select', '');
    } else {
      $query = self::select('id', \DB::raw("CONCAT(account_code, '-', name) as full_name"))->whereNotNull('parent_id')->pluck('full_name', 'id')->prepend('Select', '');
    }
    //return self::select('id', 'plate')->pluck('plate', 'id')->prepend('Select', '');
    return $query;

  }

  public static function customDropdown($accountIds)
  {

    $query = self::select('id', \DB::raw("CONCAT(account_code, '-', name) as full_name"))->whereIn('id', $accountIds)->pluck('full_name', 'id');


    return $query;

  }

}
