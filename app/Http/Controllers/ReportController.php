<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryOrder;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from
            ? Carbon::parse($request->from)->startOfDay()
            : now()->startOfMonth();

        $to = $request->to
            ? Carbon::parse($request->to)->endOfDay()
            : now()->endOfMonth();

        $orders = LaundryOrder::with('customer')
    ->whereBetween('created_at', [$from, $to])
    ->orderBy('created_at', 'desc')
    ->get();

        return view('reports.index', [
            'orders'            => $orders,
            'from'              => $from->toDateString(),
            'to'                => $to->toDateString(),
            'totalOrder'        => $orders->count(),
            'totalBerat'        => $orders->sum('berat'),
            'totalPendapatan'   => $orders->sum('total_harga'),
        ]);
    }
}
