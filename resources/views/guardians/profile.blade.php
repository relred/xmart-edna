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
    <body class="font-sans antialiased">
        <div class="max-w-2xl mx-auto p-6 mt-16">
            <center>
                @if($guardian->photo)
                    <img src="{{ Storage::url($guardian->photo) }}" 
                         alt="{{ $guardian->name }}" 
                         class="w-32 h-32 rounded-full object-cover">
                @endif
                <h1 class="text-2xl font-bold">{{ $guardian->name }}</h1>
            </center>
        
            <div class="mt-8">
                <h2 class="text-2xl font-semibold ml-4">Niños</h2>
                <div class="space-y-4">
                    @foreach($guardian->children as $child)
                        <div class="flex items-center p-4 border rounded">
                            @if($child->photo)
                                <img src="{{ Storage::url($child->photo) }}" 
                                     alt="{{ $child->name }}"
                                     class="w-16 h-16 rounded object-cover">
                            @endif
                            <div class="ml-4">
                                <p class="text-2xl font-bold">{{ $child->name }}</p>
                                <div class="text-gray-500">
                                    Parentezco: {{ $child->pivot->relationship_type }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <script>
            setTimeout(function() {
                window.location.href = "{{ route('guardian.access') }}";
            }, 8000);
        </script>
    </body>
</html>
