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

<!-- Komunikat o sukcesie -->
@if(session()->has('message'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('message') }}
    </div>
@endif

<!-- Komunikaty o błędach -->
@if($errors->any())
    <div class="bg-red-500 text-white p-4 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1 class="text-center mt-3">Zapisz się na wydarzenie</h1>

<div class="flex justify-center mt-4">
    <!-- Formularz -->
    <form method="POST" action="{{ route('reservations.store') }}" class="max-w-md mx-auto mt-10">
        @csrf

        <!-- First Name -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="first_name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Imię
                </label>
                <input name="first_name" id="first_name" type="text" placeholder="Jane"
                       class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('first_name') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       value="{{ old('first_name') }}">
                @error('first_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="w-full md:w-1/2 px-3">
                <label for="last_name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Nazwisko
                </label>
                <input name="last_name" id="last_name" type="text" placeholder="Doe"
                       class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('last_name') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       value="{{ old('last_name') }}">
                @error('last_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    E-mail
                </label>
                <input name="email" id="email" type="email" placeholder="joedoe@example.com"
                       class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('email') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       value="{{ old('email') }}">
                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Event Selection -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="event_id" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Dostępne Wydarzenia
                </label>
                <select name="event_id" id="event_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('event_id') border-red-500 @else border-gray-200 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Wybierz wydarzenie</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                            {{ $event->name }}
                        </option>
                    @endforeach
                </select>
                @error('event_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
            <x-primary-button class="ms-3">{{ __('Zapisz się') }}</x-primary-button>
        </div>
    </form>
</div>

</body>
</html>
