<x-app-layout>

<div class="grid grid-cols-12 gap-6">

    <!-- LEFT -->
    <div class="col-span-9 flex flex-col gap-6">

        <!-- KPI -->
        <div class="grid grid-cols-5 gap-5">

            <!-- Buildings -->
            <div class="
                bg-white
                rounded-3xl
                border
                border-gray-100
                shadow-sm
                px-6
                py-5
                hover:shadow-md
                transition
            ">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="
                            text-[11px]
                            font-semibold
                            text-gray-400
                            uppercase
                            tracking-wider
                        ">

                            Buildings

                        </p>

                        <h2 class="
                            text-4xl
                            font-bold
                            text-gray-900
                            mt-3
                        ">

                            {{ $totalBuildings }}

                        </h2>

                    </div>

                    <div class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-slate-100
                        flex
                        items-center
                        justify-center
                        text-lg
                    ">

                        🏢

                    </div>

                </div>

            </div>

            <!-- Alerts -->
            <div class="
                bg-white
                rounded-3xl
                border
                {{ $thresholdExceeded > 0
                    ? 'border-red-200'
                    : 'border-gray-100' }}
                shadow-sm
                px-6
                py-5
                transition
                relative
                overflow-y-auto
            ">

                @if($thresholdExceeded > 0)

                    <div class="
                        absolute
                        inset-0
                        bg-red-50/40
                    "></div>

                @endif

                <div class="
                    relative
                    flex
                    items-start
                    justify-between
                ">

                    <div>

                        <p class="
                            text-[11px]
                            font-semibold
                            text-gray-400
                            uppercase
                            tracking-wider
                        ">

                            Threshold Alerts

                        </p>

                        <h2 class="
                            text-4xl
                            font-bold
                            mt-3

                            {{ $thresholdExceeded > 0
                                ? 'text-red-600'
                                : 'text-gray-900' }}
                        ">

                            {{ $thresholdExceeded }}

                        </h2>

                        <p class="
                            text-xs
                            text-gray-500
                            mt-2
                        ">

                            Active monitoring alerts

                        </p>

                    </div>

                    <div class="
                        w-12
                        h-12
                        rounded-2xl
                        flex
                        items-center
                        justify-center
                        text-lg

                        {{ $thresholdExceeded > 0
                            ? 'bg-red-100 text-red-600'
                            : 'bg-gray-100 text-gray-500' }}
                    ">

                        !

                    </div>

                </div>

            </div>

            <!-- Energy -->
            <div class="
                bg-white
                rounded-3xl
                border
                border-lime-100
                shadow-sm
                px-6
                py-5
            ">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="
                            text-[11px]
                            font-semibold
                            text-gray-400
                            uppercase
                            tracking-wider
                        ">

                            Energy

                        </p>

                        <h2 class="
                            text-4xl
                            font-bold
                            text-lime-700
                            mt-3
                        ">

                            {{ $totalMeters }}

                        </h2>

                    </div>

                    <div class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-lime-50
                        flex
                        items-center
                        justify-center
                        text-lg
                    ">

                        ⚡

                    </div>

                </div>

            </div>

            <!-- Water -->
            <div class="
                bg-white
                rounded-3xl
                border
                border-blue-100
                shadow-sm
                px-6
                py-5
            ">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="
                            text-[11px]
                            font-semibold
                            text-gray-400
                            uppercase
                            tracking-wider
                        ">

                            Water Usage

                        </p>

                        <h2 class="
                            text-4xl
                            font-bold
                            text-blue-600
                            mt-3
                        ">

                            {{ number_format($currentWaterUsage, 2) }}

                        </h2>

                        <p class="
                            text-xs
                            mt-2

                            {{ $waterPercentage >= 0
                                ? 'text-red-500'
                                : 'text-green-600' }}
                        ">

                            {{ $waterPercentage >= 0 ? '+' : '' }}
                            {{ $waterPercentage }}%

                            vs last month

                        </p>

                    </div>

                    <div class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-blue-50
                        flex
                        items-center
                        justify-center
                        text-lg
                    ">

                        💧

                    </div>

                </div>

            </div>

            <!-- Filter -->
            <div class="
                bg-white
                rounded-3xl
                border
                border-gray-100
                shadow-sm
                px-6
                py-5
            ">

                <p class="
                    text-[11px]
                    font-semibold
                    text-gray-400
                    uppercase
                    tracking-wider
                    mb-4
                ">

                    Campus Filter

                </p>

                <form method="GET">

                    <select
                        name="campus"
                        onchange="this.form.submit()"
                        class="
                            w-full
                            border
                            border-gray-200
                            rounded-2xl
                            px-4
                            py-3
                            text-sm
                            focus:outline-none
                            focus:ring-2
                            focus:ring-red-100
                        "
                    >

                        <option value="">
                            All Campuses
                        </option>

                        @foreach($campuses as $campus)

                            <option
                                value="{{ $campus->id }}"
                                {{ request('campus') == $campus->id ? 'selected' : '' }}
                            >

                                {{ $campus->name }}

                            </option>

                        @endforeach

                    </select>

                </form>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="grid grid-cols-12 gap-6">

            <!-- Chart -->
            <div class="
                col-span-8
                bg-white
                rounded-3xl
                border
                border-gray-100
                shadow-sm
                p-6
            ">

                <div class="
                    flex
                    items-center
                    justify-between
                    mb-6
                ">

                    <div>

                        <h2 class="
                            text-xl
                            font-bold
                            text-gray-900
                        ">

                            Utilities Trend

                        </h2>

                        <p class="
                            text-sm
                            text-gray-500
                            mt-1
                        ">

                            Monthly utility consumption overview

                        </p>

                    </div>

                    <select class="
                        border
                        border-gray-200
                        rounded-2xl
                        px-4
                        py-2
                        text-sm
                        focus:outline-none
                    ">

                        <option>Q1</option>
                        <option>Q2</option>
                        <option>Q3</option>
                        <option>Year</option>

                    </select>

                </div>

                <div class="
                    rounded-3xl
                    border
                    border-gray-100
                    bg-white
                    p-5
                    h-[400px]
                ">

                    <canvas id="waterChart"></canvas>

                </div>

            </div>

            <!-- Analytics -->
            <div class="
                col-span-4
                bg-white
                rounded-3xl
                border
                border-gray-100
                shadow-sm
                p-6
            ">

                <div class="
                    flex
                    items-center
                    justify-between
                    mb-6
                ">

                    <h2 class="
                        text-xl
                        font-bold
                        text-gray-900
                    ">

                        Analytics

                    </h2>

                </div>

                <div class="space-y-5">

                    <div class="
                        rounded-2xl
                        bg-gray-50
                        p-5
                    ">

                        <p class="
                            text-xs
                            uppercase
                            tracking-wide
                            text-gray-400
                            font-semibold
                        ">

                            Top Consuming Meter

                        </p>

                        <h3 class="
                            text-xl
                            font-bold
                            text-gray-900
                            mt-2
                        ">

                            {{ optional($latestReadings->first()?->meter)->meter_code ?? '-' }}

                        </h3>

                    </div>

                    <div class="
                        rounded-2xl
                        bg-gray-50
                        p-5
                    ">

                        <p class="
                            text-xs
                            uppercase
                            tracking-wide
                            text-gray-400
                            font-semibold
                        ">

                            Latest Reading

                        </p>

                        <h3 class="
                            text-xl
                            font-bold
                            text-gray-900
                            mt-2
                        ">

                            {{ $latestReadings->first()->reading_value ?? 0 }}

                        </h3>

                    </div>

                    <div class="
                        rounded-2xl
                        bg-gray-50
                        p-4
                    ">

                        <p class="
                            text-xs
                            uppercase
                            tracking-wide
                            text-gray-400
                            font-semibold
                        ">

                            Active Alerts

                        </p>

                        <h3 class="
                            text-xl
                            font-bold
                            text-red-600
                            mt-2
                        ">

                            {{ $unreadAlerts }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- BOTTOM PANELS -->
    <div class="col-span-12 grid grid-cols-12 gap-5 items-start">

        <!-- Alerts -->
        <div
            id="live-alerts"
            class="
                col-span-8
                bg-gradient-to-br
                from-red-950
                via-black
                to-green-950
                rounded-3xl
                shadow-sm
                border
                border-white/10
                p-6
                h-[520px]
                overflow-y-auto
            "
        >

            <div class="
                flex
                items-center
                justify-between
                mb-6
            ">

                <h2 class="
                    text-xl
                    font-bold
                    text-white
                ">

                    Alerts

                </h2>

                <span class="
                    text-xs
                    px-3
                    py-1
                    rounded-full
                    bg-white/10
                    text-white
                ">

                    {{ $unreadAlerts }}

                </span>

            </div>

            <div class="
                overflow-y-auto
                pr-2
                space-y-4
            ">

                @forelse($alerts as $alert)

                    <div class="
                        rounded-2xl
                        border
                        border-white/10
                        bg-white/[0.04]
                        p-4
                        backdrop-blur-sm
                    ">

                        <div class="
                            flex
                            items-start
                            justify-between
                            gap-4
                        ">

                            <div class="flex-1">

                                <h3 class="
                                    text-lg
                                    font-bold
                                    text-white
                                ">

                                    {{ $alert->title }}

                                </h3>

                                <p class="
                                    text-sm
                                    text-gray-300
                                    mt-3
                                    leading-7
                                ">

                                    {{ $alert->message }}

                                </p>

                            </div>

                            <span class="
                                text-[10px]
                                px-3
                                py-1
                                rounded-full
                                whitespace-nowrap
                                font-semibold

                                {{ $alert->status === 'resolved'
                                    ? 'bg-green-500/20 text-green-300'
                                    : 'bg-yellow-500/20 text-yellow-300' }}
                            ">

                                {{ strtoupper($alert->status) }}

                            </span>

                        </div>

                        <div class="
                            flex
                            items-center
                            justify-between
                            mt-5
                        ">

                            <p class="
                                text-xs
                                text-gray-400
                            ">

                                {{ $alert->created_at->diffForHumans() }}

                            </p>

                            <span class="
                                text-[10px]
                                px-3
                                py-1
                                rounded-full
                                font-semibold

                                {{ $alert->severity === 'critical'
                                    ? 'bg-red-500/20 text-red-300'

                                    : ($alert->severity === 'warning'
                                        ? 'bg-yellow-500/20 text-yellow-300'
                                        : 'bg-blue-500/20 text-blue-300') }}
                            ">

                                {{ strtoupper($alert->severity) }}

                            </span>

                        </div>

                        @if($alert->status === 'active')

                            <form
                                action="{{ route('alerts.resolve', $alert) }}"
                                method="POST"
                                class="mt-5"
                            >

                                @csrf
                                @method('PATCH')

                                <button class="
                                    bg-white/10
                                    hover:bg-white/20
                                    text-white
                                    text-sm
                                    px-5
                                    py-2
                                    rounded-xl
                                    transition
                                ">

                                    Resolve

                                </button>

                            </form>

                        @endif

                    </div>

                @empty

                    <div class="
                        text-sm
                        text-gray-300
                    ">

                        No alerts found

                    </div>

                @endforelse

            </div>

        </div>

        <!-- Recent Activity -->
        <div
            id="live-readings"
            class="
                col-span-4
                bg-white
                rounded-3xl
                border
                border-gray-100
                shadow-sm
                p-6
                h-[520px]
                overflow-y-auto
            "
        >

            <div class="
                flex
                items-center
                justify-between
                mb-6
            ">

                <h2 class="
                    text-xl
                    font-bold
                    text-gray-900
                ">

                    Recent Activity

                </h2>

            </div>

            <div class="
                overflow-y-auto
                pr-2
                space-y-4
            ">

                @forelse($latestReadings as $reading)

                    <div class="
                        border
                        border-gray-100
                        rounded-2xl
                        p-5
                        hover:bg-gray-50
                        transition
                    ">

                        <div class="
                            flex
                            items-start
                            justify-between
                            gap-4
                        ">

                            <div>

                                <h3 class="
                                    text-lg
                                    font-bold
                                    text-gray-900
                                ">

                                    {{ $reading->meter->meter_code ?? '-' }}

                                </h3>

                                <p class="
                                    text-sm
                                    text-gray-500
                                    mt-2
                                ">

                                    {{ $reading->meter->resourceType->name ?? '-' }}

                                    •

                                    {{ $reading->reading_value }}

                                </p>

                            </div>

                            <span class="
                                text-xs
                                text-gray-400
                                whitespace-nowrap
                            ">

                                {{ $reading->created_at->diffForHumans() }}

                            </span>

                        </div>

                    </div>

                @empty

                    <div class="
                        text-sm
                        text-gray-400
                    ">

                        No recent activity

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

window.dashboardData = {

    chartLabels:
        @json($chartLabels),

    waterChartData:
        @json($waterChartData),

    electricChartData:
        @json($electricChartData),

    wasteChartData:
        @json($wasteChartData),
};

</script>

<script src="{{ asset('assets/js/dashboard.js') }}"></script>

</x-app-layout>