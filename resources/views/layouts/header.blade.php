@php
$title = match(true) {
    request()->routeIs('dashboard') => 'Dashboard',
    request()->routeIs('statistics') => 'Statistics',
    request()->routeIs('reports') => 'Reports',
    request()->routeIs('notifications') => 'Notifications',
    request()->routeIs('database') => 'Database',
    request()->routeIs('users') => 'Manage Users',
    default => 'CampusFlow'
};
@endphp

<header id="mainHeader"
class="fixed top-0 right-0 left-0 lg:left-72 h-16 bg-white border-b border-gray-200 z-50 transition-all duration-300">

    <div class="h-full px-6 flex items-center justify-between">

        <!-- Left -->
        <div class="flex items-center gap-4">

            <button id="menuBtn" class="text-xl text-gray-700">
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
                    {{ Auth::user()->role->name ?? 'User' }}
                </span>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative">

                <button id="profileBtn"
                    class="w-10 h-10 rounded-full overflow-hidden border border-gray-300">
                    <img src="{{ asset('assets/img/ken.png') }}"
                         class="w-full h-full object-cover">
                </button>

                <div id="profileMenu"
                    class="hidden absolute right-0 mt-3 w-56 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden">

                    @if(Auth::user()->role && in_array(Auth::user()->role->name, ['SuperAdmin', 'CampusAdmin']))
                        <a href="{{ route('users') }}"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition">
                            <i class="fa-solid fa-users w-4"></i>
                            <span>Manage Users</span>
                        </a>
                    @endif

                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition">
                        <i class="fa-solid fa-user-gear w-4"></i>
                        <span>Account Settings</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-gray-100 transition">

                            <i class="fa-solid fa-right-from-bracket w-4"></i>
                            <span>Logout</span>

                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</header>