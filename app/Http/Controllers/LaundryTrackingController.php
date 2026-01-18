<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryOrder;

class LaundryTrackingController extends Controller
{
    public function index()
    {
        return view('tracking.index');
    }

    public function show(Request $request)
    {
        $request->validate([
            'kode_order' => 'required'
        ]);

        $order = LaundryOrder::with([
            'customer',
            'items',
            'trackingLogs.status'
        ])->where('kode_order', $request->kode_order)->first();

        if (!$order) {
            return back()->with('error', 'Kode order tidak ditemukan');
        }

        return view('tracking.show', compact('order'));
    }
}