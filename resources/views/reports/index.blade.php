@extends('layouts.dashboard')

@section('title', 'Laporan Laundry')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-pink-600">Laporan Laundry</h1>
    <p class="text-sm text-gray-500">Data transaksi berdasarkan periode tanggal</p>
</div>

<!-- FILTER -->
<form method="GET"
      class="bg-white p-4 rounded-lg shadow mb-6 flex items-end gap-3">

    <!-- Dari Tanggal -->
    <div class="flex flex-col justify-end">
        <label class="text-xs text-gray-600 mb-1 h-4">
            Dari Tanggal
        </label>
        <input type="date"
               name="from"
               value="{{ request('from') }}"
               class="border rounded-md px-3 text-sm h-10 w-44
                      focus:ring-pink-500 focus:border-pink-500">
    </div>

    <!-- Sampai Tanggal -->
    <div class="flex flex-col justify-end">
        <label class="text-xs text-gray-600 mb-1 h-4">
            Sampai Tanggal
        </label>
        <input type="date"
               name="to"
               value="{{ request('to') }}"
               class="border rounded-md px-3 text-sm h-10 w-44
                      focus:ring-pink-500 focus:border-pink-500">
    </div>

    <!-- Button -->
    <div class="flex flex-col justify-end">
        <span class="h-4 mb-1"></span>
        <button type="submit"
                class="bg-pink-500 text-white text-sm px-5 h-10 rounded-md
                       hover:bg-pink-600 transition">
            Filter
        </button>
    </div>

</form>

<!-- RINGKASAN -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-pink-100 p-4 rounded-lg">
        <p class="text-sm text-gray-600">Total Order</p>
        <p class="text-2xl font-bold text-pink-600">{{ $totalOrder }}</p>
    </div>

    <div class="bg-blue-100 p-4 rounded-lg">
        <p class="text-sm text-gray-600">Total Berat</p>
        <p class="text-2xl font-bold text-blue-600">
            {{ number_format($totalBerat, 2) }} Kg
        </p>
    </div>

    <div class="bg-green-100 p-4 rounded-lg">
        <p class="text-sm text-gray-600">Total Pendapatan</p>
        <p class="text-2xl font-bold text-green-600">
            Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
        </p>
    </div>
</div>

<!-- TABEL LAPORAN -->
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full text-sm border-collapse">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3 text-left w-12">No</th>
                <th class="px-4 py-3 text-left">Kode</th>
                <th class="px-4 py-3 text-left">Customer</th>
                <th class="px-4 py-3 text-left">Berat</th>
                <th class="px-4 py-3 text-left">Total</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Tanggal</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @forelse($orders as $order)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    {{ $loop->iteration }}
                </td>

                <td class="px-4 py-3 font-medium">
                    {{ $order->tracking_code }}
                </td>

                <td class="px-4 py-3">
    {{ optional($order->customer)->name ?? '-' }}
</td>

                <td class="px-4 py-3">
                    {{ number_format($order->berat, 2) }} Kg
                </td>

                <td class="px-4 py-3">
                    Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                </td>

                <td class="px-4 py-3">
                    <span class="px-2 py-1 rounded text-xs font-semibold
                        {{ $order->status === 'selesai'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-yellow-100 text-yellow-700' }}">
                        {{ strtoupper($order->status) }}
                    </span>
                </td>

                <td class="px-4 py-3">
                    {{ $order->created_at->format('d-m-Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7"
                    class="text-center py-6 text-gray-500">
                    Tidak ada data laporan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
