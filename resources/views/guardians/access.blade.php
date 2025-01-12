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
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2">
                <img src="{{ asset('images/logo.jpeg') }}" alt="">
            </div>
        </header>
        <div class="flex items-center justify-center">

            <div class="max-w-md w-full p-6">
                <form action="{{ route('guardian.verify') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" 
                               name="identifier" 
                               id="identifier"
                               autofocus 
                               placeholder="Escanee su código QR"
                               class="w-full p-2 border rounded"
                               autocomplete="off">
                    </div>
        
                    @error('identifier')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
        
                    @if(session('error'))
                        <div class="text-red-500">{{ session('error') }}</div>
                    @endif
                </form>
            </div>
        </div>
    </body>
</html>
