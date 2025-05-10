<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SalikFineController extends Controller
{
    
    public function index()
    {
        return view('Salik_fines.index'); // blade file in resources/views/fines/salik.blade.php
    }
}
