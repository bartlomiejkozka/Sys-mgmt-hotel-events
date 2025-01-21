<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin Panel</title>
</head>
<body>
<x-AdminMenu/>
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 mt-4">
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <main class="mt-6 flex justify-center">
                <h1 class="text-5xl font-bold text-black dark:text-white mb-12">Panel Administracyjny</h1>
            </main>
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                <!-- Najbliższe wydarzenia (pierwsze 5) -->
                <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                    <h2 class="text-2xl font-semibold">Najbliższe wydarzenia</h2>
                    <ul class="list-disc pl-5">
{{--                        @foreach($events->take(5) as $event)--}}
                            <li class="mb-4">
                                <div class="font-bold text-lg">aa</div>
                                <p class="text-gray-700 dark:text-gray-300">aa -aa</p>
                            </li>
{{--                        @endforeach--}}
                    </ul>
                </div>

                <!-- Przyciski po prawej stronie -->
                <div class="flex flex-col gap-6">
                    <!-- Utwórz nowe wydarzenie -->
                    <a
                        href="/admin/events/create"
                        class="flex items-center justify-center gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                        <svg class="w-6 h-6 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                        <span class="text-lg font-semibold">Utwórz nowe wydarzenie</span>
                    </a>

                    <!-- Zobacz wszystkie wydarzenia -->
                    <a
                        href="/admin/events/list"
                        class="flex items-center justify-center gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                        <svg class="w-6 h-6 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5h16.5m-16.5 7.5h16.5m-16.5 7.5h16.5"/></svg>
                        <span class="text-lg font-semibold">Zobacz wszystkie wydarzenia</span>
                    </a>

                    <!-- Ustaw powiadomienia -->
                    <a
                        href="/admin/notifications"
                        class="flex items-center justify-center gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                        <svg class="w-6 h-6 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25m-7.5 3.75H4.5m15 0H8.25m4.5 0a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="text-lg font-semibold">Ustaw powiadomienia</span>
                    </a>
                </div>
            </div>
            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </div>
</div>
</body>
</html>

