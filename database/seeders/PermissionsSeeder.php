<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
       
      
            $permissions = [
                'dashboard_view',
                'item_view',
                'customers_view',
                'rider_view',
                'invoices_view',
                'activities_view',
                'bank_view',
                'leasing_view',
                'garage_view',
                'voucher_view',
                'bike_view',
                'gn_ledger',
                'sim_view',
                'accounts_view',
                'user_management_view',
                'company_settings_view',
                'department_view',       
                'dropdown_view',       
            ];
     
            
     
         // Create permissions
         foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        // Assign all permissions to Admin role
        $admin = Role::firstOrCreate(['name' => 'Super Admin']);
        $admin->givePermissionTo($permissions);
    }
    }

