<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between sticky top-0 z-50">
        <a href="{{ route('landing') }}" class="flex items-center gap-3 group">
            <div class="w-9 h-9 bg-red-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">
                ID
            </div>
            <div>
                <p class="font-bold text-gray-800 leading-tight group-hover:text-red-600 transition">
                    Pencatatan KI
                </p>
                <p class="text-xs text-gray-400">@yield('subtitle')</p>
            </div>
        </a>

        <ul class="hidden md:flex space-x-8 text-sm font-medium text-gray-600">
            <li><a href="{{ route('landing') }}" class="hover:text-red-600 transition">Beranda</a></li>
            <li><a href="{{ route('tentang-web') }}" class="hover:text-red-600 transition">Tentang Website</a></li>
        </ul>

        <a href="{{ route('login') }}" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-5 py-2 rounded-lg transition">
            Masuk
        </a>
    </nav>

    @yield('content')

</body>
</html>