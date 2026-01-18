@extends('dashboard')

@section('content')
<h1 class="text-xl font-bold mb-4">Informasi Laundry</h1>

<div class="bg-white p-6 rounded shadow max-w-md">
    <p><b>Nama Laundry:</b> {{ $laundry->name }}</p>
    <p><b>Alamat:</b> {{ $laundry->address }}</p>
    <p><b>No HP:</b> {{ $laundry->phone }}</p>
</div>
@endsection