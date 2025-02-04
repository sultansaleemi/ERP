<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
  protected $fillable = [
    'trans_code',
    'reference_id',
    'reference_type',
    'account_id',
    'debit',
    'credit',
    'billing_month',
    'narration',
  ];

  function account()
  {
    return $this->hasOne(Accounts::class, 'id', 'account_id');
  }

}



?>
