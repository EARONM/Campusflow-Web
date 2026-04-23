<x-app-layout>

<div class="grid grid-cols-12 gap-6">

    <!-- Left Section -->
    <div class="col-span-9 space-y-6">

        <!-- Top KPI Cards -->
        <div class="grid grid-cols-3 gap-4">

            <!-- Electricity -->
            <div class="bg-[#101a13] text-white rounded-2xl p-5 shadow">

                <p class="text-sm opacity-80">
                    Total Electricity
                </p>

                <div class="mt-4 flex items-center justify-between">

                    <i class="fa-solid fa-bolt text-5xl"></i>

                    <div class="text-right">
                        <h2 class="text-5xl font-bold">1,420</h2>
                        <p class="text-sm">kWh</p>
                    </div>

                </div>

                <p class="mt-4 text-sm opacity-80">
                    Total of Quarter 1
                </p>

            </div>

            <!-- Water -->
            <div class="bg-[#101a13] text-white rounded-2xl p-5 shadow">

                <p class="text-sm opacity-80">
                    Water Consumption
                </p>

                <div class="mt-4 flex items-center justify-between">

                    <i class="fa-solid fa-droplet text-5xl"></i>

                    <div class="text-right">
                        <h2 class="text-5xl font-bold">235</h2>
                        <p class="text-sm">m³</p>
                    </div>

                </div>

                <p class="mt-4 text-sm opacity-80">
                    Measured from Jan - Mar
                </p>

            </div>

            <!-- Average -->
            <div class="bg-[#101a13] text-white rounded-2xl p-5 shadow">

                <p class="text-sm opacity-80">
                    Avg. Daily Usage
                </p>

                <div class="mt-4 flex items-center justify-between">

                    <i class="fa-solid fa-arrow-trend-up text-5xl"></i>

                    <div class="text-right">
                        <h2 class="text-5xl font-bold">15.8</h2>
                        <p class="text-sm">kWh</p>
                    </div>

                </div>

                <p class="mt-4 text-sm opacity-80">
                    Campus-wide average
                </p>

            </div>

        </div>

        <!-- Energy Chart -->
        <div class="bg-white rounded-2xl shadow p-6">

            <div class="flex items-center justify-between mb-6">

                <h2 class="text-4xl font-bold text-gray-800">
                    Energy Consumption
                </h2>

                <div class="text-sm text-gray-500 flex items-center gap-2">
                    <span>Sort by</span>

                    <span class="text-lime-700 font-semibold">
                        Quarter 1
                    </span>

                    <i class="fa-solid fa-chevron-down text-xs text-lime-700"></i>
                </div>

            </div>

            <!-- Chart -->
            <div class="h-[420px] rounded-xl border border-gray-200 flex items-center justify-center text-gray-400">
                Chart.js / ApexCharts Here
            </div>

            <!-- Legend -->
            <div class="mt-4 flex items-center gap-2 text-gray-700">

                <i class="fa-solid fa-circle text-xs text-lime-700"></i>

                <span>Electricity</span>

            </div>

        </div>

    </div>

    <!-- Right Section -->
    <div class="col-span-3 space-y-6">

        <!-- Alerts -->
        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-3xl font-bold text-[#334a2d] mb-6">
                System Alerts
            </h2>

            <div class="space-y-6 text-gray-700">

                <div class="flex gap-3">
                    <i class="fa-solid fa-triangle-exclamation text-red-600 text-2xl mt-1"></i>
                    <span>High energy spike detected - CICS Bldg.</span>
                </div>

                <div class="flex gap-3">
                    <i class="fa-solid fa-triangle-exclamation text-yellow-500 text-2xl mt-1"></i>
                    <span>Water pump maintenance scheduled - July 2</span>
                </div>

                <div class="flex gap-3">
                    <i class="fa-solid fa-triangle-exclamation text-yellow-500 text-2xl mt-1"></i>
                    <span>Backup generator test this week</span>
                </div>

            </div>

        </div>

        <!-- Top Building -->
        <div class="bg-[#101a13] text-white rounded-2xl shadow p-6">

            <h2 class="text-2xl font-bold leading-snug">
                Top Energy-Consuming Buildings
            </h2>

            <p class="mt-6 text-4xl font-bold">
                CEAFA Building
            </p>

            <div class="mt-6 flex items-end gap-2">

                <h3 class="text-7xl font-bold">480</h3>

                <span class="text-xl mb-2">kWh</span>

            </div>

            <div class="mt-6 flex items-center gap-2 text-sm">

                <i class="fa-solid fa-play text-xs"></i>

                <span>Quarter 1</span>

            </div>

        </div>

    </div>

</div>

</x-app-layout>