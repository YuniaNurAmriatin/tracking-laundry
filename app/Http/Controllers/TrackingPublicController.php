<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryOrder;

class TrackingPublicController extends Controller
{
    public function index()
    {
        return view('tracking-public');
    }

    public function cek(Request $request)
    {
        $request->validate([
            'kode' => 'required'
        ]);

        $order = LaundryOrder::where('tracking_code', $request->kode)
            ->with(['customer', 'logs.status'])
            ->firstOrFail();

        return view('tracking-public', compact('order'));
    }
}
