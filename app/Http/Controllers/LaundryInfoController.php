<?php

namespace App\Http\Controllers;

use App\Models\Laundry;

class LaundryInfoController extends Controller
{
    public function index()
    {
        $laundry = Laundry::first(); // 1 laundry saja (sesuai sistem kecil)
        return view('laundry.info', compact('laundry'));
    }
}
