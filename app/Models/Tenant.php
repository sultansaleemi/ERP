<?php

// app/Models/Tenant.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'subdomain', 'database_name', 'database_user', 'database_password'];
}