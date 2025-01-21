<x-app-layout>
<x-AdminMenu />
<h1 class="text-center mt-10 text-3xl font-bold">Utwórz nowe wydarzenie</h1>

<div class="flex justify-center mt-8">
    <form action="/admin/events/store" method="POST" class="max-w-lg w-full bg-white rounded-lg shadow-md p-6">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Tytuł wydarzenia</label>
            <input type="text" name="title" id="title" required
                   class="block w-full px-4 py-2 border rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20]">
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Data wydarzenia</label>
            <input type="date" name="date" id="date" required
                   class="block w-full px-4 py-2 border rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20]">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Opis wydarzenia</label>
            <textarea name="description" id="description" rows="4" required
                      class="block w-full px-4 py-2 border rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20]"></textarea>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokalizacja</label>
            <input type="text" name="location" id="location" required
                   class="block w-full px-4 py-2 border rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20]">
        </div>

        <div class="mb-6">
            <label for="max_participants" class="block text-sm font-medium text-gray-700 mb-2">Maksymalna liczba uczestników</label>
            <input type="number" name="max_participants" id="max_participants" min="1" required
                   class="block w-full px-4 py-2 border rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20]">
            <div class="text-center mt-6">
                <button type="submit"
                        class="w-full bg-[#FF2D20] text-black px-4 py-2 rounded-lg font-semibold hover:bg-[#E12C1E]">
                    Zapisz wydarzenie
                </button>
            </div>
        </div>


    </form>
</div>
</x-app-layout>

