<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #eee; }
        h2 { text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>

<h2>LAPORAN LAUNDRY</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Customer</th>
            <th>Berat</th>
            <th>Total</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->tracking_code }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->berat }} Kg</td>
            <td>Rp{{ number_format($order->total_harga,0,',','.') }}</td>
            <td>{{ strtoupper($order->status) }}</td>
            <td>{{ $order->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>