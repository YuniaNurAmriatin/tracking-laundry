@extends('layouts.dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    <div class="bg-pink-100 border-l-4 border-pink-500 p-6 rounded-xl shadow">
        <h3 class="text-sm text-gray-600">Total Order</h3>
        <p class="text-3xl font-bold text-pink-700">
            {{ $totalOrders }}
        </p>
    </div>

    <div class="bg-yellow-100 border-l-4 border-yellow-500 p-6 rounded-xl shadow">
        <h3 class="text-sm text-gray-600">Sedang Diproses</h3>
        <p class="text-3xl font-bold text-yellow-700">
            {{ $diproses }}
        </p>
    </div>

    <div class="bg-green-100 border-l-4 border-green-500 p-6 rounded-xl shadow">
        <h3 class="text-sm text-gray-600">Selesai</h3>
        <p class="text-3xl font-bold text-green-700">
            {{ $selesai }}
        </p>
    </div>

</div>

{{-- TOTAL BERAT & UANG --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

    <div class="bg-blue-100 border-l-4 border-blue-500 p-6 rounded-xl shadow">
        <h3 class="text-sm text-gray-600">Total Berat</h3>
        <p class="text-2xl font-bold text-blue-700">
            {{ $totalBerat }} Kg
        </p>
    </div>

    <div class="bg-purple-100 border-l-4 border-purple-500 p-6 rounded-xl shadow">
        <h3 class="text-sm text-gray-600">Total Pendapatan</h3>
        <p class="text-2xl font-bold text-purple-700">
            Rp{{ number_format($totalUang, 0, ',', '.') }}
        </p>
    </div>

</div>

{{-- TABEL ORDER --}}
<div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-lg font-semibold mb-4">Data Semua Order</h3>

    <table class="w-full border">
        <thead class="bg-gray-100 text-sm">
            <tr>
                <th class="p-2 text-left">Kode</th>
                <th class="p-2 text-left">Customer</th>
                <th class="p-2 text-center">Berat</th>
                <th class="p-2 text-right">Total</th>
                <th class="p-2 text-center">Status</th>
                <th class="p-2 text-center">Tanggal</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @forelse ($orders as $order)
            <tr class="border-t">
                <td class="p-2">{{ $order->tracking_code }}</td>
                <td class="p-2">{{ $order->customer->name ?? '-' }}</td>
                <td class="p-2 text-center">{{ $order->berat }} Kg</td>
                <td class="p-2 text-right">
                    Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                </td>
                <td class="p-2 text-center uppercase">
                    {{ $order->status }}
                </td>
                <td class="p-2 text-center">
                    {{ $order->created_at->format('d-m-Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-gray-500">
                    Belum ada data order
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
