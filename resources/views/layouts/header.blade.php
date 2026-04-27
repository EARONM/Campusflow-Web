@php
$title = match(true) {
    request()->routeIs('dashboard') => 'Dashboard',
    request()->routeIs('statistics') => 'Statistics',
    request()->routeIs('reports') => 'Reports',
    request()->routeIs('notifications') => 'Notifications',
    request()->routeIs('database') => 'Database',
    default => 'CampusFlow'
};
@endphp

<header class="fixed top-0 right-0 left-0 lg:left-72 h-16 bg-white border-b border-gray-200 z-50">

    <div class="h-full px-6 flex items-center justify-between">

        <!-- Left -->
        <div class="flex items-center gap-4">

            <button id="menuBtn"
                    class="lg:hidden text-xl text-gray-700">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    {{ $title }}
                </h1>

                <p class="text-xs text-gray-500">
                    CampusFlow Control Panel
                </p>
            </div>

        </div>

        <!-- Right -->
        <div class="flex items-center gap-4">

            <button class="relative text-gray-500">
                <i class="fa-solid fa-bell text-lg"></i>
                <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>

            <div class="text-right hidden sm:block">
                <p class="text-sm font-semibold text-gray-900">
                    {{ Auth::user()->name }}
                </p>

                <span class="text-xs text-gray-500">
                    {{ Auth::user()->role }}
                </span>
            </div>

            <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-300">
                <img src="{{ asset('assets/img/ken.png') }}" class="w-full h-full object-cover">
            </div>

        </div>

    </div>

</header>