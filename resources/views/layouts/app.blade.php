<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusFlow</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f4f5f7] overflow-x-hidden">

    @include('layouts.header')
    @include('layouts.sidebar')

    <main id="mainContent"
        class="pt-20 px-6 pb-6 ml-0 lg:ml-72 transition-all duration-300 min-h-screen">

        {{ $slot }}

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const menuBtn = document.getElementById('menuBtn');
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('mainContent');
            const header = document.getElementById('mainHeader');

            const texts = document.querySelectorAll('.sidebar-text');
            const links = document.querySelectorAll('.sidebar-link');

            let collapsed = false;

            menuBtn.addEventListener('click', () => {

                collapsed = !collapsed;

                if (collapsed) {

                    sidebar.classList.remove('w-72');
                    sidebar.classList.add('w-20');

                    main.classList.remove('lg:ml-72');
                    main.classList.add('lg:ml-20');

                    header.classList.remove('lg:left-72');
                    header.classList.add('lg:left-20');

                    texts.forEach(el => el.classList.add('hidden'));

                    links.forEach(link => {
                        link.classList.remove('gap-3', 'px-4');
                        link.classList.add('justify-center');
                    });

                } else {

                    sidebar.classList.remove('w-20');
                    sidebar.classList.add('w-72');

                    main.classList.remove('lg:ml-20');
                    main.classList.add('lg:ml-72');

                    header.classList.remove('lg:left-20');
                    header.classList.add('lg:left-72');

                    texts.forEach(el => el.classList.remove('hidden'));

                    links.forEach(link => {
                        link.classList.remove('justify-center');
                        link.classList.add('gap-3', 'px-4');
                    });

                }

            });

        });

        const profileBtn = document.getElementById('profileBtn');
        const profileMenu = document.getElementById('profileMenu');

        profileBtn?.addEventListener('click', () => {
            profileMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!profileBtn.contains(e.target) &&
                !profileMenu.contains(e.target)) {
                profileMenu.classList.add('hidden');
            }
        });
        
    </script>

</body>
</html>