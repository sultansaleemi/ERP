<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CreateTenant extends Command
{
    protected $signature = 'tenant:create {name} {subdomain}';
    protected $description = 'Create a new tenant with a separate database';

    public function handle()
    {
        $name = $this->argument('name');
        $subdomain = $this->argument('subdomain');
        $databaseName = 'tenant_' . $subdomain;

        // Create database
        DB::statement("CREATE DATABASE IF NOT EXISTS {$databaseName}");

        // Save tenant details
        $tenant = Tenant::create([
            'name' => $name,
            'subdomain' => $subdomain,
            'database_name' => $databaseName,
            'database_user' => env('DB_USERNAME'),
            'database_password' => env('DB_PASSWORD'),
        ]);

        // Set tenant database connection
        Config::set('database.connections.tenant', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $databaseName,
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ]);

        // Connect to the tenant's database
        DB::purge('tenant');
        DB::setDefaultConnection('tenant');

        // Run migrations for the tenant's database
        $this->call('migrate');

        $this->info("Tenant {$name} created with database {$databaseName}");
    }
}