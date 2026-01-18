@extends('layouts.dashboard')

@section('title', 'Notifikasi')

@section('content')
<h1 class="text-2xl font-bold mb-4">Notifikasi</h1>

<div class="bg-white rounded-lg shadow divide-y">
    @forelse($notifications as $notif)
        <div class="p-4 hover:bg-gray-50">
            <p class="font-medium text-gray-800">
                {{ $notif->pesan }}
            </p>

            @if($notif->order)
                <p class="text-sm text-gray-500">
                    Order: {{ $notif->order->tracking_code }}
                </p>
            @endif

            <p class="text-xs text-gray-400 mt-1">
                {{ $notif->created_at->diffForHumans() }}
            </p>
        </div>
    @empty
        <div class="p-4 text-center text-gray-500">
            Belum ada notifikasi
        </div>
    @endforelse
</div>
@endsection
