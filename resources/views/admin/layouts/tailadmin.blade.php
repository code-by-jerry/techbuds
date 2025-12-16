<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') · Techbuds Admin</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        body { 
            font-family: 'Instrument Sans', sans-serif;
            background: #FFFDF6;
        }
        .sidebar {
            transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1), transform 0.3s ease;
        }
        .menu-item {
            transition: all 0.2s ease;
        }
        .menu-item span:not(.tooltip) {
            transition: opacity 0.3s ease, width 0.3s ease;
        }
        .tooltip {
            position: absolute;
            left: calc(100% + 12px);
            top: 50%;
            transform: translateY(-50%);
            background: #11224E;
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.75rem;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .tooltip::before {
            content: '';
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            border: 6px solid transparent;
            border-right-color: #11224E;
        }
        .menu-item.group:hover .tooltip {
            opacity: 1;
        }
    </style>
</head>
@php
    $sidebarPage = 'dashboard';
    if (request()->is('admin/blogs*')) {
        $sidebarPage = 'blogs';
    } elseif (request()->is('admin/tool-*')) {
        $sidebarPage = 'tools';
    } elseif (request()->is('admin/templates*') || request()->is('admin/template-categories*')) {
        $sidebarPage = 'templates';
    } elseif (request()->is('admin/contacts*')) {
        $sidebarPage = 'contacts';
    } elseif (request()->is('admin/roles*')) {
        $sidebarPage = 'roles';
    } elseif (request()->is('admin/admins*')) {
        $sidebarPage = 'admins';
    } elseif (request()->is('admin/clients*')) {
        $sidebarPage = 'clients';
    } elseif (request()->is('admin/projects*')) {
        $sidebarPage = 'projects';
    } elseif (request()->is('admin/dashboard*')) {
        $sidebarPage = 'dashboard';
    }
@endphp

<body
    x-data="{ 
        page: '{{ $sidebarPage }}', 
        loaded: true, 
        sidebarToggle: false,
        mobileMenuOpen: false
    }"
    x-init="
        setTimeout(() => loaded = false, 300);
        sidebarToggle = JSON.parse(localStorage.getItem('sidebarToggle') || 'false');
        $watch('sidebarToggle', value => localStorage.setItem('sidebarToggle', JSON.stringify(value)));
    "
    class="bg-[#FFFDF6]"
>
    <!-- Preloader -->
    <div
        x-show="loaded"
        x-cloak
        class="fixed left-0 top-0 z-[999999] flex h-screen w-screen items-center justify-center bg-[#FFFDF6]"
    >
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-[#088395] border-t-transparent"></div>
    </div>

    <!-- Page Wrapper -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Content Area -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Overlay for Mobile Menu Only -->
            <div
                @click="mobileMenuOpen = false"
                :class="mobileMenuOpen ? 'block lg:hidden' : 'hidden'"
                class="fixed w-full h-screen z-[9998] bg-black/50 transition-opacity duration-300"
            ></div>

            <!-- Header -->
            @include('admin.partials.header')

            <!-- Main Content -->
            <main>
                <div class="p-4 mx-auto max-w-7xl md:p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
