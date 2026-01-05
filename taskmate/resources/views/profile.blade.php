<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile — TaskMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #f9fafb; }
    </style>
</head>
<body class="font-sans text-gray-800">

<!-- HEADER (Light Landing Style) -->
<header class="w-full bg-white/80 backdrop-blur border-b border-gray-200">
    <div class="max-w-6xl mx-auto px-8 py-5 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <span class="w-3 h-3 bg-orange-500 rounded-full"></span>
            <span class="font-semibold text-lg text-gray-900">TaskMate</span>
        </div>

        <div class="flex items-center gap-6 text-sm">
            <a href="/dashboard" class="text-gray-500 hover:text-gray-900 transition">Dashboard</a>
            <form method="POST" action="/logout">
                @csrf
                <button class="text-red-500 hover:text-red-600 transition">Logout</button>
            </form>
        </div>
    </div>
</header>

<!-- PROFILE HERO SECTION -->
<section class="relative">
    <div class="h-56 bg-gradient-to-br from-orange-100 to-transparent"></div>

    <div class="max-w-6xl mx-auto px-8">
        <div class="relative -mt-20 flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
            <div class="flex items-end gap-6">
                <div class="w-32 h-32 bg-white rounded-full border-8 border-white shadow flex items-center justify-center text-5xl font-bold text-orange-500 uppercase">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>

                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
                    <p class="text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <button class="bg-orange-500 hover:bg-orange-400 text-white px-6 py-2 rounded-xl text-sm transition shadow">
                Edit Profile
            </button>
        </div>
    </div>
</section>

<!-- CONTENT SECTION -->
<section class="max-w-6xl mx-auto px-8 pb-20">
    <h3 class="text-xl font-semibold text-gray-900 mb-6">Informasi Akun</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
            <p class="text-gray-500 text-sm mb-1">Bergabung Sejak</p>
            <p class="text-lg font-medium text-gray-900">
                {{ Auth::user()->created_at->format('d F Y') }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
            <p class="text-gray-500 text-sm mb-1">Status Akun</p>
            <p class="text-lg font-medium text-green-600">Aktif</p>
        </div>
    </div>
</section>

</body>
</html>
