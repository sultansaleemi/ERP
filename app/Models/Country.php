<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $table = 'country';

    public static function countries(){
        return self::all()->pluck('nicename','nicename');
    }
    public static function phonecode(){
        return self::all()->pluck('phonecode','nicename');
    }
   
}
