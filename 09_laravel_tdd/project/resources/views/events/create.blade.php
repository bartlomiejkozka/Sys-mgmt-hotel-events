<x-app-layout>
    <h1 class="text-center mt-6 text-3xl font-bold text-[#FF2D20]">
        <span class="inline-flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF2D20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Utwórz nowe wydarzenie
        </span>
    </h1>

    <div class="flex justify-center mt-8">
        <form action="{{ route('events.store') }}" method="POST" class="max-w-xl w-full bg-gradient-to-br from-white via-gray-50 to-gray-100 dark:from-zinc-900 dark:via-zinc-800 dark:to-zinc-700 rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105">
            @csrf
            <!-- Tytuł -->
            <div class="mb-5">
                <label for="name" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Tytuł wydarzenia</label>
                <input type="text" name="name" id="name" required
                       class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]">
            </div>

            <!-- Opis -->
            <div class="mb-5">
                <label for="description" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Opis wydarzenia</label>
                <textarea name="description" id="description" rows="3" required
                          class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]"></textarea>
            </div>

            <!-- Lokalizacja -->
            <div class="mb-5">
                <label for="location" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Lokalizacja</label>
                <input type="text" name="location" id="location" required
                       class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]">
            </div>

            <!-- Data wydarzenia -->
            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="event_date" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Data wydarzenia</label>
                    <input type="date" name="event_date" id="event_date" required
                           class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]">
                </div>
                <div>
                    <label for="event_time" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Godzina wydarzenia</label>
                    <input type="time" name="event_time" id="event_time" required
                           class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]">
                </div>
            </div>

            <!-- Maksymalna liczba uczestników -->
            <div class="mb-5">
                <label for="max_participants" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Maksymalna liczba uczestników</label>
                <input type="number" name="max_participants" id="max_participants" min="1" required
                       class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]">
            </div>

            <!-- Przycisk zapisz -->
            <div class="text-center">
                <button type="submit"
                        class="w-full bg-gradient-to-r from-[#FF7A7A] to-[#FF2D20] text-white px-5 py-2 rounded-lg font-semibold shadow-lg hover:shadow-2xl transform transition duration-300 hover:scale-105">
                    <span class="inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Zapisz wydarzenie
                    </span>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
