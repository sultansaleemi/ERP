<?php

namespace App\Repositories;

use App\Models\RiderInvoices;
use App\Repositories\BaseRepository;

class RiderInvoicesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'inv_date',
        'rider_id',
        'vendor_id',
        'zone',
        'login_hours',
        'working_days',
        'perfect_attendance',
        'rejection',
        'performance',
        'off',
        'month_invoice',
        'descriptions',
        'total_amount',
        'billing_month',
        'gaurantee',
        'notes'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return RiderInvoices::class;
    }
}
