<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Laundry</title>
    <style>
    body {
        font-family: monospace;
        font-size: 11px;
        background: #f5f5f5;
    }

    /* KERTAS STRUK */
    .receipt {
        width: 280px; /* ± 58–60mm */
        background: #fff;
        margin: 20px auto;
        padding: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.15);
    }

    .center {
        text-align: center;
    }

    .line {
        border-top: 1px dashed #000;
        margin: 6px 0;
    }

    .row {
        display: flex;
        justify-content: space-between;
        margin: 2px 0;
    }

    img {
        display: block;
        margin: 0 auto;
    }

    @media print {
        body {
            background: none;
        }
        .receipt {
            box-shadow: none;
            margin: 0 auto;
        }
    }
</style>
</head>
<body>
<div class="receipt">

    <div class="center">
        <strong>NIA LAUNDRY</strong><br>
        Laundry Bersih & Wangi<br>
        Ds. Kemantren RT 07 RW 02<br>
        Telp: 0858-5968-0218
    </div>

    <div class="line"></div>

    <div class="row">
        <span>Kode</span>
        <span>{{ $order->tracking_code }}</span>
    </div>
    <div class="row">
        <span>Customer</span>
        <span>{{ $order->customer->name }}</span>
    </div>
    <div class="row">
        <span>Tgl Masuk</span>
        <span>{{ $order->tanggal_masuk }}</span>
    </div>
    <div class="row">
        <span>Estimasi</span>
        <span>{{ $order->estimasi_selesai }}</span>
    </div>
    <div class="row">
    <span>Berat</span>
    <span>{{ $order->berat }} Kg</span>
</div>

<div class="row">
    <span>Total</span>
    <span>Rp{{ number_format($order->total_harga, 0, ',', '.') }}</span>
</div>
    <div class="row">
        <span>Status</span>
        <span>{{ strtoupper($order->status) }}</span>
    </div>

    <div class="line"></div>

    <div class="center">
        <small>Scan untuk tracking</small><br>
        <img src="data:image/svg+xml;base64,{{ base64_encode($qr) }}" width="120">
    </div>

    <div class="line"></div>

    <div class="center">
        TERIMA KASIH<br>
        SIMPAN STRUK INI<br>
        SEBAGAI BUKTI
    </div>

</div>