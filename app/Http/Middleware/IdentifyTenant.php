<?php

// app/Http/Middleware/IdentifyTenant.php
namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class IdentifyTenant
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0];

        // Find tenant by subdomain
        $tenant = Tenant::where('subdomain', $subdomain)->first();

        if (!$tenant) {
            abort(404, 'Tenant not found');
        }

        // Set tenant database connection
        Config::set('database.connections.tenant', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $tenant->database_name,
            'username' => $tenant->database_user,
            'password' => $tenant->database_password,
        ]);

        // Connect to the tenant's database
        DB::purge('tenant');
        DB::setDefaultConnection('tenant');

        // Store tenant in request for later use
        $request->attributes->set('tenant', $tenant);

        return $next($request);
    }
}