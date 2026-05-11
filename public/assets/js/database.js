let activeSection = 'users';

function showSection(section)
{
    activeSection = section;

    const sections = [

        'users',
        'campuses',
        'buildings',
        'resource-types',
        'resource-meters'

    ];

    sections.forEach((item) => {

        // hide section
        document
            .getElementById(
                item + '-section'
            )
            .classList.add(
                'hidden'
            );

        // reset button style
        const button = document
            .getElementById(
                item + '-btn'
            );

        button.classList.remove(
            'bg-red-500',
            'text-white'
        );

        button.classList.add(
            'border'
        );
    });

    // show active section
    document
        .getElementById(
            section + '-section'
        )
        .classList.remove(
            'hidden'
        );

    // activate current button
    const activeButton = document
        .getElementById(
            section + '-btn'
        );

    activeButton.classList.remove(
        'border'
    );

    activeButton.classList.add(
        'bg-red-500',
        'text-white'
    );
}

function addRecord()
{
    switch(activeSection)
    {
        case 'users':

            window.location.href =
                '/users';

            break;

        case 'campuses':

            window.location.href =
                '/campuses/create';

            break;

        case 'buildings':

            window.location.href =
                '/buildings/create';

            break;

        case 'resource-types':

            window.location.href =
                '/resource-types/create';

            break;

        case 'resource-meters':

            window.location.href =
                '/resource-meters/create';

            break;
    }
}