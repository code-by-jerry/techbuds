<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('components.google-analytics')
        <title>{{ $title ?? 'Techbuds' }}</title>
        <meta name="description" content="{{ $meta_description ?? 'Techbuds - Design Develop Deliver' }}">
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
        
        <!-- Optimized Font Loading -->
        @include('components.optimized-fonts')
        
        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <!-- Vite Assets -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        @stack('styles')
    </head>
    <body class="bg-app-background text-text-primary antialiased font-sans">
        @include('components.navbar')
        <main class="pt-20">
            @yield('content')
        </main>
        @include('components.footer')
        @include('components.whatsapp-float')
        @stack('scripts')
    </body>
</html>
