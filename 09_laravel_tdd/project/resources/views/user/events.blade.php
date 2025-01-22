<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel</title>
    <style>
        .event{
            width: 500px;
        }
    </style>
</head>
<body>
    <x-Menu/>
    <div class="flex flex-col items-center gap-2 mt-10">
        @foreach($events as $event)
        <div class="event rounded overflow-hidden border border-gray-200">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $event->name }}</div>
                    <p class="text-gray-700 text-base">
                    {{ $event->description }}
                    </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $event->location }}</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $event->event_date }}</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $event->event_time }}</span>
            </div>
        </div>
        <div class="max-w-lg rounded overflow-hidden border border-gray-200">
        </div>
        @endforeach
    </div>
</body>
</html>
