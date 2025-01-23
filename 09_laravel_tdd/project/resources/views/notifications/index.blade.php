<x-app-layout>
    <div class="bg-gradient-to-r from-gray-100 to-gray-200 text-black/70 dark:bg-zinc-900 dark:text-white/80 mt-4 overflow-scroll">
        <div class="relative min-h-[70dvh] flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="flex justify-center">
                    <h1 class="text-5xl font-extrabold text-black mb-12 mt-4 text-center transition-all duration-300 transform hover:text-[#FF6B3E]">
                        Wszystkie powiadomienia
                    </h1>
                </main>
                <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">

                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-xl bg-white p-6 shadow-2xl ring-1 ring-white/[0.1] transition-all duration-300 transform hover:scale-102 hover:ring-[#FF2D20] focus:outline-none focus-visible:ring-[#FF2D20] lg:p-10 lg:pb-10 dark:bg-zinc-800 dark:ring-zinc-700 dark:hover:ring-[#FF2D20] dark:text-white">
                        <div class="space-y-6">
                            @foreach($notifications as $notification)
                                <div class="border-b pb-6">
                                    <div class="font-semibold text-2xl text-[#FF2D20] mb-2 hover:text-[#FF6B3E] transition-colors duration-200">
                                        <span class="inline-flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FF2D20]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                            {{ $notification->title }}
                                        </span>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300">{{ $notification->body }}</p>

                                    <div class="flex mt-4 gap-4">
                                        <div class="p-2">

                                            <a href="{{ route('notifications.show', $notification->id) }}" class="inline-block px-6 py-2 text-white bg-yellow-400 rounded-lg shadow-lg hover:bg-yellow-500 transition-all duration-300 transform hover:scale-105">
                                                Pokaż powiadomienie
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="mt-6">
                            <a href="notifications/create" class="inline-block px-6 py-2 text-white bg-green-500 rounded-lg shadow-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105">
                                <span class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Utwórz nowe powiadomienie
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
