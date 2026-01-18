<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryOrder;
use App\Models\Customer;
use App\Models\LaundryTrackingLog;
use App\Models\TrackingStatus;
use App\Models\Notification;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use App\Models\LaundryTrackingHistory;
use Illuminate\Support\Str;
use App\Models\Laundry;

class LaundryOrderController extends Controller
{
    // LIST ORDER
    public function index()
    {
        $orders = LaundryOrder::with('customer')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    // FORM TAMBAH ORDER
    public function create()
{
    $laundries = Laundry::all();

    return view('orders.create', compact('laundries'));
}

    // SIMPAN ORDER
    public function store(Request $request)
{
    $request->validate([
        'nama_customer' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'tanggal_masuk' => 'required|date',
        'estimasi_selesai' => 'required|date',
        'berat' => 'required|numeric|min:0.1',
        'laundry_id' => 'required|exists:laundries,id',
    ]);

    // CUSTOMER
    $customer = Customer::create([
        'name' => $request->nama_customer,
        'telp' => $request->no_hp,
        'alamat' => $request->alamat,
    ]);

    // LAUNDRY + HARGA
    $laundry = Laundry::findOrFail($request->laundry_id);
    $totalHarga = $request->berat * $laundry->harga_per_kg;

    // STATUS AWAL
    $statusAwal = TrackingStatus::where('urutan', 1)->first();

    // ORDER
    $order = LaundryOrder::create([
    'customer_id' => $customer->id,
    'user_id' => auth()->id(),
    'laundry_id' => $laundry->id,
    'berat' => $request->berat, 
    'tracking_code' => 'TRK-' . time(),
    'tanggal_masuk' => $request->tanggal_masuk,
    'estimasi_selesai' => $request->estimasi_selesai,
    'total_harga' => $totalHarga,
    'status' => strtolower($statusAwal->nama_status),
]);

    // TRACKING PERTAMA
    LaundryTrackingHistory::create([
        'laundry_order_id' => $order->id,
        'tracking_status_id' => $statusAwal->id,
        'keterangan' => 'Order diterima'
    ]);

    return redirect()->route('orders.index')
        ->with('success', 'Order berhasil ditambahkan');
}

    // TRACKING (ADMIN)
    public function tracking(LaundryOrder $order)
{
    // ambil semua riwayat tracking
    $logs = $order->trackingHistories()
        ->with('status')
        ->orderBy('created_at')
        ->get();

    // status terakhir
    $lastLog = $logs->last();

    // semua status (Diterima, Diproses, dst)
    $trackingStatuses = TrackingStatus::orderBy('urutan')->get();

    // urutan aktif sekarang
    $currentUrutan = $lastLog?->status->urutan ?? 1;

    return view('orders.tracking', compact(
        'order',
        'logs',
        'lastLog',
        'trackingStatuses',
        'currentUrutan'
    ));
}

    // UPDATE STATUS
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'tracking_status_id' => 'required|exists:tracking_statuses,id',
        'catatan' => 'nullable|string'
    ]);

    $order = LaundryOrder::findOrFail($id);

    // Ambil status dari tabel tracking_statuses
    $status = TrackingStatus::find($request->tracking_status_id);

    // Update status TERKINI di order
    $order->status = strtolower($status->nama_status);
    $order->save();

    // SIMPAN RIWAYAT TRACKING
    LaundryTrackingHistory::create([
        'laundry_order_id' => $order->id,
        'tracking_status_id' => $status->id,
        'keterangan' => $request->catatan ?? 'Status diperbarui'
    ]);

Notification::create([
    'order_id'    => $order->id,
    'customer_id' => $order->customer_id,
    'title'       => 'Update Status Laundry',
    'pesan'       => 'Order ' . $order->tracking_code .
                    ' sekarang ' . strtoupper($status->nama_status),
    'is_read'     => false
]);

    return back()->with('success', 'Status laundry berhasil diperbarui');
}

    // CEK TRACKING (PUBLIC)
    public function cek(Request $request)
{
    $order = null;

    if ($request->filled('kode')) {
        $order = LaundryOrder::with('customer')
            ->where('tracking_code', $request->kode)
            ->first();
    }

    return view('tracking-public', compact('order'));
}


    // CETAK STRUK + QR CODE
public function print(LaundryOrder $order)
{
    $order->load('customer');

    $qrText =
        "NIA LAUNDRY\n" .
        "-----------------------\n" .
        "Kode   : {$order->tracking_code}\n" .
        "Nama   : {$order->customer->name}\n" .
        "Berat  : {$order->berat} Kg\n" .
        "Total  : Rp" . number_format($order->total_harga, 0, ',', '.') . "\n" .
        "Masuk  : " . date('d-m-Y', strtotime($order->tanggal_masuk)) . "\n" .
        "Ambil  : " . date('d-m-Y', strtotime($order->estimasi_selesai)) . "\n" .
        "Status : " . strtoupper($order->status) . "\n" .
        "-----------------------\n" .
        "Simpan struk ini\n" .
        "sebagai bukti";

    $qr = QrCode::format('svg')
    ->size(200)
    ->generate(url('/tracking/' . $order->tracking_code));

    return view('orders.print', compact('order', 'qr'));
}

public function destroy(LaundryOrder $order)
{
    $order->delete();

    return redirect('/orders')->with('success', 'Order berhasil dihapus');
}

}