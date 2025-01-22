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

    <style>
        /* Ustawienie wysokości na pełny widok */
        html, body {
            height: 100%; /* Kluczowe ustawienie */
            margin: 0;   /* Usuń marginesy */
            padding: 0;  /* Usuń odstępy */
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Minimum 100% wysokości widoku */
        }

        header {
            background-color: #2d3748; /* Szary kolor */
        }

        main {
            flex: 1; /* Zajmuje pozostałą przestrzeń */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            animation: appear 2s ease;
        }

        footer {
            flex: 0 0 auto;
            padding: 16px 0;
            text-align: center;
            background-color: #1a202c; /* Ciemny szary kolor */
        }

        @keyframes appear {
            0%{
                opacity: 0;
            }
            100%{
                opacity: 1;
            }
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div id="app">
        <header class="flex items-center">
            @if (Route::has('login'))
                <nav class="flex w-full justify-center px-6">
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

        <main class="bg-gray-50">
            <h1 class="text-4xl font-bold mb-4">Witamy na stronie internetowej naszego hotelu</h1>
            <p class="text-lg dark:text-white/70">Zarejestruj się, aby sprawdzić naszą ofertę</p>
        </main>

        <footer class="text-sm text-gray-300">
            &copy Copyright Jakub Milasz Kamil Derenda Bartłomiej Kózka Tomasz Drozd
        </footer>
    </div>
</body>
</html>
