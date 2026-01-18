<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Status Laundry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gradient-to-br from-pink-50 via-white to-slate-100 min-h-screen flex flex-col">

<!-- NAVBAR -->
<nav class="bg-white/80 backdrop-blur shadow-sm sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route('user.landing') }}" class="font-bold text-pink-600 text-lg">
            ← NIA LAUNDRY
        </a>
        <span class="text-sm text-slate-500 hidden sm:block">
            Laundry Tracking System
        </span>
    </div>
</nav>

<!-- MAIN -->
<main class="flex-1">

    <div class="max-w-3xl mx-auto px-6 py-16">

        <!-- CARD -->
        <div class="bg-white rounded-[2rem] shadow-xl p-8 sm:p-10">

            <h1 class="text-3xl font-bold text-center mb-3">
                🔍 Cek Status Laundry
            </h1>
            <p class="text-center text-slate-500 mb-10">
                Masukkan kode tracking untuk melihat progres cucian Anda
            </p>

            <!-- FORM -->
            <form method="GET" action="{{ route('tracking.public') }}" class="mb-12">
                <div class="flex flex-col sm:flex-row gap-4">
                    <input type="text"
                           name="kode"
                           value="{{ request('kode') }}"
                           placeholder="Contoh: TRK-123456"
                           class="flex-1 border rounded-xl px-5 py-4 focus:ring-2 focus:ring-pink-500 outline-none text-sm"
                           required>

                    <button
                        class="bg-pink-600 hover:bg-pink-700 transition text-white px-8 py-4 rounded-xl font-semibold shadow">
                        Cek Status
                    </button>
                </div>
            </form>

            @isset($order)
            <!-- INFO ORDER -->
            <div class="bg-gradient-to-r from-pink-100 to-pink-50 border border-pink-200 rounded-2xl p-6 mb-10">
                <p class="mb-2">
                    👤 <b>Customer:</b> {{ $order->customer->name ?? '-' }}
                </p>
                <p>
                    📦 <b>Kode Tracking:</b> {{ $order->tracking_code }}
                </p>
            </div>

            <!-- TIMELINE -->
            <h2 class="font-semibold text-lg mb-6 text-slate-700">
                📊 Progres Laundry
            </h2>

            @php
                $statuses = [
                    'diterima' => 'Order Diterima',
                    'diproses' => 'Sedang Diproses',
                    'selesai'  => 'Selesai'
                ];

                $keys = array_keys($statuses);
                $currentIndex = array_search($order->status, $keys);
            @endphp

            <div class="space-y-6">
                @foreach ($statuses as $key => $label)
                    @php
                        $index = array_search($key, $keys);
                        $done = $currentIndex !== false && $index <= $currentIndex;
                    @endphp

                    <div class="flex items-start gap-4">
                        <!-- ICON -->
                        <div class="w-12 h-12 flex items-center justify-center rounded-full text-lg font-bold
                            {{ $done ? 'bg-green-500 text-white' : 'bg-slate-300 text-white' }}">
                            {{ $done ? '✔' : '⏳' }}
                        </div>

                        <!-- CARD -->
                        <div class="flex-1 bg-slate-50 border rounded-2xl px-6 py-4">
                            <p class="font-semibold text-slate-700">
                                {{ $label }}
                            </p>
                            <p class="text-sm text-slate-500">
                                {{ ucfirst($key) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            @endisset

            @empty($order)
                @if(request()->has('kode'))
                    <div class="text-center text-red-500 font-semibold mt-6">
                        ❌ Kode tracking tidak ditemukan
                    </div>
                @endif
            @endempty

        </div>
    </div>

</main>

<!-- FOOTER -->
<footer class="text-center text-sm text-slate-500 pb-8">
    © {{ date('Y') }} NIA LAUNDRY • Laundry Online System
</footer>

</body>
</html>
