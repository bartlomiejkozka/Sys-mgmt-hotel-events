<x-app-layout>
    <div class="min-h-screen bg-white dark:bg-black transition-colors duration-300">
    <h1 class="text-center mt-6 text-3xl">
        <span class="inline-flex items-center gap-2 font-bold text-black dark:text-white hover:text-[#FF6B3E] transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF2D20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.25c.414 0 .75.336.75.75v1.5a.75.75 0 01-1.5 0V3c0-.414.336-.75.75-.75zm6.364 2.636a.75.75 0 011.06 1.061l-1.06 1.06a.75.75 0 01-1.061-1.06l1.06-1.061zm4.636 7.114c0-.414.336-.75.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm-2.636 6.364a.75.75 0 01-1.061 1.06l-1.06-1.06a.75.75 0 011.06-1.061l1.061 1.06zM12 19.5c.414 0 .75.336.75.75v1.5a.75.75 0 01-1.5 0v-1.5c0-.414.336-.75.75-.75zm-6.364-2.636a.75.75 0 01-1.06-1.061l1.06-1.06a.75.75 0 011.061 1.06l-1.061 1.061zm-4.636-7.114c0-.414-.336-.75-.75-.75H.75a.75.75 0 010-1.5h1.5c.414 0 .75.336.75.75zm2.636-6.364a.75.75 0 011.061-1.06l1.06 1.06a.75.75 0 01-1.061 1.061L3.636 4.386zm12.236 6.114a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm-1.5 0a3 3 0 10-6 0 3 3 0 006 0z" />
            </svg>
            Edytuj wydarzenie
        </span>
    </h1>

    <div class="flex justify-center mt-8">
        <form action="{{ route('events.update', $event->id) }}" method="POST" class="max-w-xl w-full bg-gradient-to-br from-white via-gray-50 to-gray-100 dark:from-zinc-900 dark:via-zinc-800 dark:to-zinc-700 rounded-xl shadow-lg p-6 transform transition duration-300 hover:scale-105" id="edit-event-form">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="name" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Tytuł wydarzenia</label>
                <input type="text" name="name" id="name" required value="{{ old('name', $event->name) }}"
                       class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]" />
            </div>

            <div class="mb-5">
                <label for="description" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Opis wydarzenia</label>
                <textarea name="description" id="description" rows="3" required
                          class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="mb-5">
                <label for="location" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Lokalizacja</label>
                <input type="text" name="location" id="location" required value="{{ old('location', $event->location) }}"
                       class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]" />
            </div>

            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="event_date" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Data wydarzenia</label>
                    <input type="date" name="event_date" id="event_date" required value="{{ old('event_date', $event->event_date) }}"
                           class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]" />
                </div>
                <div>
                    <label for="event_time" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Godzina wydarzenia</label>
                    <input type="time" name="event_time" id="event_time" required value="{{ old('event_time', $event->event_time) }}"
                           class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]" />
                </div>
            </div>

            <div class="mb-5">
                <label for="max_participants" class="block text-md font-semibold text-gray-800 dark:text-gray-200 mb-1">Maksymalna liczba uczestników</label>
                <input type="number" name="max_participants" id="max_participants" min="1" required value="{{ old('max_participants', $event->max_participants) }}"
                       class="block w-full px-3 py-2 border rounded-lg shadow-sm text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-zinc-800 focus:ring-2 focus:ring-[#FF2D20] focus:border-[#FF2D20]" />
            </div>

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
    </div>

    <script>
        let isFormChanged = false;
        // funkcja do wykrywania formularzu
        const form = document.getElementById('edit-event-form');
        form.addEventListener('input', () => {
            isFormChanged = true;
        });

        const formSubmitButton = form.querySelector('button[type="submit"]');
        formSubmitButton.addEventListener('click', () => {
            isFormChanged = false;
        });

        // do proby opuszczenia strony
        window.addEventListener('beforeunload', (event) => {
            if (isFormChanged) {
                const confirmationMessage = 'Masz niezapisane zmiany. Jeśli opuścisz stronę, zmiany zostaną utracone.';
                (event || window.event).returnValue = confirmationMessage;
                return confirmationMessage;
            }
        });
    </script>
</x-app-layout>
