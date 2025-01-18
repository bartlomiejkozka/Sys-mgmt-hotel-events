<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50 flex flex-col justify-between">
    <header class="h-1/5 bg-gray-800 flex items-center">
        @if (Route::has('login'))
            <nav class="flex w-full justify-end px-6">
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                >
                    Log in
                </a>
                <a
                    href="{{ route('register') }}"
                    class="rounded-md ml-3 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                >
                    Register
                </a>
            </nav>
        @endif
    </header>
    <main class="h-4/5 flex flex-col items-center justify-center text-center">
        <h1 class="text-4xl font-bold mb-4">Witamy na stronie internetowej naszego hotelu</h1>
        <p class="text-lg text-gray-500 dark:text-white/70">Zarejestruj się, aby sprawdzić naszą ofertę</p>
    </main>
    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
</body>
</html>
