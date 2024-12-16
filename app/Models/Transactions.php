<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
  protected $fillable = [
    'entry_id',
    'reference_id',
    'reference_type',
    'account_id',
    'debit',
    'credit',
    'billing_month',
    'description',
  ];
}



?>
