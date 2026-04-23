<header class="bg-[#dddddd] border-b border-gray-300 px-6 py-4">

    <div class="flex items-center justify-between">

        <!-- Left Side -->
        <div>
            <h1 class="text-4xl font-bold text-gray-900">
                Dashboard
            </h1>

            <p class="text-sm text-gray-600 mt-1">
                CampusFlow Control Panel
            </p>
        </div>

        <!-- Right Side -->
        <div class="flex items-center gap-4">

            <!-- User Info -->
            <div class="text-right">
                <h2 class="text-xl font-semibold text-gray-900 leading-tight">
                    {{ Auth::user()->name }}
                </h2>

                <span class="inline-block mt-1 bg-[#1f2b20] text-white text-sm px-3 py-1 rounded-md">
                    {{ Auth::user()->role }}
                </span>
            </div>

            <!-- Profile Image -->
            <div class="w-14 h-14 rounded-full overflow-hidden border-2 border-blue-500 bg-white">
                <img src="{{ asset('assets/img/ken.png') }}"
                     alt="Profile"
                     class="w-full h-full object-cover">
            </div>

        </div>

    </div>

</header>