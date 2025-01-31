<x-app-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 mt-4 overflow-hidden">
        <div class="relative min-h-[70dvh] flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="flex justify-center">
                    <h1 class="text-5xl font-bold text-black hover:text-[#FF6B3E] mb-12 mt-4 transition-colors">
                        Opinie
                    </h1>
                </main>
                <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">

                    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-xl bg-white p-8 shadow-lg ring-1 ring-gray-200 hover:ring-[#FF2D20] transition duration-300 transform hover:scale-102 lg:p-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:ring-[#FF2D20] dark:hover:text-white/80">
                        <div class="space-y-6">

                            <div class="border-b pb-6">
                                @foreach($reviews as $review)
                                    <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900 border-2">
                                        <footer class="flex justify-between items-center mb-2">
                                            <div class="flex items-center">
                                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">{{ $review->user->name }}</p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="{{ $review->created_at }}" title="{{ $review->created_at }}">{{ $review->created_at->format('M d, Y') }}</time></p>
                                            </div>
                                        </footer>
                                        <p class="text-gray-500 dark:text-gray-400">{{ $review->comment }}</p>
                                        <p class="text-gray-500 dark:text-gray-400">Rating: {{ $review->rating }} / 5</p>
                                    </article>
                                @endforeach
                            </div>


                        </div>

                    </div>

                        <div class="mt-6">
                            <a href="/admin/reports" class="inline-block px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition duration-300 transform hover:scale-105 shadow-lg">
                                Wróć
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
