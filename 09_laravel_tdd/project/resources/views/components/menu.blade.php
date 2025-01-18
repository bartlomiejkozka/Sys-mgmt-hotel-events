<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex shrink-0 items-center">
                <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
            <div class="hidden sm:block">
                <div class="flex space-x-4 justify-center">
                    <a href="/home" id="1" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Strona główna</a>
                    <a href="/events" id="2" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Lista wydarzeń</a>
                    <a href="/form" id="3" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Zapisz się na wydarzenie</a>
                    <a href="/myevents" id="4" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Moje zapisy</a>
                    <a href="/notifications" id="5" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Powiadomienia</a>
                    <a href="/opinions" id="6" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Opinie i oceny</a>
                </div>
            </div>
            <div class="flex shrink-0">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script>
    let currentPage = "";
    const tab = [];
    tab.length = 6;
    for( let i = 1; i <= 6; i++ ){
        tab[i-1] = document.getElementById(i.toString());  // Zamiana i na string, aby działało z getElementById
    }
    const bg = "bg-gray-900";
    let path = window.location.pathname;
    let cleanPath = path.substring(1); // Usunięcie pierwszego slash'a
    switch (cleanPath) {
        case "home":
            tab[0].classList.add(bg);
            break;
        case "events":
            tab[1].classList.add(bg);
            break;
        case "form":
            tab[2].classList.add(bg);
            break;
        case "myevents":
            tab[3].classList.add(bg);
            break;
        case "notifications":
            tab[4].classList.add(bg);
            break;
        case "opinions":
            tab[5].classList.add(bg);
            break;
        default:
            break;
    }
</script>

