<x-app-layout>

<div class="grid grid-cols-12 gap-5 h-[calc(100vh-130px)]">

    <!-- Left Main Section -->
    <div class="col-span-9 grid grid-rows-[auto_1fr] gap-5">

        <!-- KPI Cards -->
        <div class="grid grid-cols-3 gap-5">

            <!-- Electricity -->
            <div class="bg-gradient-to-br from-[#0d1a12] to-[#183322] text-white rounded-2xl border border-[#21392c] shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-gray-300">
                            Total Electricity
                        </p>
                        <p class="text-sm text-gray-400 mt-1">
                            Quarter 1 Summary
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <h2 class="text-4xl font-bold">1,420</h2>
                    <span class="text-sm text-gray-300 mb-1">kWh</span>
                </div>
            </div>

            <!-- Water -->
            <div class="bg-gradient-to-br from-[#0d1a12] to-[#183322] text-white rounded-2xl border border-[#21392c] shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-gray-300">
                            Water Usage
                        </p>
                        <p class="text-sm text-gray-400 mt-1">
                            Jan - Mar Reading
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fa-solid fa-droplet"></i>
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <h2 class="text-4xl font-bold">235</h2>
                    <span class="text-sm text-gray-300 mb-1">m³</span>
                </div>
            </div>

            <!-- Average -->
            <div class="bg-gradient-to-br from-[#0d1a12] to-[#183322] text-white rounded-2xl border border-[#21392c] shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-gray-300">
                            Avg Daily Usage
                        </p>
                        <p class="text-sm text-gray-400 mt-1">
                            Campus Average
                        </p>
                    </div>

                    <div class="w-11 h-11 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                    </div>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <h2 class="text-4xl font-bold">15.8</h2>
                    <span class="text-sm text-gray-300 mb-1">kWh</span>
                </div>
            </div>

        </div>

        <!-- Chart Section -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 flex flex-col min-h-0">

            <div class="flex items-center justify-between mb-5">

                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Energy Consumption
                    </h2>

                    <p class="text-sm text-gray-500">
                        Utility trend across selected period
                    </p>
                </div>

                <select class="border border-gray-200 rounded-xl px-3 py-2 text-sm">
                    <option>Quarter 1</option>
                    <option>Quarter 2</option>
                    <option>Quarter 3</option>
                    <option>Yearly</option>
                </select>

            </div>

            <div class="flex-1 rounded-2xl border border-dashed border-gray-300 bg-gray-50 flex items-center justify-center text-gray-400">
                Insert Chart.js / ApexCharts Here
            </div>

            <div class="mt-4 flex items-center gap-2 text-sm text-gray-700">
                <span class="w-3 h-3 rounded-full bg-lime-700"></span>
                <span>Electricity</span>
            </div>

        </div>

    </div>

    <!-- Right Sidebar -->
    <div class="col-span-3 grid grid-rows-[1fr_260px] gap-5">

        <!-- Alerts -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

            <h2 class="text-xl font-bold text-gray-900 mb-5">
                System Alerts
            </h2>

            <div class="space-y-4 text-sm text-gray-700">

                <div class="flex gap-3">
                    <div class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center">
                        <i class="fa-solid fa-triangle-exclamation text-xs"></i>
                    </div>

                    <div>
                        High energy spike detected
                        <p class="text-xs text-gray-500">CICS Building</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="w-8 h-8 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center">
                        <i class="fa-solid fa-triangle-exclamation text-xs"></i>
                    </div>

                    <div>
                        Water pump maintenance
                        <p class="text-xs text-gray-500">July 2</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                        <i class="fa-solid fa-circle-info text-xs"></i>
                    </div>

                    <div>
                        Generator test this week
                        <p class="text-xs text-gray-500">Scheduled Event</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- Top Consumer -->
        <div class="bg-gradient-to-br from-[#0d1a12] to-[#183322] text-white rounded-2xl border border-[#21392c] shadow-sm p-5">

            <p class="text-xs uppercase tracking-wide text-gray-300">
                Top Consumer
            </p>

            <h2 class="text-2xl font-bold mt-3">
                CEAFA Building
            </h2>

            <div class="mt-8 flex items-end gap-2">
                <h3 class="text-6xl font-bold">480</h3>
                <span class="mb-2 text-sm text-gray-300">kWh</span>
            </div>

            <div class="mt-5 inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-xs">
                <i class="fa-solid fa-play text-[10px]"></i>
                Quarter 1
            </div>

        </div>

    </div>

</div>

</x-app-layout>