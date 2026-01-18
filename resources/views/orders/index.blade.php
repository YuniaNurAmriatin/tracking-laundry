@extends('layouts.dashboard')

@section('title', 'Orders')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold text-gray-700">
            Data Order Laundry
        </h1>

        <a href="/orders/create"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm shadow">
            + Tambah Order
        </a>
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-600 text-sm uppercase">
                    <th class="px-4 py-3 text-left">Kode</th>
                    <th class="px-4 py-3 text-left">Customer</th>
                    <th class="px-4 py-3 text-center">Berat</th>
                    <th class="px-4 py-3 text-right">Total</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
            @forelse($orders as $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-mono text-sm">
                        {{ $order->tracking_code }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $order->customer->name }}
                    </td>

                    {{-- BERAT --}}
                    <td class="px-4 py-3 text-center">
                        {{ $order->berat }} Kg
                    </td>

                    {{-- TOTAL HARGA --}}
                    <td class="px-4 py-3 text-right font-semibold">
                        Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                    </td>

                    {{-- STATUS --}}
                    <td class="px-4 py-3 text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            @if($order->status == 'diterima') bg-yellow-100 text-yellow-700
                            @elseif($order->status == 'diproses') bg-blue-100 text-blue-700
                            @elseif($order->status == 'selesai') bg-green-100 text-green-700
                            @elseif($order->status == 'diambil') bg-purple-100 text-purple-700
                            @else bg-gray-200 text-gray-700 @endif
                        ">
                            {{ strtoupper($order->status) }}
                        </span>
                    </td>

                    {{-- AKSI --}}
                    <td class="px-4 py-3 text-center space-x-1">
                        <a href="{{ route('orders.tracking', $order->id) }}"
                           class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded text-xs">
                            Tracking
                        </a>

                        <a href="{{ route('orders.print', $order->id) }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-xs">
                            Cetak
                        </a>

                        <form action="{{ route('orders.destroy', $order->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin hapus order ini?')">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-500">
                        Belum ada data order
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
