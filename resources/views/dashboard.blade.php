<x-app-layout>

<div class="grid grid-cols-12 gap-5 h-[calc(100vh-130px)]">

    <!-- Left Main -->
    <div class="col-span-9 grid grid-rows-[90px_1fr] gap-5">

        <!-- Compact KPI Cards -->
        <div class="grid grid-cols-4 gap-5">

            <div class="bg-white rounded-2xl shadow px-5 py-4 flex flex-col justify-center">
                <p class="text-xs text-gray-500">Buildings</p>
                <h2 class="text-3xl font-bold">24</h2>
            </div>

            <div class="bg-white rounded-2xl shadow px-5 py-4 flex flex-col justify-center">
                <p class="text-xs text-gray-500">Pending</p>
                <h2 class="text-3xl font-bold text-red-600">08</h2>
            </div>

            <div class="bg-white rounded-2xl shadow px-5 py-4 flex flex-col justify-center">
                <p class="text-xs text-gray-500">Energy</p>
                <h2 class="text-3xl font-bold text-lime-700">355</h2>
            </div>

            <div class="bg-white rounded-2xl shadow px-5 py-4 flex flex-col justify-center">
                <p class="text-xs text-gray-500">Water</p>
                <h2 class="text-3xl font-bold text-blue-600">200</h2>
            </div>

        </div>

        <!-- Bottom Left Content -->
        <div class="grid grid-cols-12 gap-5 min-h-0">

            <!-- Chart -->
            <div class="col-span-8 bg-white rounded-2xl shadow p-5 flex flex-col min-h-0">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">
                        Utilities Trend
                    </h2>

                    <select class="border rounded-lg px-3 py-1 text-sm">
                        <option>Q1</option>
                        <option>Q2</option>
                        <option>Year</option>
                    </select>
                </div>

                <div class="flex-1 rounded-xl border border-dashed border-gray-300 flex items-center justify-center text-gray-400">
                    Chart Here
                </div>

            </div>

            <!-- Reports -->
            <div class="col-span-4 bg-white rounded-2xl shadow p-5 flex flex-col min-h-0">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold">
                        Reports
                    </h2>

                    <a href="#" class="text-sm text-red-700 font-semibold">
                        View
                    </a>
                </div>

                <div class="space-y-4 text-sm overflow-y-auto">

                    <div class="border-b pb-2">
                        Broken Water Meter
                        <div class="text-yellow-600 font-semibold">Pending</div>
                    </div>

                    <div class="border-b pb-2">
                        FE Expired
                        <div class="text-red-600 font-semibold">Urgent</div>
                    </div>

                    <div>
                        Electrical Spike
                        <div class="text-blue-600 font-semibold">Review</div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Right Sidebar -->
    <div class="col-span-3 grid grid-rows-[90px_160px_1fr] gap-5">

        <!-- Campus -->
        <div class="bg-white rounded-2xl shadow p-4 flex flex-col justify-center">
            <p class="text-xs text-gray-500 mb-1">Campus</p>

            <select class="border rounded-lg px-3 py-2 text-sm">
                <option>All Campuses</option>
                <option>Main</option>
                <option>Alangilan</option>
            </select>
        </div>

        <!-- Alerts -->
        <div class="bg-[#101a13] text-white rounded-2xl shadow p-5">
            <h2 class="text-lg font-bold mb-3">Alerts</h2>

            <div class="space-y-2 text-sm">
                <div>3 FE expired</div>
                <div>2 meters offline</div>
                <div>5 pending tasks</div>
            </div>
        </div>

        <!-- Activity -->
        <div class="bg-white rounded-2xl shadow p-5 min-h-0 flex flex-col">

            <h2 class="text-lg font-bold mb-3">
                Activity
            </h2>

            <div class="space-y-3 text-sm text-gray-700 overflow-y-auto">
                <div>Admin added report</div>
                <div>Technician completed task</div>
                <div>Campus Admin updated data</div>
                <div>User logged in</div>
            </div>

        </div>

    </div>

</div>

</x-app-layout>