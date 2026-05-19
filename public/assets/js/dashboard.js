const ctx =
    document.getElementById(
        'waterChart'
    );

new Chart(ctx, {

    type: 'line',

    data: {

        labels:
            window.dashboardData.chartLabels,

        datasets: [

            {

                label: 'Water',

                data:
                    window.dashboardData.waterChartData,

                borderWidth: 2,
                tension: 0.4,
            },

            {

                label: 'Electric',

                data:
                    window.dashboardData.electricChartData,

                borderWidth: 2,
                tension: 0.4,
            },

            {

                label: 'Waste',

                data:
                    window.dashboardData.wasteChartData,

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

async function refreshDashboard()
{
    try {

        const response =
            await fetch(
                '/dashboard/live-data'
            );

        const data =
            await response.json();

        // Alerts
        const alertsContainer =
            document.getElementById(
                'live-alerts'
            );

        let alertsHtml = '';

        data.alerts.forEach(alert => {

            alertsHtml += `

            <div class="
                rounded-2xl
                border
                border-white/10
                bg-white/[0.04]
                p-5
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

                            ${alert.title}

                        </h3>

                        <p class="
                            text-sm
                            text-gray-300
                            mt-3
                            leading-7
                        ">

                            ${alert.message}

                        </p>

                    </div>

                    <span class="
                        text-[10px]
                        px-3
                        py-1
                        rounded-full
                        whitespace-nowrap
                        font-semibold

                        ${alert.status === 'resolved'
                            ? 'bg-green-500/20 text-green-300'
                            : 'bg-yellow-500/20 text-yellow-300'}
                    ">

                        ${alert.status.toUpperCase()}

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

                        ${alert.created_at_human ?? ''}

                    </p>

                    <span class="
                        text-[10px]
                        px-3
                        py-1
                        rounded-full
                        font-semibold

                        ${alert.severity === 'critical'
                            ? 'bg-red-500/20 text-red-300'

                            : alert.severity === 'warning'
                                ? 'bg-yellow-500/20 text-yellow-300'
                                : 'bg-blue-500/20 text-blue-300'}
                    ">

                        ${(alert.severity ?? 'info').toUpperCase()}

                    </span>

                </div>

            </div>

            `;
        });

        alertsContainer.innerHTML =
            alertsHtml;

        // Readings
        const readingsContainer =
            document.getElementById(
                'live-readings'
            );

        let readingsHtml = '';

        data.latestReadings.forEach(reading => {

            readingsHtml += `

            <div class="
                border
                border-gray-100
                rounded-2xl
                p-5
                hover:bg-gray-50
                transition
                bg-white
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

                            ${reading.meter?.meter_code ?? '-'}

                        </h3>

                        <p class="
                            text-sm
                            text-gray-500
                            mt-2
                        ">

                            ${reading.meter?.resource_type?.name ?? '-'}

                            •

                            ${reading.reading_value ?? 0}

                        </p>

                    </div>

                    <span class="
                        text-xs
                        text-gray-400
                        whitespace-nowrap
                    ">

                        ${reading.created_at_human ?? ''}

                    </span>

                </div>

            </div>

            `;
        });

        readingsContainer.innerHTML =
            readingsHtml;

    }
    catch(error)
    {
        console.error(error);
    }
}

setInterval(
    refreshDashboard,
    10000
);