<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Karla:400,700&display=swap'>


        <!-- Adds the Core Table Styles -->
        @rappasoftTableStyles

        <!-- Adds any relevant Third-Party Styles (Used for DateRangeFilter (Flatpickr) and NumberRangeFilter) -->
        @rappasoftTableThirdPartyStyles

        <!-- Adds the Core Table Scripts -->
        @rappasoftTableScripts

        <!-- Adds any relevant Third-Party Scripts (e.g. Flatpickr) -->
        @rappasoftTableThirdPartyScripts

        <tallstackui:script />

        <!-- Styles -->
        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-gray-100 font-family-karla flex">
        <x-admin.sidebar />

         <div class="min-h-screen bg-gray-100 w-full">
            @livewire('admin.nav-bar')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">

                        {{ $header }}

                </header>
            @endif

            <!-- Page Content -->
            <main>
            <x-admin.flesh></x-admin.flesh>
                {{ $slot }}
            </main>
        </div>




        @stack('modals')
        @stack('scripts')
        @livewireScripts
    </body>
</html>
