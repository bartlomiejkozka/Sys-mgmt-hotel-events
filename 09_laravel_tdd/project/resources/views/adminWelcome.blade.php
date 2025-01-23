
<x-app-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 mt-4">
        <div class="relative min-h-[70dvh] flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="flex justify-center">
                    <h1 class="text-5xl font-bold text-black dark:text-white mb-12">
                        <span class="inline-flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 stroke-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4m6 4v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7m16-5.586l-7-7a2 2 0 00-2.828 0l-7 7M10 21h4" />
                            </svg>
                            Panel Administracyjny
                        </span>
                    </h1>
                </main>
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    <!-- Najbliższe wydarzenia (pierwsze 5) -->
                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4M6 6h.01M4 14.01L4 14" />
                            </svg>
                            <h2 class="text-2xl font-semibold">Najbliższe wydarzenia</h2>
                        </div>
                        <ul class="list-disc pl-5">
                            @foreach($events->where('event_date', '>=', now())->take(5) as $event)
                                <li class="mb-4">
                                    <!-- Link to individual event -->
                                    <a href="{{ url('/admin/events/' . $event->id) }}" class="block">
                                        <div class="font-bold text-lg hover:text-[#FF2D20]">{{ $event->title }}</div>
                                        <p class="text-gray-700 dark:text-gray-300">{{ $event->name }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    <!-- Przyciski po prawej stronie -->
                    <div class="flex flex-col gap-6">
                        <!-- Utwórz nowe wydarzenie -->
                        <a
                            href="/admin/events/create"
                            class="flex items-center justify-center gap-4 rounded-lg bg-gradient-to-r from-[#FF7A7A] to-[#FF2D20] p-6 shadow-lg text-white transition duration-300 hover:shadow-2xl focus:outline-none focus-visible:ring-4 focus-visible:ring-[#FF2D20]/50"
                        >
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            <span class="text-lg font-semibold">Utwórz nowe wydarzenie</span>
                        </a>

                        <!-- Zobacz wszystkie wydarzenia -->
                        <a
                            href="/admin/events"
                            class="flex items-center justify-center gap-4 rounded-lg bg-gradient-to-r from-[#FFC371] to-[#FF5F6D] p-6 shadow-lg text-white transition duration-300 hover:shadow-2xl focus:outline-none focus-visible:ring-4 focus-visible:ring-[#FF5F6D]/50"
                        >
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5h16.5m-16.5 7.5h16.5m-16.5 7.5h16.5"/>
                            </svg>
                            <span class="text-lg font-semibold">Zobacz wszystkie wydarzenia</span>
                        </a>

                        <!-- Ustaw powiadomienia -->
                        <a
                            href="/admin/notifications"
                            class="flex items-center justify-center gap-4 rounded-lg bg-gradient-to-r from-[#76c7c0] to-[#34a3a1] p-6 shadow-lg text-white transition duration-300 hover:shadow-2xl focus:outline-none focus-visible:ring-4 focus-visible:ring-[#34a3a1]/50"
                        >
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25m-7.5 3.75H4.5m15 0H8.25m4.5 0a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-lg font-semibold">Powiadomienia</span>
                        </a>

                        <!-- Ustaw raporty -->
                        <a
                            href="/admin/reports"
                            class="flex items-center justify-center gap-4 rounded-lg bg-gradient-to-r from-[#6a11cb] to-[#2575fc] p-6 shadow-lg text-white transition duration-300 hover:shadow-2xl focus:outline-none focus-visible:ring-4 focus-visible:ring-[#2575fc]/50"
                        >
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.75v14.5m-6-10h12m-6 10H6a2.25 2.25 0 01-2.25-2.25V7.25A2.25 2.25 0 016 5h12a2.25 2.25 0 012.25 2.25v9.5A2.25 2.25 0 0118 19H12z" />
                            </svg>
                            <span class="text-lg font-semibold">Raporty</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
