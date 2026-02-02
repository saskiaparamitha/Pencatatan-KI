<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Pencatatan KI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-br from-red-700 via-red-400 to-pink-200">

    <div class="bg-white w-full max-w-md p-8 rounded-lg shadow-xl">
        <h1 class="text-2xl font-bold text-center text-red-700 mb-2">
            Pencatatan KI
        </h1>
        <p class="text-center text-gray-600 mb-6">
            Silakan login
        </p>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

                        <!-- EMAIL -->
            <div class="mb-4">
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-2 border rounded-md
                           focus:outline-none focus:ring-2 focus:ring-red-500"
                >
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    class="w-full px-4 py-2 border rounded-md
                           focus:outline-none focus:ring-2 focus:ring-red-500"
                >
            </div>

            <!-- REMEMBER ME -->
            <div class="flex items-center mb-6">
                <input
                    type="checkbox"
                    name="remember"
                    id="remember"
                    class="mr-2"
                >
                <label for="remember" class="text-sm text-gray-700">
                    Remember Me
                </label>
            </div>

            <!-- BUTTON LOGIN -->
            <button
                type="submit"
                class="w-full bg-red-700 text-white py-2 rounded-md
                       hover:bg-red-800 transition"
            >
                Login
            </button>

        </form>
    </div>

</body>
</html>
<!-- EMAIL
