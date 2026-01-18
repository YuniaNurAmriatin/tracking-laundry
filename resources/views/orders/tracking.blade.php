@extends('layouts.dashboard')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">

    <!-- HEADER -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Tracking Laundry
        </h2>
        <p class="text-sm text-gray-500">
            Kode Tracking:
            <span class="font-semibold">{{ $order->tracking_code }}</span>
        </p>
    </div>

    <!-- RIWAYAT STATUS -->
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold text-blue-700 mb-4">
            Riwayat Status
        </h3>

        <div class="space-y-4 border-l-4 border-blue-500 pl-4">
            @foreach($order->trackingHistories as $history)
                <div class="border-l-4 border-pink-500 pl-4">
                    <p class="font-semibold">
                        {{ $history->status->nama_status }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $history->created_at }}
                    </p>
                    <p class="text-sm">
                        {{ $history->keterangan }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

<!-- PROGRES LAUNDRY -->
<div class="bg-white rounded-xl p-6 shadow">
    <h3 class="text-lg font-semibold mb-8 text-center">Progres Laundry</h3>

    @php
        $total = count($trackingStatuses);
        $percent = ($currentUrutan - 1) / ($total - 1) * 100;
    @endphp

    <div class="relative flex justify-between px-12">

        <!-- GARIS BACKGROUND  -->
        <div class="absolute left-12 right-12 top-5 h-1 bg-gray-300"></div>

        <!-- GARIS AKTIF -->
        <div class="absolute left-12 top-5 h-1 bg-blue-600"
             style="width: {{ $percent }}%">
        </div>

        @foreach($trackingStatuses as $status)
            @php
                $isActive = $status->urutan <= $currentUrutan;
            @endphp

            <div class="relative z-10 flex flex-col items-center">

                <!-- BULAT -->
                <div class="w-10 h-10 flex items-center justify-center rounded-full text-sm font-semibold
                    {{ $isActive ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-600' }}">
                    {{ $status->urutan }}
                </div>

                <!-- LABEL -->
                <span class="mt-2 text-sm
                    {{ $isActive ? 'text-blue-600 font-semibold' : 'text-gray-500' }}">
                    {{ $status->nama_status }}
                </span>

            </div>
        @endforeach
    </div>
</div>

    <!-- UPDATE STATUS -->
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">
            Update Status
        </h3>

        @if($lastLog && in_array($lastLog->status->nama_status, ['Selesai', 'Diambil']))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded">
                Laundry sudah selesai. Status tidak dapat diubah.
            </div>
        @else
            <form method="POST"
                  action="{{ route('orders.tracking.update', $order) }}"
                  class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Status Laundry
                    </label>
                    <select name="tracking_status_id"
                        class="w-full border rounded-lg px-3 py-2" required>
                        @foreach($trackingStatuses as $status)
                            <option value="{{ $status->id }}"
                                {{ $lastLog && $status->id <= $lastLog->tracking_status_id ? 'disabled' : '' }}>
                                {{ $status->nama_status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Catatan
                    </label>
                    <textarea name="catatan" rows="3"
                        class="w-full border rounded-lg px-3 py-2"
                        placeholder="Catatan (opsional)"></textarea>
                </div>

                <div class="text-right">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                        Simpan Status
                    </button>
                </div>
            </form>
        @endif
    </div>

</div>
@endsection
