<?php

namespace App\Repositories;

use App\Models\Vendor;
use App\Repositories\BaseRepository;

class VendorRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'contact_number',
        'company',
        'vendor_type'
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Vendor::class;
    }
}
