<x-app-layout>

<div class="space-y-6">

    <!-- Top KPI Cards -->
    <div class="grid grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Total Buildings</p>
            <h2 class="text-4xl font-bold mt-2">24</h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Pending Reports</p>
            <h2 class="text-4xl font-bold mt-2 text-red-600">08</h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Energy Saved</p>
            <h2 class="text-4xl font-bold mt-2 text-lime-700">355 kWh</h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Water Usage</p>
            <h2 class="text-4xl font-bold mt-2 text-blue-600">200 m³</h2>
        </div>

    </div>

    <!-- Main Dashboard Grid -->
    <div class="grid grid-cols-12 gap-6">

        <!-- Left -->
        <div class="col-span-8 space-y-6">

            <!-- Chart -->
            <div class="bg-white rounded-2xl shadow p-6">

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Utilities Trend
                    </h2>

                    <select class="border rounded-lg px-3 py-2 text-sm">
                        <option>Quarter 1</option>
                        <option>Quarter 2</option>
                        <option>Yearly</option>
                    </select>
                </div>

                <div class="h-80 rounded-xl border border-dashed border-gray-300 flex items-center justify-center text-gray-400">
                    Chart.js / ApexCharts Here
                </div>

            </div>

            <!-- Recent Reports -->
            <div class="bg-white rounded-2xl shadow p-6">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold">
                        Recent Reports
                    </h2>

                    <a href="#" class="text-sm text-red-700 font-semibold">
                        View All
                    </a>
                </div>

                <div class="space-y-4">

                    <div class="flex justify-between border-b pb-3">
                        <span>Broken Water Meter - CICS</span>
                        <span class="text-yellow-600 font-semibold">Pending</span>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span>Fire Extinguisher Expired - CEAFA</span>
                        <span class="text-red-600 font-semibold">Urgent</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Electrical Spike - Main Building</span>
                        <span class="text-blue-600 font-semibold">Review</span>
                    </div>

                </div>

            </div>

        </div>

        <!-- Right -->
        <div class="col-span-4 space-y-6">

            <!-- Campus Filter -->
            <div class="bg-white rounded-2xl shadow p-5">
                <p class="text-sm text-gray-500 mb-2">Campus</p>

                <select class="w-full border rounded-lg px-3 py-2">
                    <option>All Campuses</option>
                    <option>Main Campus</option>
                    <option>Alangilan</option>
                    <option>Lobo</option>
                    <option>Mabini</option>
                </select>
            </div>

            <!-- Alerts -->
            <div class="bg-[#101a13] text-white rounded-2xl shadow p-6">

                <h2 class="text-2xl font-bold mb-4">
                    Alerts
                </h2>

                <div class="space-y-4 text-sm">

                    <div>
                        3 Fire Extinguishers expired
                    </div>

                    <div>
                        2 Utility meters offline
                    </div>

                    <div>
                        5 Pending technician tasks
                    </div>

                </div>

            </div>

            <!-- Consumption Summary -->
            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-xl font-bold mb-4">
                    Highest Consumption
                </h2>

                <div class="text-4xl font-bold text-lime-700">
                    64.943 kWh
                </div>

                <p class="mt-3 text-gray-600">
                    CICS Department
                </p>

            </div>

            <!-- Activity -->
            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-xl font-bold mb-4">
                    User Activity
                </h2>

                <div class="space-y-3 text-sm text-gray-700">

                    <div>Admin added new report</div>
                    <div>Technician completed task</div>
                    <div>Campus Admin updated readings</div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>