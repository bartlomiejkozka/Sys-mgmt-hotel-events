<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="false" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                      Icon when menu is open.

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex justify-center items-center">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
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
    <div class="hidden" id="mobile-menu">
        <div class="flex flex-col space-y-1 px-2 pt-2 pb-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/home" id="1" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Strona główna</a>
            <a href="/events" id="2" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Lista wydarzeń</a>
            <a href="/form" id="3" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Zapisz się na wydarzenie</a>
            <a href="/myevents" id="4" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Moje zapisy</a>
            <a href="/notifications" id="5" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Powiadomienia</a>
            <a href="/opinions" id="6" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Opinie i oceny</a>
        </div>
    </div>
</nav>
<script>
    // get elements
    const toggleButton = document.querySelector('button[aria-controls="mobile-menu"]');
    const mobileMenu = document.getElementById("mobile-menu");

    // click event
    toggleButton.addEventListener("click", () => {
        const isExpanded = toggleButton.getAttribute("aria-expanded") === "true";

        // Zmiana wartości aria-expanded
        toggleButton.setAttribute("aria-expanded", !isExpanded);

        // Przełączanie widoczności elementu kontrolowanego
        if (isExpanded) {
            mobileMenu.classList.add("hidden"); // Ukrywanie menu
        } else {
            mobileMenu.classList.remove("hidden"); // Pokazywanie menu
        }
    })

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

