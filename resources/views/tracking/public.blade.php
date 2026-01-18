<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tracking Laundry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: #fff;
            width: 360px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
            padding: 20px;
        }
        .title {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 16px;
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin: 6px 0;
        }
        .status {
            text-align: center;
            margin-top: 15px;
            padding: 8px;
            border-radius: 8px;
            background: #fde68a;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 16px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="title">NIA LAUNDRY</div>
    <div class="subtitle">Status Laundry Anda</div>

    <div class="row">
        <span>Kode</span>
        <strong>{{ $order->tracking_code }}</strong>
    </div>
    <div class="row">
        <span>Nama</span>
        <strong>{{ $order->customer->name }}</strong>
    </div>
    <div class="row">
        <span>Berat</span>
        <strong>{{ $order->berat }} Kg</strong>
    </div>
    <div class="row">
        <span>Total</span>
        <strong>Rp{{ number_format($order->total_harga,0,',','.') }}</strong>
    </div>
    <div class="row">
        <span>Masuk</span>
        <strong>{{ $order->tanggal_masuk }}</strong>
    </div>
    <div class="row">
        <span>Estimasi</span>
        <strong>{{ $order->estimasi_selesai }}</strong>
    </div>

    <div class="status">
        {{ strtoupper($order->status) }}
    </div>

    <div class="footer">
        Terima kasih telah menggunakan<br>
        NIA LAUNDRY
    </div>
</div>

</body>
</html>
