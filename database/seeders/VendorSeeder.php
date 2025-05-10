<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    public function run()
    {
        $vendors = [
            ['name' => 'Vendor One', 'contact_number' => '+971 50 111 2222', 'email' => 'vendor1@example.com', 'address' => '123 Vendor St, Dubai', 'vendor_type' => 'Company'],
            ['name' => 'Vendor Two', 'contact_number' => '+971 50 333 4444', 'email' => 'vendor2@example.com', 'address' => '456 Vendor Ave, Abu Dhabi', 'vendor_type' => 'Individual'],
            ['name' => 'Vendor Three', 'contact_number' => '+971 50 555 6666', 'email' => 'vendor3@example.com', 'address' => '789 Vendor Rd, Sharjah', 'vendor_type' => 'Company'],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}