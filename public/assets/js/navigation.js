function toggleNotifications()
{
    document
        .getElementById(
            'notification-dropdown'
        )
        .classList.toggle(
            'hidden'
        );
}

async function markNotificationAsRead(
    alertId
)
{
    try {

        await fetch(
            `/alerts/${alertId}/read`,
            {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN':
                        document
                            .querySelector(
                                'meta[name="csrf-token"]'
                            )
                            .getAttribute(
                                'content'
                            ),
                    'Accept':
                        'application/json',
                },
            }
        );

        window.location.reload();

    } catch (error) {

        console.error(error);

    }
}