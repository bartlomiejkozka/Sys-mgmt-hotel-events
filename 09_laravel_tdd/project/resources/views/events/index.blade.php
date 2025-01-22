<x-app-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 mt-4 overflow-scroll">
        <div class="relative min-h-[70dvh] flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="flex justify-center">
                    <h1 class="text-5xl font-bold text-black dark:text-white mb-12 mt-4">Wszystkie wydarzenia</h1>
                </main>
                <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">
                    <!-- All events with all their attributes -->
                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <h2 class="text-2xl font-semibold">Wszystkie wydarzenia</h2>
                        <div class="space-y-6">
                            @foreach($events as $event)
                                <div class="border-b pb-6">
                                    <div class="font-bold text-xl mb-2">{{ $event->name }}</div>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Opis:</strong> {{ $event->description }}</p>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Lokalizacja:</strong> {{ $event->location }}</p>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Data:</strong> {{ $event->event_date }}</p>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Czas:</strong> {{ $event->event_time }}</p>
                                    <p class="text-gray-700 dark:text-gray-300"><strong>Maksymalna ilość uczestników:</strong> {{ $event->max_participants }}</p>
                                    <div class="mt-4">
                                        <h3 class="font-semibold">Rezerwacje:</h3>
                                        <ul class="list-disc pl-5">
                                            @foreach($event->reservations as $reservation)
                                                <li class="text-gray-600 dark:text-gray-400">
                                                    {{ $reservation->name }} - {{ $reservation->email }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Edit and Delete Buttons -->
                                    <div class="flex">
                                        <div class="mt-4 p-2">
                                            <!-- Edit Button -->
                                            <a href="{{ route('events.edit', $event->id) }}" class="inline-block px-6 py-2 text-white bg-blue-400 rounded-lg">
                                                Edytuj wydarzenie
                                            </a>
                                        </div>
                                        <div class="mt-4 p-2">
                                            <!-- Delete Button -->
                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-block px-6 py-2 text-white bg-red-400 rounded-lg">
                                                    Usuń wydarzenie
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- Create New Event Button -->
                        <div class="mt-6">
                            <a href="events/create" class="inline-block px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition duration-300">
                                Utwórz nowe wydarzenie
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
