<div id="sidebarOverlay"
class="fixed inset-0 bg-black/40 z-30 hidden lg:hidden"></div>

<aside id="sidebar"
class="fixed top-0 left-0 z-40 w-72 h-screen bg-[#08110c] text-white
transition-all duration-300 shadow-2xl flex flex-col overflow-hidden">

    <div class="h-16 px-6 border-b border-white/10 flex items-center gap-3">

        <img src="{{ asset('assets/img/bsu.png') }}"
             class="w-10 h-10 object-contain shrink-0">

        <h1 class="sidebar-text text-2xl font-bold tracking-tight whitespace-nowrap">
            CampusFlow
        </h1>

    </div>

    <nav class="px-4 py-5 space-y-2 flex-1">

        <a href="{{ route('dashboard') }}"
           class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition
           {{ request()->routeIs('dashboard')
              ? 'bg-red-500 text-white font-semibold'
              : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
            <i class="fa-solid fa-table-columns w-5 shrink-0"></i>
            <span class="sidebar-text">Dashboard</span>
        </a>

        <a href="{{ route('statistics') }}"
           class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition
           {{ request()->routeIs('statistics')
              ? 'bg-red-500 text-white font-semibold'
              : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
            <i class="fa-solid fa-chart-column w-5 shrink-0"></i>
            <span class="sidebar-text">Statistics</span>
        </a>

        <a href="{{ route('reports') }}"
           class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition
           {{ request()->routeIs('reports')
              ? 'bg-red-500 text-white font-semibold'
              : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
            <i class="fa-solid fa-file-lines w-5 shrink-0"></i>
            <span class="sidebar-text">Reports</span>
        </a>    

        <a href="{{ route('database') }}"
           class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl transition
           {{ request()->routeIs('database')
              ? 'bg-red-500 text-white font-semibold'
              : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
            <i class="fa-solid fa-database w-5 shrink-0"></i>
            <span class="sidebar-text">Database</span>
        </a>

    </nav>
    
</aside>