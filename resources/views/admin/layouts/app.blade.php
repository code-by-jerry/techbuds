<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>@yield('title', 'Admin Dashboard') · Techbuds</title>
        
        <!-- Favicon -->
        @include('components.favicon')
        @if (file_exists(public_path('build/manifest.json')) ||
        file_exists(public_path('hot'))) @vite(['resources/css/app.css',
        'resources/js/app.js']) @endif

        <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        ></script>

        <style>
            :root {
                --color-primary: #11224e;
                --color-secondary: #1f3b88;
                --color-accent: #efece3;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
                    Roboto, sans-serif;
                background: #f8f9fa;
            }

            .logo-badge {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: linear-gradient(
                    135deg,
                    var(--color-primary) 0%,
                    var(--color-secondary) 100%
                );
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--color-accent);
                font-weight: 900;
                font-size: 20px;
                box-shadow: 0 4px 15px rgba(17, 34, 78, 0.15);
            }

            button,
            a {
                transition: all 0.3s ease;
            }

            ::-webkit-scrollbar {
                width: 8px;
            }
            ::-webkit-scrollbar-track {
                background: transparent;
            }
            ::-webkit-scrollbar-thumb {
                background: #cbd5e0;
                border-radius: 4px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #a0aec0;
            }
        </style>
    </head>
    <body
        x-data="{ sidebarOpen: true, darkMode: false }"
        x-init="darkMode = JSON.parse(localStorage.getItem('darkMode') || 'false')"
        :class="darkMode ? 'dark' : ''"
        class="transition-colors"
    >
        <div class="flex h-screen overflow-hidden bg-surface-2 bg-surface-2">
            <!-- Sidebar -->
            <aside
                :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
                class="fixed lg:static w-64 h-screen bg-surface-1 bg-surface-1 border-r border-border-default border-border-default z-40 transform transition-transform duration-300 overflow-y-auto"
            >
                <!-- Sidebar Header -->
                <div class="p-6 border-b border-border-default border-border-default">
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 hover:opacity-80"
                    >
                        <div class="logo-badge">T</div>
                        <div>
                            <h2
                                class="text-lg font-bold text-heading text-text-primary"
                            >
                                Techbuds
                            </h2>
                            <p class="text-xs text-text-muted dark:text-text-muted">
                                Admin Panel
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Main Menu -->
                <nav class="p-4 space-y-2">
                    <div>
                        <p
                            class="px-4 py-2 text-xs font-semibold text-text-muted dark:text-text-muted uppercase"
                        >
                            Main
                        </p>
                        <ul class="space-y-1">
                            <li>
                                <a
                                    href="{{ route('admin.dashboard') }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-primary dark:text-gray-300 hover:bg-brand-primary/10 dark:hover:bg-blue-900/20 hover:text-brand-primary"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l9-5V9m-9 16l-9-5V9m9-4l7-4"
                                        />
                                    </svg>
                                    <span class="font-medium">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Blogs Section -->
                    <div class="pt-4 border-t border-border-default border-border-default">
                        <p class="px-4 py-2 text-xs font-semibold text-text-muted dark:text-text-muted uppercase">
                            Content
                        </p>
                        <ul class="space-y-1">
                            <li>
                                <a
                                    href="{{ route('admin.blogs.index') }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-primary dark:text-gray-300 hover:bg-brand-primary/10 dark:hover:bg-blue-900/20 hover:text-brand-primary {{ request()->routeIs('admin.blogs.*') ? 'bg-brand-primary/10 dark:bg-blue-900/20 text-brand-primary' : '' }}"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span class="font-medium">Blogs</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- DevTools Section -->
                    <div
                        x-data="{ openTools: {{ request()->routeIs('admin.tool-*') ? 'true' : 'false' }} }"
                        class="pt-4 border-t border-border-default border-border-default"
                    >
                        <button
                            @click="openTools = !openTools"
                            class="w-full flex items-center justify-between px-4 py-2 text-xs font-semibold text-text-muted dark:text-text-muted uppercase hover:text-text-primary"
                        >
                            <span>DevTools</span>
                            <svg
                                :class="openTools ? 'rotate-180' : ''"
                                class="w-4 h-4 transition-transform"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3"
                                />
                            </svg>
                        </button>

                        <ul
                            x-show="openTools"
                            x-transition
                            class="mt-2 space-y-1 ml-2"
                        >
                            <li>
                                <a
                                    href="{{ route('admin.tool-categories.index') }}"
                                    class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm text-text-secondary dark:text-gray-300 hover:bg-brand-primary/20 hover:text-brand-soft {{ request()->routeIs('admin.tool-categories.*') ? 'bg-brand-primary text-white' : '' }}"
                                >
                                    <span class="w-1 h-1 bg-brand-primary rounded-full"></span>
                                    Categories
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('admin.tool-links.index') }}"
                                    class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm text-text-secondary dark:text-gray-300 hover:bg-brand-primary/20 hover:text-brand-soft {{ request()->routeIs('admin.tool-links.*') ? 'bg-brand-primary text-white' : '' }}"
                                >
                                    <span class="w-1 h-1 bg-brand-primary rounded-full"></span>
                                    Links
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Top Navigation -->
                <header
                    class="bg-surface-1 bg-surface-1 border-b border-border-default border-border-default sticky top-0 z-30"
                >
                    <div class="px-6 py-4 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <button
                                @click="sidebarOpen = !sidebarOpen"
                                class="lg:hidden p-2 hover:bg-surface-2 rounded-lg"
                            >
                                <svg
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                </svg>
                            </button>
                            <h1
                                class="text-2xl font-bold text-heading text-text-primary"
                            >
                                @yield('title', 'Dashboard')
                            </h1>
                        </div>

                        <div class="flex items-center gap-4">
                            <button
                                @click="darkMode = !darkMode; localStorage.setItem('darkMode', JSON.stringify(darkMode))"
                                class="p-2 hover:bg-surface-2 hover:bg-surface-2 rounded-lg"
                            >
                                <svg
                                    x-show="!darkMode"
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                                    ></path>
                                </svg>
                                <svg
                                    x-show="darkMode"
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l-2.12-2.12a4 4 0 00 5.656-5.656l2.12 2.12a6 6 0 01-5.656 5.656zm2.12-10.606a1 1 0 010 1.414l-.414.414a1 1 0 11-1.414-1.414l.414-.414a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </button>

                            <!-- User Menu -->
                            <div
                                x-data="{ userMenuOpen: false }"
                                class="relative"
                            >
                                <button
                                    @click="userMenuOpen = !userMenuOpen"
                                    class="flex items-center gap-2 p-2 hover:bg-surface-2 hover:bg-surface-2 rounded-lg"
                                >
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-white font-bold text-sm"
                                    >
                                        {{ substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1) }}
                                    </div>
                                    <span
                                        class="hidden sm:block text-sm font-medium text-text-primary dark:text-gray-300"
                                    >
                                        {{ Auth::guard('admin')->user()->name ?? 'Admin' }}
                                    </span>
                                </button>

                                <div
                                    x-show="userMenuOpen"
                                    @click.outside="userMenuOpen = false"
                                    x-transition
                                    class="absolute right-0 mt-2 w-48 bg-surface-1 bg-surface-2 rounded-lg shadow-lg border border-border-default overflow-hidden z-50"
                                >
                                    <a
                                        href="#"
                                        class="block px-4 py-3 text-sm text-text-primary dark:text-gray-300 hover:bg-surface-2"
                                        >Profile</a
                                    >
                                    <a
                                        href="#"
                                        class="block px-4 py-3 text-sm text-text-primary dark:text-gray-300 hover:bg-surface-2"
                                        >Settings</a
                                    >
                                    <hr class="border-border-default" />
                                    <form
                                        method="POST"
                                        action="{{ route('admin.logout') }}"
                                    >
                                        @csrf
                                        <button
                                            type="submit"
                                            class="w-full text-left px-4 py-3 text-sm text-error hover:bg-error/10"
                                        >
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-auto bg-surface-2 bg-surface-2">
                    <div class="p-6">@yield('content')</div>
                </main>
            </div>
        </div>

        <!-- Mobile Overlay -->
        <div
            x-show="sidebarOpen && window.innerWidth < 1024"
            @click="sidebarOpen = false"
            x-transition
            class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"
        ></div>
    </body>
</html>
