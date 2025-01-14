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

        <!-- Scripts -->
        <tallstackui:script /> 
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-black-50">
        <header class="grid items-center gap-2 py-10">
            <center>
                <div class="flex justify-center col-start-2">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="">
                </div>
            </center>
        </header>
        <div class="flex items-center justify-center">

            <div class="max-w-md w-full p-6">
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "{{ route('kiosk.check') }}";
            }, 6500);
        </script>
    </body>
</html>
