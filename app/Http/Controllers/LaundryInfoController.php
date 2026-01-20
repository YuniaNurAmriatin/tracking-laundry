<?php

namespace App\Http\Controllers;

use App\Models\Laundry;

class LaundryInfoController extends Controller
{
    public function index()
    {
        $laundry = Laundry::first(); 
        return view('laundry.info', compact('laundry'));
    }
}
