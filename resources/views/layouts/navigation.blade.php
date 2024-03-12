<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('displayEvents') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @if(Auth::user()->role == 'user')
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('displayEvents')" :active="request()->routeIs('dashboard')">
                        {{ __('All Events') }}
                    </x-nav-link>
                </div>

                @elseif(Auth::user()->role == 'organiser')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('organiser.organiser_dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __("Statistics") }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('displayEvents')" :active="request()->routeIs('dashboard')">
                        {{ __("All Events") }}
                    </x-nav-link>
                </div>    
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('organiser.myEvents')" :active="request()->routeIs('dashboard')">
                        {{ __('My Events') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('createEvents')" :active="request()->routeIs('dashboard')">
                        {{ __('New Events') }}
                    </x-nav-link>
                </div>
                @elseif(Auth::user()->role == 'admin')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.admin_dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __("Statistics") }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('dashboard')">
                        {{ __("All Users") }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('displayEvents')" :active="request()->routeIs('dashboard')">
                        {{ __('All Events') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('validationEvents')" :active="request()->routeIs('dashboard')">
                        {{ __('Validation Page') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">    
                    <x-nav-link :href="route('admin.categories')" :active="request()->routeIs('dashboard')">
                        {{ __('Categories') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">    
                    <x-nav-link :href="route('createCategories')" :active="request()->routeIs('dashboard')">
                        {{ __('New Categories') }}
                    </x-nav-link>
                </div>
                @endif
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <img class="w-8 h-8 rounded-full" src="{{asset('' . Auth::user()->photo )}}" alt="user picture">
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- <!-- Search -->
    <form class="flex items-center justify-center mt-5" method="post" action="{{route('search')}}" name="search">  
        @csrf 
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-3/4"> <!-- Adjust the width here, e.g., w-1/2, w-2/3, etc. -->
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                </svg>
            </div>
            <input type="search" name="search" value="{{request()->search ?? ''}}" class="search-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-black block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="Search ..." required>
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-black rounded-lg border border-orange-600 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
    </form> --}}

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @if(Auth::user()->role == 'user')
            {{-- <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div> --}}
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('displayEvents')" :active="request()->routeIs('dashboard')">
                    {{ __('All Events') }}
                </x-responsive-nav-link>
            </div>

        @elseif(Auth::user()->role == 'organiser')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('organiser.organiser_dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Statistics') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">    
                <x-responsive-nav-link :href="route('displayEvents')" :active="request()->routeIs('dashboard')">
                    {{ __('All Events') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">    
                <x-responsive-nav-link :href="route('organiser.myEvents')" :active="request()->routeIs('dashboard')">
                    {{ __('My Events') }}
                </x-responsive-nav-link>
            </div> 
            <div class="pt-2 pb-3 space-y-1">   
                <x-responsive-nav-link :href="route('createEvents')" :active="request()->routeIs('dashboard')">
                    {{ __('New Events') }}
                </x-responsive-nav-link>
            </div>

        @elseif(Auth::user()->role == 'admin')    
        <div class="pt-2 pb-3 space-y-1">   
            <x-responsive-nav-link :href="route('admin.admin_dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Statistics') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">   
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('dashboard')">
                {{ __('All Users') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">   
            <x-responsive-nav-link :href="route('displayEvents')" :active="request()->routeIs('dashboard')">
                {{ __('All Events') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">   
            <x-responsive-nav-link :href="route('validationEvents')" :active="request()->routeIs('dashboard')">
                {{ __('Validation Page') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">   
            <x-responsive-nav-link :href="route('admin.categories')" :active="request()->routeIs('dashboard')">
                {{ __('Categories') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">   
            <x-responsive-nav-link :href="route('createCategories')" :active="request()->routeIs('dashboard')">
                {{ __('New Categories') }}
            </x-responsive-nav-link>
        </div>
        @endif    
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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

<!-- Search -->
@if(request()->is('events/display/all', 'myEvents'))
    <form class="flex items-center justify-center mt-5" method="post" action="{{route('search')}}" name="search">  
        @csrf 
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-3/4"> <!-- Adjust the width here, e.g., w-1/2, w-2/3, etc. -->
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                </svg>
            </div>
            <input type="search" name="search" value="{{request()->search ?? ''}}" class="search-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-black block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="Search ..." required>
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-black rounded-lg border border-orange-600 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
    </form>
@endif