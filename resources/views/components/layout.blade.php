<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Doger</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body>
        <x-layouts.nav />

        <div>
            <x-messages.message />
            {{ $slot }}
        </div>

        {{-- <x-layouts.footer>
            Copywrite
        </x-layouts.footer> --}}
    </body>
    
</html>
