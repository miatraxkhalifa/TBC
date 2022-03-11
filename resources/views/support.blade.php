<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('css/button.css') }}" defer>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="icon" href="{{ asset('img/login-office.jpg') }}" type="image/x-icon">

    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css">

    @livewireStyles
    <script>
        import Turbolinks from 'turbolinks';
        Turbolinks.start()
    </script>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{asset('js/init-alpine.js')}}" defer></script>
    <script src="https://cdn.tiny.cloud/1/sgpatsh1r558icb29xmi3ucgq5qajtf9q53yuw73dzspu13d/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

</head>

<body class="bg-white dark:bg-gray-800">

    <!-- Navbar-->
    @include('layouts.welcome.navbar')

    <!-- main -->
    <main>
        <section class="bg-white dark:bg-gray-800">
            <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">

                <div class="min-w-0 p-4  text-gray-800 bg-gray-100 mt-16 rounded-lg shadow-xl">

                    <h2 class="mb-4 font-semibold">
                        Like this page?
                    </h2>


                    <a href="https://www.buymeacoffee.com/thebisdakcoder" target="_blank"
                        class="relative font-medium leading-6 text-purple-700 transition duration-150 ease-out hover:text-purple-500 dark:hover:text-purple-500 dark:text-purple-700"
                        x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                        <span class="block"> Buy me a coffee! </span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                            <span x-show="hover"
                                class="absolute inset-0 inline-block w-full h-full transform bg-gray-900 dark:bg-white"
                                x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0"
                                x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-start="scale-100" x-transition:leave-end="scale-0"
                                style="display: none;"></span>
                        </span>
                    </a>


                </div>

                @stack('modals')
            </div>
        </section>

        <!-- Footer -->
        @include('layouts.welcome.footer')

        @livewireScripts
    </main>
    <!-- AlpineJS Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

</body>

</html>