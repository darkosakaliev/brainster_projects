<nav x-data="{ open: false }" class="bg-white border-b-4 border-custom-orange">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo />
                    </a>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px md:flex sm:mr-10">
                    @if(request()->routeIs(['projects', 'profile', 'applications']))
                    <x-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
                        {{ __('My Projects') }}
                    </x-nav-link>
                    <x-nav-link :href="route('applications')" :active="request()->routeIs('applications')">
                        {{ __('My Applications') }}
                    </x-nav-link>
                    <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                        {{ __('My Profile') }}
                    </x-nav-link>
                    @endif
                </div>
                <a href="{{ route('projects') }}">
                    <img src="" alt="" class="w-10 h-10 rounded-full">
                </a>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
                {{ __('My Projects') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('applications')" :active="request()->routeIs('applications')">
                {{ __('My Applications') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                {{ __('My Profile') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
