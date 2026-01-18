@extends('layouts.dashboard')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Order</h1>

<form method="POST" action="{{ route('orders.store') }}" class="space-y-4">
    @csrf

    {{-- ================= DATA CUSTOMER ================= --}}
    <h3 class="font-semibold text-gray-700">Data Customer</h3>

    <input type="text" name="nama_customer"
        placeholder="Nama Customer"
        class="w-full border rounded px-3 py-2"
        required>

    <input type="text" name="no_hp"
        placeholder="No HP"
        class="w-full border rounded px-3 py-2"
        required>

    <textarea name="alamat"
        placeholder="Alamat"
        class="w-full border rounded px-3 py-2"
        required></textarea>

    {{-- ================= DATA ORDER ================= --}}
    <h3 class="font-semibold text-gray-700 mt-6">Data Order Laundry</h3>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-gray-600">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk"
                class="w-full border rounded px-3 py-2"
                required>
        </div>

        <div>
            <label class="text-sm text-gray-600">Estimasi Selesai</label>
            <input type="date" name="estimasi_selesai"
                class="w-full border rounded px-3 py-2"
                required>
        </div>
    </div>

    <div>
        <label class="text-sm text-gray-600">Berat Laundry (Kg)</label>
        <input type="number" step="0.1" name="berat" id="berat"
            placeholder="Contoh: 2.5"
            class="w-full border rounded px-3 py-2"
            required>
    </div>

    <div>
        <label class="text-sm text-gray-600">Jenis Laundry</label>
        <select name="laundry_id" id="laundry"
            class="w-full border rounded px-3 py-2"
            required>
            <option value="">Pilih Laundry</option>
            @foreach($laundries as $laundry)
                <option value="{{ $laundry->id }}"
                    data-harga="{{ $laundry->harga_per_kg }}">
                    {{ $laundry->nama_laundry }}
                    (Rp{{ number_format($laundry->harga_per_kg) }}/kg)
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="text-sm text-gray-600">Total Harga</label>
        <input type="number" name="total_harga" id="total_harga"
            class="w-full border rounded px-3 py-2 bg-gray-100"
            value="0" readonly>
    </div>

    <button type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded">
        Simpan Order
    </button>
</form>

{{-- ================= SCRIPT HITUNG OTOMATIS ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const berat = document.getElementById('berat');
    const laundry = document.getElementById('laundry');
    const total = document.getElementById('total_harga');

    function hitung() {
        const kg = parseFloat(berat.value) || 0;
        const harga = laundry.options[laundry.selectedIndex]?.dataset.harga || 0;
        total.value = kg * harga;
    }

    berat.addEventListener('input', hitung);
    laundry.addEventListener('change', hitung);
});
</script>
@endsection
