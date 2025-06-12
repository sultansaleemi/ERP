<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:255|unique:tenants,subdomain',
            'database_name' => 'required|string|max:255',
            'database_user' => 'required|string|max:255',
            'database_password' => 'required|string|max:255',
        ]);

        $tenant = Tenant::create([
            'name' => $request->name,
            'subdomain' => $request->subdomain,
            'database_name' => $request->database_name,
            'database_user' => $request->database_user,
            'database_password' => $request->database_password,
        ]);

        // Set tenant database connection
        Config::set('database.connections.tenant', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => $tenant->database_name,
            'username' => $tenant->database_user,
            'password' => $tenant->database_password,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);

        DB::purge('tenant');
        DB::setDefaultConnection('tenant');

        // Run migrations for the tenant's database
        \Artisan::call('migrate', ['--database' => 'tenant', '--force' => true]);

        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully.');
    }

    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:255|unique:tenants,subdomain,' . $tenant->id,
            'database_name' => 'required|string|max:255',
            'database_user' => 'required|string|max:255',
            'database_password' => 'required|string|max:255',
        ]);

        $tenant->update([
            'name' => $request->name,
            'subdomain' => $request->subdomain,
            'database_name' => $request->database_name,
            'database_user' => $request->database_user,
            'database_password' => $request->database_password,
        ]);

        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully.');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully.');
    }

    public function show(Tenant $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }
}