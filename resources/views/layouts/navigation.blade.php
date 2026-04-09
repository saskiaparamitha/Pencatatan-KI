<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT -->
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <span class="font-bold text-xl text-red-600">Pencatatan KI</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @auth
                        @if(auth()->user()->role === 'pegawai')
                            <a href="{{ route('user.dashboard') }}"
                               class="text-gray-700 hover:text-red-600">
                                Dashboard
                            </a>
                        @endif

                        @if(in_array(auth()->user()->role, ['verifikator','reviewer']))
                            <a href="{{ route('admin.dashboard') }}"
                               class="text-gray-700 hover:text-red-600">
                                Dashboard Admin
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- RIGHT -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-sm text-gray-600 hover:text-red-600">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>

        </div>
    </div>
</nav>
