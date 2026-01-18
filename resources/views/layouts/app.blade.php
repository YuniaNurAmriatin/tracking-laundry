<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laundry Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-U2GCMvSV.css') }}">
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-700 text-white p-5">
        <h2 class="text-xl font-bold mb-6">Laundry App</h2>

        <nav class="space-y-3">
            <a href="/dashboard"
               class="block hover:bg-blue-600 p-2 rounded
               {{ request()->is('dashboard') ? 'bg-blue-600 font-semibold' : '' }}">
                Dashboard
            </a>

            <a href="/orders"
               class="block hover:bg-blue-600 p-2 rounded
               {{ request()->is('orders*') ? 'bg-blue-600 font-semibold' : '' }}">
                Orders
            </a>

            <form method="POST" action="/logout">
                @csrf
                <button class="w-full text-left hover:bg-red-600 p-2 rounded">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- CONTENT -->
    <!-- CONTENT -->
<main class="flex-1 p-6">

    @if (request()->is('dashboard'))
        <h1 class="text-2xl font-semibold text-gray-700 mb-6">
            Dashboard
        </h1>
    @endif

    @yield('content')

</main>


</div>

</body>
</html>
