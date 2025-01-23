<x-app-layout>
    <h1 class="text-center mt-6 text-3xl font-bold text-[#FF2D20]">
        <span class="inline-flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF2D20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Utwórz nowe powiadomienie
        </span>
    </h1>

    <div class="flex justify-center mt-8">
        <form action="{{ route('notifications.store') }}" method="POST" class="max-w-xl w-full bg-gradient-to-br from-white via-gray-50 to-gray-100 dark:from-zinc-900 dark:via-zinc-800 dark:to-zinc-700 rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105">
            @csrf
            <!-- Tytuł powiadomienia -->
            <div class="mb-5">
                <label for="title" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Tytuł powiadomienia</label>
                <input type="text" name="title" id="title" required
                       class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]">
            </div>

            <!-- Opis powiadomienia -->
            <div class="mb-5">
                <label for="body" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Opis powiadomienia</label>
                <textarea name="body" id="body" rows="4" required
                          class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]"></textarea>
            </div>

            <!-- Przycisk zapisz -->
            <div class="text-center">
                <button type="submit"
                        class="w-full bg-gradient-to-r from-[#FF7A7A] to-[#FF2D20] text-white px-5 py-2 rounded-lg font-semibold shadow-lg hover:shadow-2xl transform transition duration-300 hover:scale-105">
                    <span class="inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Zapisz powiadomienie
                    </span>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
