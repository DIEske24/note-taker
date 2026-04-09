<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-2xl p-10 max-w-md w-full text-center">

        <!-- Logo / Title -->
        <div class="mb-6">
            <h1 class="text-4xl font-bold text-blue-600">📝 Notes App</h1>
            <p class="text-gray-500 mt-2">Your personal note-taking space.</p>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col gap-4">
            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-white border-2 border-blue-600 text-blue-600 py-3 rounded-lg text-lg font-semibold hover:bg-blue-50 transition">
                Register
            </a>
        </div>

        <!-- Footer -->
        <p class="text-gray-400 text-sm mt-8">Built with Laravel & Tailwind CSS</p>
    </div>

</body>
</html>