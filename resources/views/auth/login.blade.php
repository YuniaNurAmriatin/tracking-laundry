<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | NIA LAUNDRY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-100 via-white to-pink-50">

<!-- BACKGROUND DECOR -->
<div class="absolute inset-0 overflow-hidden">
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-pink-300 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-pink-200 rounded-full blur-3xl opacity-40"></div>
</div>

<!-- CARD -->
<div class="relative w-full max-w-md">
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-10">

        <!-- LOGO -->
        <div class="flex justify-center mb-6">
            <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-pink-600 text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7l9-4 9 4-9 4-9-4z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 17l9 4 9-4"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 12l9 4 9-4"/>
                </svg>
            </div>
        </div>

        <!-- TITLE -->
        <h1 class="text-2xl font-bold text-center text-gray-800">
            Login Admin
        </h1>
        <p class="text-center text-gray-500 text-sm mb-8">
            NIA Laundry Management System
        </p>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Email
                </label>
                <input type="email" name="email" required autofocus
                       class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-pink-500 outline-none"
                       placeholder="admin@email.com">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Password
                </label>

                <div class="relative">
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-pink-500 outline-none pr-12"
                           placeholder="••••••••">

                    <button type="button"
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-pink-600">
                        👁
                    </button>
                </div>

                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full py-3 rounded-xl bg-gradient-to-r from-pink-600 to-pink-500 text-white font-semibold
                           hover:scale-[1.02] hover:shadow-lg transition">
                Login
            </button>
        </form>

    </div>
</div>

<!-- JS -->
<script>
function togglePassword() {
    const input = document.getElementById('password');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>

</body>
</html>
