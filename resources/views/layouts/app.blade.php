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

<body class="bg-[#f4f5f7]">

    @include('layouts.header')
    @include('layouts.sidebar')

    <main class="pt-20 px-6 pb-6 :ml-72 transition-all duration-300">
        {{ $slot }}
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const menuBtn = document.getElementById('menuBtn');
            const sidebar = document.getElementById('sidebar');
            const main = document.querySelector('main');
            const header = document.querySelector('header');

            const texts = document.querySelectorAll('.sidebar-text');
            const links = document.querySelectorAll('.sidebar-link');

            let collapsed = false;

            menuBtn.addEventListener('click', () => {

                collapsed = !collapsed;

                if (collapsed) {

                    sidebar.classList.replace('w-72', 'w-20');
                    main.classList.replace('lg:ml-72', 'lg:ml-20');
                    header.classList.replace('lg:left-72', 'lg:left-20');

                    texts.forEach(el => el.classList.add('hidden'));

                    links.forEach(link => {
                        link.classList.remove('gap-3', 'px-4');
                        link.classList.add('justify-center');
                    });

                } else {

                    sidebar.classList.replace('w-20', 'w-72');
                    main.classList.replace('lg:ml-20', 'lg:ml-72');
                    header.classList.replace('lg:left-20', 'lg:left-72');

                    texts.forEach(el => el.classList.remove('hidden'));

                    links.forEach(link => {
                        link.classList.remove('justify-center');
                        link.classList.add('gap-3', 'px-4');
                    });

                }

            });

        });
    </script>

</body>
</html>