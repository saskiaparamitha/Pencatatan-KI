<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pencatatan KI')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 to-cyan-100 min-h-screen">
    
    <!-- Header -->
    <header class="bg-red-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo & Title (Kiri) -->
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold">Pencatatan KI</h1>
                    <p class="text-red-100 text-sm">Sistem Pencatatan Kekayaan Intelektual</p>
                </div>

                <!-- Navigation Menu (Tengah) -->
                <nav class="flex-1 flex justify-center">
                    <ul class="flex space-x-8">
                        <li>
                            <a href="{{ route('user.dashboard') }}" 
                               class="hover:text-red-200 transition duration-200 {{ request()->routeIs('user.dashboard') ? 'border-b-2 border-white pb-1 font-semibold' : '' }}">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pengajuan.index') }}" 
                               class="hover:text-red-200 transition duration-200 {{ request()->routeIs('pengajuan.*') ? 'border-b-2 border-white pb-1 font-semibold' : '' }}">
                                Pengajuan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.panduan') }}" 
                               class="hover:text-red-200 transition duration-200 {{ request()->routeIs('user.panduan') ? 'border-b-2 border-white pb-1 font-semibold' : '' }}">
                                Panduan
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Profile Dropdown (Kanan) -->
                <div class="flex-shrink-0 relative">
                    <button id="profileButton" class="flex items-center space-x-2 hover:bg-red-700 px-4 py-2 rounded-lg transition duration-200">
                        <div class="text-right mr-2">
                            <p class="text-sm font-medium">{{ Auth::user()->name ?? 'Guest' }}</p>
                            <p class="text-xs text-red-200">{{ Auth::user()->email ?? 'guest@example.com' }}</p>
                        </div>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl py-2 z-50 border border-gray-200">
                        <div class="px-4 py-3 border-b border-gray-200">
                            <p class="text-sm font-semibold text-gray-700">{{ Auth::user()->name ?? 'Guest' }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email ?? 'guest@example.com' }}</p>
                        </div>
                        <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                            Dashboard
                        </a>
                        <hr class="my-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-red-800 text-white mt-16">
        <div class="container mx-auto px-6 py-6">
            <div class="text-center">
                <p class="text-sm">&copy; 2026 Sistem Pencatatan Kekayaan Intelektual. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Toggle dropdown
        const profileButton = document.getElementById('profileButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        profileButton.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('[role="alert"]');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>