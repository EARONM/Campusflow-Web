<x-app-layout>

<div class="grid grid-cols-12 gap-5 h-[calc(100vh-130px)]">

    <!-- Left Section -->
    <div class="col-span-9 grid grid-rows-[100px_1fr] gap-5">

        <!-- KPI Cards -->
        <div class="grid grid-cols-4 gap-5">

            <!-- Buildings -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm px-5 py-4 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
                            Buildings
                        </p>
                        <h2 class="text-3xl font-bold text-gray-900 mt-1">
                            {{ $totalBuildings }}
                        </h2>
                    </div>

                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600">
                        🏢
                    </div>
                </div>
            </div>

            <!-- Pending -->
            <div class="bg-white rounded-2xl border border-red-100 shadow-sm px-5 py-4 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
                            Pending
                        </p>
                        <h2 class="text-3xl font-bold text-red-600 mt-1">
                            {{ $totalCampuses }}
                        </h2>
                    </div>

                    <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                        !
                    </div>
                </div>
            </div>

            <!-- Energy -->
            <div class="bg-white rounded-2xl border border-lime-100 shadow-sm px-5 py-4 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
                            Energy
                        </p>
                        <h2 class="text-3xl font-bold text-lime-700 mt-1">
                            {{ $totalMeters }}
                        </h2>
                    </div>

                    <div class="w-10 h-10 rounded-xl bg-lime-50 flex items-center justify-center text-lime-700">
                        ⚡
                    </div>
                </div>
            </div>

            <!-- Water -->
            <div class="bg-white rounded-2xl border border-blue-100 shadow-sm px-5 py-4 hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
                            Water
                        </p>
                        <h2 class="text-3xl font-bold text-blue-600 mt-1">
                            {{ $totalUsers }}
                        </h2>
                    </div>

                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
                        💧
                    </div>
                </div>
            </div>

        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-12 gap-5 min-h-0">

            <!-- Chart -->
            <div class="col-span-8 bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex flex-col min-h-0">

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">
                            Utilities Trend
                        </h2>
                        <p class="text-sm text-gray-500">
                            Monthly utility consumption overview
                        </p>
                    </div>

                    <select class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-0">
                        <option>Q1</option>
                        <option>Q2</option>
                        <option>Q3</option>
                        <option>Year</option>
                    </select>
                </div>

                <div class="flex-1 rounded-2xl border border-dashed border-gray-300 bg-gray-50 p-4 relative min-h-[350px]">
                    <canvas id="waterChart"></canvas>
                </div>

            </div>

            <!-- Reports -->
            <div class="col-span-4 bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex flex-col min-h-0">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-900">
                        Reports
                    </h2>

                    <a href="#" class="text-sm font-semibold text-red-600 hover:text-red-700">
                        View All
                    </a>
                </div>

                <div class="space-y-4 overflow-y-auto text-sm">

                    <div class="pb-3 border-b border-gray-100">
                        <p class="font-medium text-gray-800">
                            Broken Water Meter
                        </p>
                        <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                            Pending
                        </span>
                    </div>

                    <div class="pb-3 border-b border-gray-100">
                        <p class="font-medium text-gray-800">
                            FE Expired
                        </p>
                        <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">
                            Urgent
                        </span>
                    </div>

                    <div>
                        <p class="font-medium text-gray-800">
                            Electrical Spike
                        </p>
                        <span class="inline-block mt-2 px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                            Review
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Right Section -->
    <div class="col-span-3 grid grid-rows-[100px_170px_1fr] gap-5">

        <!-- Campus Filter -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 flex flex-col justify-center">

            <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-2">
                Campus
            </p>

            <select class="border border-gray-200 rounded-xl px-3 py-2 text-sm">
                <option>All Campuses</option>
                <option>Main</option>
                <option>Alangilan</option>
            </select>

        </div>

        <!-- Alerts -->
        <div class="bg-gradient-to-br from-[#0d1a12] to-[#183322] text-white rounded-2xl shadow-sm p-5">

            <h2 class="text-lg font-bold mb-4">
                Alerts
            </h2>

            <div class="space-y-3 text-sm">

                <div class="flex justify-between">
                    <span>FE Expired</span>
                    <span class="text-yellow-300">3</span>
                </div>

                <div class="flex justify-between">
                    <span>Meters Offline</span>
                    <span class="text-red-300">2</span>
                </div>

                <div class="flex justify-between">
                    <span>Pending Tasks</span>
                    <span class="text-blue-300">5</span>
                </div>

            </div>

        </div>

        <!-- Activity -->
        <div class="space-y-4 text-sm text-gray-700 overflow-y-auto">

            @forelse($latestReadings as $reading)

            <div class="border-l-2 border-green-500 pl-3">

                <p class="font-semibold">

                    {{ $reading->meter->meter_code ?? '-' }}

                </p>

                <p class="text-xs text-gray-500">

                    {{ $reading->meter->resourceType->name ?? '-' }}

                    •

                    {{ $reading->reading_value }}

                </p>

                <p class="text-xs text-gray-400 mt-1">

                    {{ $reading->created_at->diffForHumans() }}

                </p>

            </div>

            @empty

            <div class="text-gray-400 text-sm">

                No recent activity

            </div>

            @endforelse

        </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx =
    document.getElementById(
        'waterChart'
    );

new Chart(ctx, {

    type: 'line',

    data: {

        labels: @json($chartLabels),

        datasets: [

            {

                label: 'Water',

                data: @json($waterChartData),

                borderWidth: 2,
                tension: 0.4,
            },

            {

                label: 'Electric',

                data: @json($electricChartData),

                borderWidth: 2,
                tension: 0.4,
            },

            {

                label: 'Waste',

                data: @json($wasteChartData),

                borderWidth: 2,
                tension: 0.4,
            }
        ]
    },

    options: {

        responsive: true,

        maintainAspectRatio: false,
    }
});

</script>

</x-app-layout>