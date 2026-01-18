@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Status Laundry</h3>

    <p><strong>Customer:</strong> {{ $order->customer->nama }}</p>
    <p><strong>Kode Order:</strong> {{ $order->kode_order }}</p>

    <ul class="list-group">
        @foreach($order->trackingLogs as $log)
            <li class="list-group-item">
                {{ $log->status->nama_status }}
                <span class="text-muted float-end">{{ $log->created_at }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endsection