<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laundry Admin')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine JS (Dropdown) -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- ================= SIDEBAR ================= -->
    <aside class="w-64 bg-pink-500 text-white fixed inset-y-0 left-0 shadow-lg z-40">

        <!-- LOGO -->
        <div class="p-6 border-b border-pink-400">
            <h1 class="text-2xl font-bold tracking-wide">
                NIA LAUNDRY
            </h1>
            <p class="text-xs text-pink-100 mt-1">
                Laundry Admin
            </p>
        </div>

        <!-- MENU -->
        <nav class="p-4 text-sm space-y-6">

            <!-- HOME -->
            <div>
                <p class="text-xs uppercase text-pink-200 mb-2 tracking-wider">
                    Home
                </p>

                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('dashboard') ? 'bg-pink-600 font-semibold' : 'hover:bg-pink-600' }}">

                    <!-- ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l9-9 9 9M4 10v10h5v-6h6v6h5V10" />
                    </svg>

                    Dashboard
                </a>
            </div>

            <!-- TRANSAKSI -->
<div>
    <p class="text-xs uppercase text-pink-200 mb-2 tracking-wider">
        Transaksi
    </p>

    <!-- ORDERS -->
    <a href="{{ route('orders.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg transition
       {{ request()->routeIs('orders.*') ? 'bg-pink-600 font-semibold' : 'hover:bg-pink-600' }}">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0H4m16 0l-1.5 7h-13L4 13" />
        </svg>

        Orders
    </a>

    <!-- NOTIFIKASI -->
    <a href="{{ route('notifications.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg transition
       {{ request()->routeIs('notifications.*') ? 'bg-pink-600 font-semibold' : 'hover:bg-pink-600' }}">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 00-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 01-6 0" />
        </svg>

        Notifikasi
    </a>

    <!-- LAPORAN -->
    <a href="{{ route('reports.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg transition
       {{ request()->routeIs('reports.*') ? 'bg-pink-600 font-semibold' : 'hover:bg-pink-600' }}">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 17v-6m4 6V7m4 10V11M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z" />
        </svg>

        Laporan
    </a>
</div>

        </nav>

        <!-- FOOTER SIDEBAR -->
        <div class="absolute bottom-0 w-full p-4 border-t border-pink-400 text-xs text-center text-pink-100">
            © {{ date('Y') }} NIA LAUNDRY
        </div>
    </aside>

    <!-- ================= MAIN ================= -->
    <div class="flex-1 ml-64 flex flex-col">

        <!-- TOP NAVBAR -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">

            <!-- JUDUL -->
            <h1 class="text-lg font-bold text-pink-600">
    @if (request()->routeIs('dashboard'))
        Dashboard
    @else
        @yield('page-title')
    @endif
</h1>

            <!-- USER DROPDOWN -->
            <div class="relative" x-data="{ open: false }">

                <button
                    @click="open = !open"
                    class="flex items-center gap-3 focus:outline-none"
                >
                    <div class="w-10 h-10 rounded-full bg-pink-500 text-white flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <span class="text-sm font-medium text-gray-700">
                        {{ Auth::user()->name }}
                    </span>
                </button>

                <!-- DROPDOWN -->
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-3 w-40 bg-white border rounded-xl shadow-lg z-50"
                >
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 rounded-xl"
                        >
                            🚪 Logout
                        </button>
                    </form>
                </div>

            </div>
        </header>

        <!-- PAGE CONTENT -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
