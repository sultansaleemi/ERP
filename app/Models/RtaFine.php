<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RtaFine extends Model
{
    use HasFactory;

    protected $fillable = [
        'posted_date',
        'fine_date',
        'ref_id',
        'category',
        'surcharge_account',
        'cr_account',
        'vehicle',
        'employee',
        'expense_account',
        'debit_account',
        'allowed_amount',
        'exp_amount',
        'surcharge_amount',
        'total_chargeable',
        'remarks',
        'attachment'
    ];

    // If you want to use custom table name:
    // protected $table = 'rta_fines';

    // Optional: Accessors or relationships can be added here
}
