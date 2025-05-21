<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function rtaIndex()
    {
        return view('fines.rta'); // blade file in resources/views/fines/rta.blade.php
    }

    public function salikIndex()
    {
        return view('fines.salik'); // blade file in resources/views/fines/salik.blade.php
    }
}
