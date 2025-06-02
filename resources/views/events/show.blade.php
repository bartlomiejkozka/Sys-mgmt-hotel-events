<x-app-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 mt-4 overflow-hidden">
        <div class="relative min-h-[70dvh] flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="flex justify-center">
                    <h1 class="text-5xl font-bold text-black hover:text-[#FF6B3E] mb-12 mt-4 transition-colors">
                        Wydarzenie
                    </h1>
                </main>
                <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">

                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-xl bg-white p-8 shadow-lg ring-1 ring-gray-200 hover:ring-[#FF2D20] transition duration-300 transform hover:scale-102 lg:p-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:ring-[#FF2D20] dark:hover:text-white/80">
                        <div class="space-y-6">

                            <div class="border-b pb-6">
                                <div class="font-bold text-2xl text-[#FF2D20] mb-2">{{ $event->name }}</div>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Opis:</strong> {{ $event->description }}</p>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Lokalizacja:</strong> {{ $event->location }}</p>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Data:</strong> {{ $event->event_date }}</p>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Godzina:</strong> {{ $event->event_time }}</p>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Maksymalna ilość uczestników:</strong> {{ $event->max_participants }}</p>

                                <div class="mt-4">
                                    <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Rezerwacje:</h3>
                                    <ul class="list-disc pl-5">
                                        @foreach($users as $user)
                                            <li class="text-gray-600 dark:text-gray-400">
                                                <div class="flex flex-row gap-4">
                                                    {{ $user->name }}
                                                    <form action="{{ route('reservations.destroy', [$user, $event]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="hover:bg-gray-100 px-2 py-1 rounded-sm transition-all duration-200 text-red-500 hover:text-red-700">
                                                            X
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="flex gap-4 mt-6">
                                    <a href="{{ route('events.edit', $event->id) }}" class="inline-block px-6 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition duration-200 transform hover:scale-105 shadow-md">
                                        Edytuj wydarzenie
                                    </a>

                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-6 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600 transition duration-200 transform hover:scale-105 shadow-md">
                                            Usuń wydarzenie
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="mt-6">
                            <a href="/admin/events" class="inline-block px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition duration-300 transform hover:scale-105 shadow-lg">
                                Wróć
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
