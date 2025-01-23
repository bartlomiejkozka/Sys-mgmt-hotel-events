<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Witamy na stronie</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @media screen and (max-width: 768px) {
            .new{
                flex-direction: column;
            }
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50 h-full m-0 p-0">
<div class="flex flex-col bg-gray-50 min-h-screen">
    <header class="bg-gray-800 h-1/2 flex items-center">
        @if (Route::has('login'))
            <nav class="flex w-full justify-center px-6 h-16">
                <a href="{{ route('login') }}" class="rounded-md px-4 py-3 text-xl font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Log in</a>
                <a href="{{ route('register') }}" class="rounded-md ml-4 px-4 py-3 text-xl font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Register</a>
            </nav>
        @endif
    </header>

    <main class="flex-1 bg-gray-50 flex flex-col justify-center items-center text-center animate-fade-in w-4/5 mx-auto">
        <h1 class="text-4xl font-bold mb-4 mt-4">Witamy na stronie internetowej naszego hotelu</h1>
        <p class="text-lg dark:text-white/70">Zarejestruj się, aby sprawdzić naszą ofertę</p>
        <div class="flex new my-3">
            <div class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Niedługo ferie zimowe</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Nie masz pomysłu na ferie? Zapraszamy do nas! Mamy konkurencyjne ceny noclegów, świetna lokalizacja oraz wiele atrakcji!</p>
            </div>
            <div class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Otwarcie kasyna w naszym hotelu</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Zapraszamy na otwarcie kasyna w budynku naszego hotelu, które odbędzie się 31 stycznia 2025 roku. Uroczystość poprowadzi jeden z właścicieli hotelu.</p>
            </div>
            <div class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Uważaj na oszustwa</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Oszuści podszywają się pod nas chcąc wyłudzić poufne dane</p>
            </div>
        </div>
    </main>

    <footer class="text-sm text-gray-300 text-center py-4 bg-gray-900">
        &copy Copyright Jakub Milasz Kamil Derenda Bartłomiej Kózka Tomasz Drozd
    </footer>
</div>
</body>
</html>
