<x-app-layout>
<h1 class="text-center mt-10 text-3xl font-bold">Utwórz nowe powiadomienie</h1>

<div class="flex justify-center mt-8">
    <form action="{{ route('notifications.store') }}" method="POST" class="max-w-lg w-full bg-white rounded-lg shadow-md p-6">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Tytuł powiadomienia</label>
            <input type="text" name="title" id="title" required
                   class="block w-full px-4 py-2 border rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20]">
        </div>

        <div class="mb-4">
            <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Opis powiadomienia</label>
            <textarea name="body" id="body" rows="4" required
                      class="block w-full px-4 py-2 border rounded-lg focus:ring-[#FF2D20] focus:border-[#FF2D20]"></textarea>
        </div>

        <div class="mb-6">
            <div class="text-center mt-6">
                <button type="submit"
                        class="w-full bg-red-400 text-black px-4 py-2 rounded-lg font-semibold hover:bg-[#E12C1E]">
                    Zapisz powiadomienie
                </button>
            </div>
        </div>


    </form>
</div>
</x-app-layout>

