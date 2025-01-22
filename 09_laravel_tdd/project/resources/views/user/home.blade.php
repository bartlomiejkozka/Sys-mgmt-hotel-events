<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Strona główna</title>
</head>
<body>
<x-Menu/>
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <main class="mt-6">
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <h2 class="text-xl font-semibold text-black dark:text-white">Nadchodzące wydarzenia</h2>
                        @if($reservations->isEmpty())
                            <p>Brak nadchodzących wydarzeń</p>
                        @else
                        @foreach($reservations as $reservation)
                            <div class="max-w-lg rounded overflow-hidden border border-gray-200">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">{{ $reservation->event->name }}</div>
                                    <p class="text-gray-700 text-base">
                                        {{ $reservation->event->description }}
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                        {{ $reservation->event->location }}
                                    </span>
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                        {{ $reservation->event->event_date }}
                                    </span>
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                        {{ $reservation->event->event_time }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div class="pt-3 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black dark:text-white">Polecane dla ciebie</h2>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                        <div class="pt-3 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black dark:text-white">Odkrywaj świat z nami</h2>
                            <p class="mt-4 text-sm/relaxed">
                                Zapraszamy na spotkanie z mieszkańcami miasta. Będziesz mógł się dowiedzieć więcej o naszej okolicy.
                            </p>
                        </div>
                        <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                    </div>

                    <div
                        class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >

                        <div class="pt-3 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black dark:text-white">Koncert Skolima</h2>

                            <p class="mt-4 text-sm/relaxed">
                                Niezwłocznie zapisz się na koncert popularnego Skolima. Bilety rozchodzą się jak świeże bułeczki. Podczas tego wydarzenia poczujesz temperaturę.
                            </p>
                        </div>
                        <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                    </div>

                </div>
            </main>
        </div>
    </div>
</div>
</body>
</html>
