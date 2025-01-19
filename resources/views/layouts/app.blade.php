<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Teacher Roisin is a professional English as a Second Language (ESL) teacher who is passionate about helping learners from all backgrounds improve their English skills.">
        <meta name="keywords" content="ESL, English Teacher, Teacher Roisin">
        <meta name="author" content="Teacher Roisin">

        <link rel="icon" type="image/svg+xml" href="/images/icon.svg">

        <title>{{ config('app.name', 'Teacher Roisin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gradient-to-br from-brand-500 to-brand-400 text-white py-32 text-[72px]">
                    <div class="container mx-auto">
                        <h1 class="text-[48px] font-bold text-white">
                            {{ $header }}
                        </h1>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://kit.fontawesome.com/901ce00d8f.js" crossorigin="anonymous"></script>

        @livewireCalendarScripts



        <footer class="bg-white rounded-lg shadow m-4">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                        <x-application-logo></x-application-logo>
                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0">
                        <li>
                            <a href="/privacy" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="/cookie" class="hover:underline me-4 md:me-6">Cookie Policy</a>
                        </li>
                        <li>
{{--                            <a href="#" class="hover:underline">Contact</a>--}}
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center">© {{ now()->format('Y') }} <a href="https://flowbite.com/" class="hover:underline">Teacher Róisín™</a>. All Rights Reserved.</span>
            </div>
        </footer>


    </body>
</html>
