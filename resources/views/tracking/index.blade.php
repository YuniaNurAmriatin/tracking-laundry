@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tracking Laundry</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('tracking.show') }}">
        @csrf
        <input type="text" name="kode_order" class="form-control mb-2" placeholder="Masukkan Kode Order">
        <button class="btn btn-primary">Cek Status</button>
    </form>
</div>
@endsection
