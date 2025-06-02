<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Powiadomienia</title>
</head>
<body>
<x-Menu/>
<div class="flex flex-col items-center">
    <div class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 mt-4">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Powiadomienia</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($notifications as $notification)
                    <li class="py-3 sm:py-4">
                        <div class="flex flex-col items-start">
                            <!-- Title and Date in the same row -->
                            <div class="flex justify-between w-full">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$notification->title}}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{$notification->created_at}}
                                </p>
                            </div>
                            <!-- Body below -->
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400 mt-1">
                                {{$notification->body}}
                            </p>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
</body>
</html>
