<?php

namespace App\Http\Controllers;

use App\Models\LaundryOrder;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalOrders' => LaundryOrder::count(),
            'diproses'    => LaundryOrder::where('status', 'diproses')->count(),
            'selesai'     => LaundryOrder::where('status', 'selesai')->count(),

            'totalBerat'  => LaundryOrder::sum('berat'),
            'totalUang'   => LaundryOrder::sum('total_harga'),

            'orders'      => LaundryOrder::latest()->get()
        ]);
    }
}
