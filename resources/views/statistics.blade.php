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
                    <h2 class="text-4xl font-bold">

                        {{ number_format(
                            collect($electricData)->sum(),
                            2
                        ) }}

                    </h2>
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
                    <h2 class="text-4xl font-bold">

                        {{ number_format(
                            collect($waterData)->sum(),
                            2
                        ) }}

                    </h2>
                    <span class="text-sm text-gray-300 mb-1">m³</span>
                </div>
            </div>

            <!-- Monthly Comparison -->
            <div class="
                bg-gradient-to-br
                from-[#0d1a12]
                to-[#183322]
                text-white
                rounded-2xl
                border
                border-[#21392c]
                shadow-sm
                p-5
            ">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="
                            text-xs
                            uppercase
                            tracking-wide
                            text-gray-300
                        ">

                            Monthly Usage

                        </p>

                        <p class="
                            text-sm
                            text-gray-400
                            mt-1
                        ">

                            Current vs Previous Month

                        </p>

                    </div>

                    <div class="
                        w-11
                        h-11
                        rounded-xl
                        bg-white/10
                        flex
                        items-center
                        justify-center
                    ">

                        <i class="fa-solid fa-chart-line"></i>

                    </div>

                </div>

                <div class="
                    mt-5
                    flex
                    items-end
                    justify-between
                ">

                    <div>

                        <h2 class="text-4xl font-bold">

                            {{ number_format(
                                $currentMonthUsage,
                                2
                            ) }}

                        </h2>

                        <p class="
                            text-sm
                            mt-2

                            {{ $monthlyPercentage >= 0
                                ? 'text-red-300'
                                : 'text-green-300' }}
                        ">

                            {{ $monthlyPercentage >= 0 ? '+' : '' }}

                            {{ $monthlyPercentage }}%

                            vs last month

                        </p>

                    </div>

                    <span class="
                        text-sm
                        text-gray-300
                        mb-1
                    ">

                        Total Usage

                    </span>

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

                <form method="GET">

                    <select
                        name="campus"
                        onchange="this.form.submit()"
                        class="
                            border
                            border-gray-200
                            rounded-xl
                            px-3
                            py-2
                            text-sm
                        "
                    >

                        <option value="">
                            All Campuses
                        </option>

                        @foreach($campuses as $campus)

                            <option
                                value="{{ $campus->id }}"
                                {{ request('campus') == $campus->id
                                    ? 'selected'
                                    : '' }}
                            >

                                {{ $campus->name }}

                            </option>

                        @endforeach

                    </select>

                </form>

            </div>

            <div class="flex-1">

                <canvas id="statisticsChart"></canvas>

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

        <!-- Peak Consumption -->
        <div class="
            bg-white
            rounded-2xl
            border
            border-gray-100
            shadow-sm
            p-5
        ">

            <div class="flex items-center justify-between">

                <div>

                    <p class="
                        text-xs
                        uppercase
                        tracking-wide
                        text-gray-500
                    ">

                        Peak Consumption

                    </p>

                    <h2 class="
                        text-2xl
                        font-bold
                        text-gray-900
                        mt-3
                    ">

                        {{ number_format(
                            $peakReading->reading_value ?? 0,
                            2
                        ) }}

                    </h2>

                </div>

                <div class="
                    w-11
                    h-11
                    rounded-xl
                    bg-red-100
                    text-red-600
                    flex
                    items-center
                    justify-center
                ">

                    <i class="fa-solid fa-fire"></i>

                </div>

            </div>

            <div class="mt-5 space-y-2">

                <div class="
                    flex
                    justify-between
                    text-sm
                ">

                    <span class="text-gray-500">
                        Building
                    </span>

                    <span class="font-semibold text-gray-800">

                        {{ $peakReading->meter->building->name ?? 'N/A' }}

                    </span>

                </div>

                <div class="
                    flex
                    justify-between
                    text-sm
                ">

                    <span class="text-gray-500">
                        Resource
                    </span>

                    <span class="font-semibold text-gray-800">

                        {{ $peakReading->meter->resourceType->name ?? 'N/A' }}

                    </span>

                </div>

                <div class="
                    flex
                    justify-between
                    text-sm
                ">

                    <span class="text-gray-500">
                        Recorded
                    </span>

                    <span class="font-semibold text-gray-800">

                        {{ optional(
                            $peakReading->created_at
                        )->diffForHumans() }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx =
    document
        .getElementById(
            'statisticsChart'
        );

new Chart(ctx, {

    type: 'line',

    data: {

        labels:
            @json($waterLabels),

        datasets: [

            {
                label: 'Water',
                data:
                    @json($waterData),
                borderColor: '#2563eb',
                backgroundColor: 'transparent',
                tension: 0.4,
            },

            {
                label: 'Electric',
                data:
                    @json($electricData),
                borderColor: '#f59e0b',
                backgroundColor: 'transparent',
                tension: 0.4,
            },

            {
                label: 'Waste',
                data:
                    @json($wasteData),
                borderColor: '#16a34a',
                backgroundColor: 'transparent',
                tension: 0.4,
            },

        ]
    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

    }

});

</script>

</x-app-layout>