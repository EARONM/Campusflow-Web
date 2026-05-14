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
                    border-l-2
                    border-yellow-400
                    pl-3
                ">

                    <div class="
                        flex
                        items-center
                        justify-between
                    ">

                        <p class="
                            text-sm
                            font-semibold
                            text-white
                        ">

                            ${alert.title}

                        </p>

                        <span class="
                            text-[10px]
                            px-2
                            py-1
                            rounded-full
                            bg-yellow-500/20
                            text-yellow-300
                        ">

                            ${alert.status.toUpperCase()}

                        </span>

                    </div>

                    <p class="
                        text-xs
                        text-gray-200
                        mt-1
                    ">

                        ${alert.message}

                    </p>

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
                    border-l-2
                    border-green-500
                    pl-3
                ">

                    <p class="
                        font-semibold
                    ">

                        ${reading.meter?.meter_code ?? '-'}

                    </p>

                    <p class="
                        text-xs
                        text-gray-500
                    ">

                        ${reading.meter?.resource_type?.name ?? '-'}

                        •

                        ${reading.reading_value}

                    </p>

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