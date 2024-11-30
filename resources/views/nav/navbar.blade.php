<nav class="block top-0 left-0 w-full bg-tertiary z-50">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" id="mobile-menu-button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-quinary hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    <img class="h-8 w-auto" src="{{ asset('M.png') }}" alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ url('/') }}"
                            class="rounded-md bg-tertiary px-3 hover:bg-primary py-2 text-sm font-medium text-quinary">Home</a>
                        @if (Auth::check() && Auth::user()->id)
                            <a href="{{ route('user.leaderboard.get', Auth::user()->id) }}"
                                class="rounded-md px-3 py-2 text-sm font-medium text-quinary hover:bg-primary hover:text-white">Leaderboard</a>
                        @else
                            <a href="{{ route('user.leaderboard.getAll') }}"
                                class="rounded-md px-3 py-2 text-sm font-medium text-quinary hover:bg-primary hover:text-quinary">Leaderboard</a>
                        @endif
                        <a href="#"
                            class="rounded-md px-3 py-2 text-sm font-medium text-quinary hover:bg-primary hover:text-quinary">Event</a>
                        <a href="#"
                            class="rounded-md px-3 py-2 text-sm font-medium text-quinary hover:bg-primary hover:text-quinary">Class</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                <!-- Profile dropdown -->
                <div class="relative ml-3">
                    <div>
                        <button type="button"
                            class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <x-iconoir-profile-circle class="bg-tertiary" />
                        </button>
                    </div>

                    <!--
              Dropdown menu, show/hide based on menu state.
  
              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md  py-1 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none hidden"
                            id="user-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            @if (Auth::check() && Auth::user()->id)
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-quinary"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-quinary" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Sign out</a>
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-quinary" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Login</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#"
                class="block rounded-md bg-tertiary px-3 py-2 text-base hover:bg-primary font-medium text-quinary">Home</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-quinary hover:bg-primary hover:text-quinary">Leaderboard</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-quinary hover:bg-primary hover:text-quinary">Event</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-gquinary hover:bg-primary hover:text-quinary">Class</a>
        </div>
    </div>
</nav>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Mobile Menu Toggle
        $('#mobile-menu-button').on('click', function () {
            $('#mobile-menu').toggleClass('hidden');
        });

        // User Profile Dropdown Toggle
        $('#user-menu-button').on('click', function () {
            $('#user-menu').toggleClass('hidden');
        });
    });
</script>