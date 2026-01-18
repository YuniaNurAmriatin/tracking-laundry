<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laundry')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pink-100 font-sans">

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('logo.png') }}" class="w-16 h-16" alt="Laundry Logo">
        </div>

        @yield('content')

    </div>
</div>

</body>
</html>
