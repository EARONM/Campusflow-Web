<aside class="w-72 min-h-screen bg-[#101a13] text-white flex flex-col">

    <!-- Logo -->
    <div class="px-6 pt-6 pb-8">
        <div class="flex items-center gap-3">

            <img src="{{ asset('assets/img/bsu.png') }}"
                 alt="Logo"
                 class="w-14 h-14 object-contain">

            <h1 class="text-3xl font-bold tracking-tight">
                CampusFlow
            </h1>

        </div>
    </div>

    <!-- Main Menu -->
    <nav class="px-5 space-y-3">

        <!-- Active -->
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 bg-[#ff3b3b] text-white px-4 py-3 rounded-xl font-semibold">
            <i class="fa-solid fa-table-columns w-5 text-center"></i>
            <span>Dashboard</span>
        </a>

        <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white px-4 py-3 rounded-xl hover:bg-white/5 transition">
            <i class="fa-solid fa-chart-column w-5 text-center"></i>
            <span>Statistics</span>
        </a>

        <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white px-4 py-3 rounded-xl hover:bg-white/5 transition">
            <i class="fa-solid fa-file-lines w-5 text-center"></i>
            <span>Reports</span>
        </a>

        <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white px-4 py-3 rounded-xl hover:bg-white/5 transition">
            <i class="fa-solid fa-bell w-5 text-center"></i>
            <span>Notifications</span>
        </a>

        <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white px-4 py-3 rounded-xl hover:bg-white/5 transition">
            <i class="fa-solid fa-database w-5 text-center"></i>
            <span>Database</span>
        </a>

    </nav>

    <!-- Bottom Menu -->
    <div class="mt-auto px-5 pb-6 space-y-3">

        <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white px-4 py-3 rounded-xl hover:bg-white/5 transition">
            <i class="fa-solid fa-gear w-5 text-center"></i>
            <span>Settings</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="w-full flex items-center gap-3 text-gray-400 hover:text-white px-4 py-3 rounded-xl hover:bg-white/5 transition text-left">
                <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                <span>Log Out</span>
            </button>
        </form>

        <a href="#" class="flex items-center gap-3 text-gray-400 hover:text-white px-4 py-3 rounded-xl hover:bg-white/5 transition">
            <i class="fa-solid fa-circle-question w-5 text-center"></i>
            <span>Help</span>
        </a>

    </div>

</aside>