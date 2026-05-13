<x-app-layout>

<div class="grid grid-cols-12 gap-5">

    <!-- Left Section -->
    <div class="col-span-9 flex flex-col gap-5">

        <!-- KPI Cards -->
        <div class="grid grid-cols-5 gap-5">

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
            <div class="
                bg-white
                rounded-2xl
                border
                {{ $thresholdExceeded > 0
                    ? 'border-red-200'
                    : 'border-gray-100' }}
                shadow-sm
                px-5
                py-4
                hover:shadow-md
                transition
            ">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
                            Threshold Alerts
                        </p>

                        <h2 class="
                            text-3xl
                            font-bold
                            mt-1

                            {{ $thresholdExceeded > 0
                                ? 'text-red-600'
                                : 'text-gray-900' }}
                        ">

                            {{ $thresholdExceeded }}

                        </h2>

                        <p class="text-xs mt-2 text-gray-500">

                            Active exceeded thresholds

                        </p>

                    </div>

                    <div class="
                        w-10
                        h-10
                        rounded-xl
                        flex
                        items-center
                        justify-center

                        {{ $thresholdExceeded > 0
                            ? 'bg-red-50 text-red-600'
                            : 'bg-gray-100 text-gray-500' }}
                    ">

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
            <div class="bg-white rounded-2xl border border-blue-100 shadow-sm px-5 py-4 hover:shadow-md transition h-full">

                <div class="flex items-center justify-between h-full">

                    <div>

                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
                            Water Usage
                        </p>

                        <h2 class="text-3xl font-bold text-blue-600 mt-1">
                            {{ number_format($currentWaterUsage, 2) }}
                        </h2>

                        <p class="text-xs mt-2
                            {{ $waterPercentage >= 0
                                ? 'text-red-500'
                                : 'text-green-600' }}">

                            {{ $waterPercentage >= 0 ? '+' : '' }}
                            {{ $waterPercentage }}%

                            vs last month

                        </p>

                    </div>

                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">

                        💧

                    </div>

                </div>

            </div>

            <!-- Campus Filter -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm px-5 py-4">

                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-3">
                    Campus Filter
                </p>

                <form method="GET">

                    <select
                        name="campus"
                        onchange="this.form.submit()"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none">

                        <option value="">
                            All Campuses
                        </option>

                        @foreach($campuses as $campus)

                        <option
                            value="{{ $campus->id }}"
                            {{ request('campus') == $campus->id ? 'selected' : '' }}>

                            {{ $campus->name }}

                        </option>

                        @endforeach

                    </select>

                </form>

            </div>

        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-12 gap-5">

            <!-- Chart -->
            <div class="col-span-8 bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

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

                <div class="rounded-2xl border border-dashed border-gray-300 bg-gray-50 p-4 h-[400px]">
                    <canvas id="waterChart"></canvas>
                </div>

            </div>

            <!-- Reports -->
            <div class="col-span-4 bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-900">
                        Reports
                    </h2>

                    <a href="#" class="text-sm font-semibold text-red-600 hover:text-red-700">
                        View All
                    </a>
                </div>

                <div class="space-y-4 mt-5">

                    @forelse($alerts as $alert)

                        <div class="flex items-center justify-between">

                            <p class="text-sm text-white">

                                {{ $alert['title'] }}

                            </p>

                            <span class="
                                text-sm
                                font-semibold

                                {{ $alert['title'] == 'High Water Usage'
                                    ? 'text-red-300'
                                    : 'text-yellow-300' }}
                            ">

                                {{ $alert['count'] }}

                            </span>

                        </div>

                    @empty

                        <p class="text-sm text-gray-300">

                            No active alerts

                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

    <!-- Right Section -->
    <div class="col-span-3 flex flex-col gap-5">

        <!-- Alerts -->
        <div class="
            rounded-2xl
            shadow-sm
            p-5
            text-white

            {{ $unreadAlerts > 0
                ? 'bg-gradient-to-br from-red-950 to-green-950'
                : 'bg-gray-800' }}
        ">

            <div class="flex items-center justify-between mb-4">

                <h2 class="text-lg font-bold">
                    Alerts
                </h2>

                <span class="
                    text-xs
                    px-2
                    py-1
                    rounded-full
                    bg-white/10
                ">

                    {{ $unreadAlerts }}

                </span>

            </div>

            <div class="space-y-4">

                @forelse($alerts as $alert)

                    <div class="
                        border-l-2
                        border-yellow-400
                        pl-3
                    ">

                        <p class="text-sm font-semibold">

                            {{ $alert->title }}

                        </p>

                        <p class="text-xs text-gray-200 mt-1">

                            {{ $alert->message }}

                        </p>

                        <p class="text-[11px] text-gray-300 mt-1">

                            {{ $alert->created_at->diffForHumans() }}

                        </p>

                    </div>

                @empty

                    <div class="text-sm text-gray-300">

                        No alerts found

                    </div>

                @endforelse

            </div>

        </div>

        <!-- Activity -->
        <div class="
            bg-white
            rounded-2xl
            border
            border-gray-100
            shadow-sm
            p-5
            space-y-4
            text-sm
            text-gray-700
        ">

            @forelse($latestReadings as $reading)

                <div class="
                    border-l-2
                    border-green-500
                    pl-3
                ">

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