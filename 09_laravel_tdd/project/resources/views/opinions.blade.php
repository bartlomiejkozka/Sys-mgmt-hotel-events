<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel</title>
</head>
<body>
<x-Menu/>
<section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion</h2>
        </div>

        <!-- Formularz do dodania komentarza -->
        <form method="POST" action="{{ route('reviews.add') }}" class="mb-6">
            @csrf

            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" name="comment" rows="6"
                          class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                          placeholder="Write a comment..." required></textarea>
            </div>

            <!-- Lista dostępnych wydarzeń -->
            <div class="mb-4">
                <label for="event_id" class="text-sm text-gray-700 dark:text-gray-300">Choose Event:</label>
                <select id="event_id" name="event_id" class="w-full py-2 px-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    <option value="">Select an event</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }} - {{ $event->event_date }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Wybór oceny -->
            <div class="mb-4">
                <label for="rating" class="text-sm text-gray-700 dark:text-gray-300">Rating:</label>
                <select id="rating" name="rating" class="w-full py-2 px-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    <option value="">Select a rating</option>
                    <option value="1">1 - Poor</option>
                    <option value="2">2 - Fair</option>
                    <option value="3">3 - Good</option>
                    <option value="4">4 - Very Good</option>
                    <option value="5">5 - Excellent</option>
                </select>
            </div>

            <x-primary-button class="ms-3">
                {{ __('Post comment') }}
            </x-primary-button>
        </form>

        <!-- Wyświetlanie komentarzy -->
        @foreach($reviews as $review)
            <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
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
</section>
</body>
</html>
