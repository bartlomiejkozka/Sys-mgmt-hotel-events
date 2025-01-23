<x-app-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 mt-4 overflow-hidden">
        <div class="relative min-h-[70dvh] flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="flex justify-center">
                    <!-- Added transition duration for slower color change -->
                    <h1 class="text-5xl font-bold text-black hover:text-[#FF6B3E] mb-12 mt-4 transition-colors duration-500">
                        Powiadomienie
                    </h1>
                </main>
                <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">
                    <!-- Notification Card -->
                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-xl bg-white p-8 shadow-xl ring-1 ring-gray-200 hover:ring-[#FF2D20] transition duration-300 transform hover:scale-102 lg:p-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:ring-[#FF2D20] dark:hover:text-white/80">
                        <div class="space-y-6">

                            <div class="border-b pb-6">
                                <div class="font-bold text-2xl text-[#FF2D20] mb-2">{{ $notification->title }}</div>
                                <p class="text-gray-700 dark:text-gray-300 text-lg">{{ $notification->body }}</p>

                                <!-- Delete Button -->
                                <div class="flex mt-4">
                                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notification?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-6 py-2 text-white bg-red-500 rounded-lg shadow-md hover:bg-red-600 transform transition duration-200 hover:scale-105">
                                            Usuń
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="mt-6">
                            <a href="/admin/notifications" class="inline-block px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transform transition duration-300 hover:scale-105 shadow-lg">
                                Wróć
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
