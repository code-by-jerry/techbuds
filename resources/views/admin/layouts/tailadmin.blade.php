<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') · Techbuds Admin</title>
    
    <!-- Favicon -->
    @include('components.favicon')
    
    <!-- Fonts: Inter (Body) + Clash Display (Headings) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@500,600,700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets - Load compiled CSS with theme -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        
        /* Base Typography */
        body { 
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, sans-serif;
        }
        
        .font-display {
            font-family: 'Clash Display', 'Inter', sans-serif;
        }
        
        /* ========================================
           CSS Variables - Enterprise Theme
           ======================================== */
        :root {
            --brand-primary: #2563EB;
            --brand-hover: #1D4ED8;
            --brand-soft: #38BDF8;
            
            --bg-main: #0B1220;
            --bg-surface-1: #0F172A;
            --bg-surface-2: #1E293B;
            --bg-surface-3: #273449;
            
            --text-primary: #E5E7EB;
            --text-secondary: #CBD5E1;
            --text-muted: #94A3B8;
            --text-disabled: #64748B;
            --text-heading: #F8FAFC;
            
            --border-default: #334155;
            --border-subtle: #1E293B;
            --border-focus: #38BDF8;
            --border-active: #2563EB;
            
            --color-success: #22C55E;
            --color-warning: #F59E0B;
            --color-error: #EF4444;
            --color-info: #38BDF8;
        }
        
        /* ========================================
           Sidebar Transitions
           ======================================== */
        .sidebar {
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1), transform 0.3s ease;
        }
        
        .menu-item {
            transition: all 0.2s ease;
        }
        
        .menu-item span:not(.tooltip) {
            transition: opacity 0.3s ease, width 0.3s ease;
        }
        
        /* ========================================
           Tooltip Styling
           ======================================== */
        .tooltip {
            position: absolute;
            left: calc(100% + 12px);
            top: 50%;
            transform: translateY(-50%);
            background: var(--bg-surface-3);
            color: var(--text-primary);
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.75rem;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            border: 1px solid var(--border-default);
        }
        
        .tooltip::before {
            content: '';
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            border: 6px solid transparent;
            border-right-color: var(--bg-surface-3);
        }
        
        .menu-item.group:hover .tooltip {
            opacity: 1;
        }
        
        /* ========================================
           Custom Scrollbar
           ======================================== */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: var(--border-default);
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: var(--text-muted);
        }
        
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        /* ========================================
           Button Styles
           ======================================== */
        .btn-primary {
            background-color: var(--brand-primary);
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--brand-hover);
            transform: translateY(-1px);
        }
        
        .btn-secondary {
            background-color: transparent;
            color: var(--text-primary);
            border: 1px solid var(--border-default);
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .btn-secondary:hover {
            border-color: var(--brand-primary);
            color: var(--brand-primary);
        }
        
        /* ========================================
           Card Styles
           ======================================== */
        .card {
            background-color: var(--bg-surface-2);
            border: 1px solid var(--border-default);
            border-radius: 0.75rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 1px rgba(37,99,235,0.4);
        }
        
        /* ========================================
           Form Input Styles
           ======================================== */
        .input-field {
            background-color: var(--bg-surface-1);
            border: 1px solid var(--border-default);
            color: var(--text-primary);
            border-radius: 0.5rem;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            width: 100%;
        }
        
        .input-field::placeholder {
            color: var(--text-muted);
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }
        
        .input-field.error {
            border-color: var(--color-error);
        }
        
        /* ========================================
           Status Badges
           ======================================== */
        .badge-success {
            background-color: rgba(34, 197, 94, 0.1);
            color: var(--color-success);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--color-warning);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-error {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--color-error);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-info {
            background-color: rgba(56, 189, 248, 0.1);
            color: var(--color-info);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        /* ========================================
           Table Styles
           ======================================== */
        .table-container {
            background-color: var(--bg-surface-2);
            border: 1px solid var(--border-default);
            border-radius: 0.75rem;
            overflow: hidden;
        }
        
        .table-header {
            background-color: var(--bg-surface-1);
            border-bottom: 1px solid var(--border-default);
        }
        
        .table-row {
            border-bottom: 1px solid var(--border-subtle);
            transition: background-color 0.15s ease;
        }
        
        .table-row:hover {
            background-color: var(--bg-surface-1);
        }
        
        .table-row:last-child {
            border-bottom: none;
        }
    </style>
    @stack('styles')
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
    class="bg-app-background text-text-primary"
>
    <!-- Preloader -->
    <div
        x-show="loaded"
        x-cloak
        class="fixed left-0 top-0 z-[999999] flex h-screen w-screen items-center justify-center bg-app-background"
    >
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-border-default border-t-brand-primary"></div>
    </div>

    <!-- Page Wrapper -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Content Area -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto custom-scrollbar">
            <!-- Overlay for Mobile Menu Only -->
            <div
                @click="mobileMenuOpen = false"
                :class="mobileMenuOpen ? 'block lg:hidden' : 'hidden'"
                class="fixed w-full h-screen z-[9998] bg-black/60 transition-opacity duration-300"
            ></div>

            <!-- Header -->
            @include('admin.partials.header')

            <!-- Main Content -->
            <main class="flex-1">
                <div class="p-4 mx-auto max-w-7xl md:p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>
