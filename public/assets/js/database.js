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

    const addBtn =
        document.getElementById(
            'add-record-btn'
        );

    if (section === 'users') {

        addBtn.href = '/users';

        addBtn.innerText =
            'Add User';

    }

    if (section === 'campuses') {

        addBtn.href =
            '/campuses/create';

        addBtn.innerText =
            'Add Campus';

    }

    if (section === 'buildings') {

        addBtn.href =
            '/buildings/create';

        addBtn.innerText =
            'Add Building';

    }

    if (section === 'resource-types') {

        addBtn.href =
            '/resource-types/create';

        addBtn.innerText =
            'Add Resource Type';

    }

    if (section === 'resource-meters') {

        addBtn.href =
            '/resource-meters/create';

        addBtn.innerText =
            'Add Resource Meter';

    }
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

            openCampusModal();

            break;

            window.location.href =
                '/campuses/create';

            break;

        case 'buildings':

            openBuildingModal();

            break;

            window.location.href =
                '/buildings/create';

            break;

        openResourceTypeModal();
        break;

            window.location.href =
                '/resource-types/create';

            break;

        openMeterModal();
        break;

            window.location.href =
                '/resource-meters/create';

            break;
    }
}

document.addEventListener(
    'DOMContentLoaded',
    () => {

        const params =
            new URLSearchParams(
                window.location.search
            );

        const section =
            params.get('section');

        if(section)
        {
            showSection(section);
        }
    }
)

function openEditCampusModal(
    id,
    name
)
{
    document
        .getElementById(
            'edit-campus-name'
        )
        .value = name;

    document
        .getElementById(
            'edit-campus-form'
        )
        .action =
            '/campuses/' + id;

    document
        .getElementById(
            'edit-campus-modal'
        )
        .classList.remove(
            'hidden'
        );

    document
        .getElementById(
            'edit-campus-modal'
        )
        .classList.add(
            'flex'
        );
}

function closeEditCampusModal()
{
    document
        .getElementById(
            'edit-campus-modal'
        )
        .classList.remove(
            'flex'
        );

    document
        .getElementById(
            'edit-campus-modal'
        )
        .classList.add(
            'hidden'
        );
}

function openBuildingModal()
{
    document
        .getElementById(
            'building-modal'
        )
        .classList.remove(
            'hidden'
        );

    document
        .getElementById(
            'building-modal'
        )
        .classList.add(
            'flex'
        );
}

function closeBuildingModal()
{
    document
        .getElementById(
            'building-modal'
        )
        .classList.remove(
            'flex'
        );

    document
        .getElementById(
            'building-modal'
        )
        .classList.add(
            'hidden'
        );
}

function openEditResourceTypeModal(
    id,
    name
)
{
    document
        .getElementById(
            'edit-resource-type-name'
        )
        .value = name;

    document
        .getElementById(
            'edit-resource-type-form'
        )
        .action =
            '/resource-types/' + id;

    document
        .getElementById(
            'edit-resource-type-modal'
        )
        .classList.remove(
            'hidden'
        );

    document
        .getElementById(
            'edit-resource-type-modal'
        )
        .classList.add(
            'flex'
        );
}

function closeEditResourceTypeModal()
{
    document
        .getElementById(
            'edit-resource-type-modal'
        )
        .classList.remove(
            'flex'
        );

    document
        .getElementById(
            'edit-resource-type-modal'
        )
        .classList.add(
            'hidden'
        );
}

function openMeterModal()
{
    document
        .getElementById(
            'meter-modal'
        )
        .classList.remove(
            'hidden'
        );

    document
        .getElementById(
            'meter-modal'
        )
        .classList.add(
            'flex'
        );
}

function closeMeterModal()
{
    document
        .getElementById(
            'meter-modal'
        )
        .classList.remove(
            'flex'
        );

    document
        .getElementById(
            'meter-modal'
        )
        .classList.add(
            'hidden'
        );
}