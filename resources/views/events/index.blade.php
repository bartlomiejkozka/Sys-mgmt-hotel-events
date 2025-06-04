<x-app-layout>
    <div class="min-h-screen bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 mt-4">
        <div class="relative min-h-[80dvh] pb-20 flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="flex justify-center">
                    <h1 class="text-5xl font-extrabold text-black dark:text-white mb-12 mt-4 text-center transition-all duration-300 transform hover:text-[#FF6B3E]">
                        Wszystkie wydarzenia
                    </h1>
                </main>
                <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">

                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-xl bg-white p-6 shadow-2xl ring-1 ring-white/[0.1] transition-all duration-300 transform hover:scale-102 hover:ring-[#FF2D20] focus:outline-none focus-visible:ring-[#FF2D20] lg:p-10 lg:pb-10 dark:bg-zinc-800 dark:ring-zinc-700 dark:hover:ring-[#FF2D20] dark:text-white">
                        <div class="space-y-6">
                            @foreach($events->where('event_date', '>=', now()) as $event)
                                <div class="border-b pb-6">
                                    <div class="font-bold text-xl mb-2 text-[#FF2D20] hover:text-[#FF6B3E] transition-colors duration-200">{{ $event->name }}</div>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Opis:</strong> {{ $event->description }}</p>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Lokalizacja:</strong> {{ $event->location }}</p>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Data:</strong> {{ $event->event_date }}</p>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Godzina:</strong> {{ $event->event_time }}</p>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Maksymalna ilość uczestników:</strong> {{ $event->max_participants }}</p>
                                    <!-- Edit and Delete Buttons -->
                                    <div class="flex">
                                        <div class="mt-4 p-2">
                                            <a href="{{ route('events.show', $event->id) }}" class="inline-block px-6 py-2 text-white bg-yellow-400 rounded-lg shadow-lg hover:bg-yellow-500 transition-all duration-300 transform hover:scale-105">
                                                Pokaż wydarzenie
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="mt-6">
                            <a href="events/create" class="inline-block px-6 py-2 text-white bg-green-500 rounded-lg shadow-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105">
                                Utwórz nowe wydarzenie
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
