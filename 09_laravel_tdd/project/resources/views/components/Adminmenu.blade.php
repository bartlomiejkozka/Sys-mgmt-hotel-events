<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex shrink-0 items-center">
                <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
            <div class="hidden sm:block">
                <div class="flex space-x-4 justify-center">
                    <a href="/admin" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Strona główna</a>
                    <a href="/admin/events" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Lista wydarzeń</a>
                    <a href="/admin/notifications" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Powiadomienia</a>
                    <a href="/admin/reports" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Raporty</a>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-logout :href="route('logout')"
                          onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Wyloguj się') }}
                </x-logout>
            </form>
        </div>
    </div>
</nav>


