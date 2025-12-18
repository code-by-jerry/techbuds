<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>@yield('title', 'Admin Dashboard') · Techbuds</title>

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

            body {
                font-family: system-ui, -apple-system, "Segoe UI", Roboto,
                    "Helvetica Neue", Arial, sans-serif;
            }

            .custom-scrollbar::-webkit-scrollbar {
                width: 8px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #cbd5e0;
                border-radius: 4px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #a0aec0;
            }

            .dark .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #4a5568;
            }
        </style>
    </head>
    <body
        x-data="{
    page: 'ecommerce',
    loaded: true,
    darkMode: false,
    stickyMenu: false,
    sidebarToggle: false,
    scrollTop: false
}"
        x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')); $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{'dark bg-gray-900': darkMode === true}"
    >
        <!-- ===== Preloader Start ===== -->
        <div
            x-show="!loaded"
            class="fixed inset-0 z-9999 flex items-center justify-center bg-surface-1 dark:bg-gray-900"
        >
            <div
                class="h-16 w-16 animate-spin rounded-full border-4 border-border-default border-t-primary dark:border-gray-800 dark:border-t-secondary"
            ></div>
        </div>
        <!-- ===== Preloader End ===== -->

        <!-- ===== Page Wrapper Start ===== -->
        <div class="flex h-screen overflow-hidden">
            <!-- ===== Sidebar Start ===== -->
            <aside
                x-cloak
                :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
                class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-border-default bg-surface-1 px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0 transition-safe"
            >
                <!-- SIDEBAR HEADER -->
                <div
                    :class="sidebarToggle ? 'justify-center' : 'justify-between'"
                    class="flex items-center gap-2 pt-8 pb-7"
                >
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-2"
                    >
                        <span
                            class="logo"
                            :class="sidebarToggle ? 'hidden' : ''"
                        >
                            <span class="text-2xl font-bold text-primary"
                                >Techbuds</span
                            >
                        </span>
                        <span
                            class="logo-icon"
                            :class="sidebarToggle ? 'lg:block text-xl' : 'hidden'"
                            >⚙️</span
                        >
                    </a>
                </div>

                <div
                    class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar flex-1"
                >
                    <!-- Sidebar Menu -->
                    <nav x-data="{ selected: $persist('Dashboard') }">
                        <!-- Menu Group -->
                        <div>
                            <h3
                                class="mb-4 text-xs uppercase leading-[20px] text-text-muted"
                            >
                                <span
                                    class="menu-group-title"
                                    :class="sidebarToggle ? 'lg:hidden' : ''"
                                    >MENU</span
                                >
                            </h3>

                            <ul class="flex flex-col gap-2 mb-6">
                                <!-- Dashboard -->
                                <li>
                                    <a
                                        href="{{ route('admin.dashboard') }}"
                                        :class="page === 'ecommerce' ? 'menu-item-active' : 'menu-item-inactive'"
                                        class="menu-item group relative flex items-center gap-3 rounded-lg px-3.5 py-2.5 text-sm font-medium transition-safe"
                                    >
                                        <svg
                                            :class="page === 'ecommerce' ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            class="transition-safe"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span
                                            class="menu-item-text"
                                            :class="sidebarToggle ? 'lg:hidden' : ''"
                                            >Dashboard</span
                                        >
                                    </a>
                                </li>

                                <!-- Users -->
                                <li>
                                    <a
                                        href="#"
                                        class="menu-item group relative flex items-center gap-3 rounded-lg px-3.5 py-2.5 text-sm font-medium transition-safe menu-item-inactive"
                                    >
                                        <svg
                                            class="transition-safe menu-item-icon-inactive"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span
                                            class="menu-item-text"
                                            :class="sidebarToggle ? 'lg:hidden' : ''"
                                            >Users</span
                                        >
                                    </a>
                                </li>

                                <!-- Settings -->
                                <li>
                                    <a
                                        href="#"
                                        class="menu-item group relative flex items-center gap-3 rounded-lg px-3.5 py-2.5 text-sm font-medium transition-safe menu-item-inactive"
                                    >
                                        <svg
                                            class="transition-safe menu-item-icon-inactive"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M14 2C14.4142 2 14.75 2.33579 14.75 2.75V5.73291L17.75 5.73291H19C19.4142 5.73291 19.75 6.0687 19.75 6.48291C19.75 6.89712 19.4142 7.23291 19 7.23291H18.5L18.5 12.2329C18.5 15.5691 15.9866 18.3183 12.75 18.6901V21.25C12.75 21.6642 12.4142 22 12 22C11.5858 22 11.25 21.6642 11.25 21.25V18.6901C8.01342 18.3183 5.5 15.5691 5.5 12.2329L5.5 7.23291H5C4.58579 7.23291 4.25 6.89712 4.25 6.48291C4.25 6.0687 4.58579 5.73291 5 5.73291L6.25 5.73291L8.5 5.73291L8.5 2.75C8.5 2.33579 8.83579 2 9.25 2C9.66421 2 10 2.33579 10 2.75L10 5.73291L14 5.73291V2.75ZM7 7.23291L7 12.2329C7 14.9943 9.23858 17.2329 12 17.2329C14.7614 17.2329 17 14.9943 17 12.2329L17 7.23291L7 7.23291Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span
                                            class="menu-item-text"
                                            :class="sidebarToggle ? 'lg:hidden' : ''"
                                            >Settings</span
                                        >
                                    </a>
                                </li>

                                <!-- Logs -->
                                <li>
                                    <a
                                        href="#"
                                        class="menu-item group relative flex items-center gap-3 rounded-lg px-3.5 py-2.5 text-sm font-medium transition-safe menu-item-inactive"
                                    >
                                        <svg
                                            class="transition-safe menu-item-icon-inactive"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5C19.7426 20.75 20.75 19.7426 20.75 18.5V5.5C20.75 4.25736 19.7426 3.25 18.5 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5C18.9142 4.75 19.25 5.08579 19.25 5.5V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25 9C6.25 8.58579 6.58579 8.25 7 8.25L17 8.25C17.4142 8.25 17.75 8.58579 17.75 9C17.75 9.41421 17.4142 9.75 17 9.75L7 9.75C6.58579 9.75 6.25 9.41421 6.25 9ZM6.25 14C6.25 13.5858 6.58579 13.25 7 13.25H17C17.4142 13.25 17.75 13.5858 17.75 14C17.75 14.4142 17.4142 14.75 17 14.75H7C6.58579 14.75 6.25 14.4142 6.25 14Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span
                                            class="menu-item-text"
                                            :class="sidebarToggle ? 'lg:hidden' : ''"
                                            >Logs</span
                                        >
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <!-- Sidebar Footer -->
                <div
                    :class="sidebarToggle ? 'lg:hidden' : ''"
                    class="mb-6 rounded-lg bg-surface-2 p-4 text-center dark:bg-surface-1/[0.03]"
                >
                    <h4
                        class="mb-2 text-sm font-semibold text-heading dark:text-white"
                    >
                        Techbuds Admin
                    </h4>
                    <p class="mb-3 text-xs text-text-secondary dark:text-text-muted">
                        Secure admin dashboard for Techbuds
                    </p>
                </div>
            </aside>
            <!-- ===== Sidebar End ===== -->

            <!-- ===== Content Area Start ===== -->
            <div
                class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto"
            >
                <!-- Small Device Overlay Start -->
                <div
                    x-show="sidebarToggle"
                    @click="sidebarToggle = false"
                    class="fixed inset-0 z-9998 hidden bg-black/50 lg:hidden"
                    x-cloak
                ></div>
                <!-- Small Device Overlay End -->

                <!-- ===== Header Start ===== -->
                <header
                    x-data="{ menuToggle: false, notifying: true, dropdownOpen: false }"
                    @click.outside="dropdownOpen = false"
                    class="sticky top-0 z-99999 flex w-full border-b border-border-default bg-surface-1 dark:border-gray-800 dark:bg-gray-900 transition-safe"
                >
                    <div
                        class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6"
                    >
                        <div
                            class="flex w-full items-center justify-between gap-2 border-b border-border-default px-4 py-3 lg:justify-normal lg:border-b-0 lg:px-0 lg:py-4 dark:border-gray-800"
                        >
                            <!-- Hamburger Toggle BTN -->
                            <button
                                @click.stop="sidebarToggle = !sidebarToggle"
                                class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg border border-border-default text-text-muted lg:h-11 lg:w-11 dark:border-gray-800 dark:text-text-muted transition-safe"
                                :class="sidebarToggle ? 'lg:bg-transparent dark:lg:bg-transparent bg-surface-2 dark:bg-gray-800' : ''"
                            >
                                <svg
                                    class="hidden fill-current lg:block"
                                    width="16"
                                    height="12"
                                    viewBox="0 0 16 12"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </button>

                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="lg:hidden"
                            >
                                <span class="text-xl font-bold text-primary"
                                    >T</span
                                >
                            </a>

                            <div class="hidden lg:block">
                                <form>
                                    <div class="relative">
                                        <span
                                            class="absolute top-1/2 left-4 -translate-y-1/2"
                                        >
                                            <svg
                                                class="fill-gray-500 dark:fill-gray-400"
                                                width="18"
                                                height="18"
                                                viewBox="0 0 20 20"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z"
                                                    fill="currentColor"
                                                />
                                            </svg>
                                        </span>
                                        <input
                                            type="text"
                                            placeholder="Search..."
                                            class="h-11 w-full rounded-lg border border-border-default bg-surface-1 py-2.5 pr-4 pl-12 text-sm text-heading placeholder:text-text-muted focus:border-secondary focus:outline-none focus:ring-3 focus:ring-secondary/10 dark:border-gray-800 dark:bg-gray-900 dark:text-white dark:placeholder:text-text-muted"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div
                            :class="menuToggle ? 'flex' : 'hidden'"
                            class="w-full items-center justify-between gap-4 px-4 py-4 lg:flex lg:justify-end lg:px-0"
                        >
                            <!-- Dark Mode Toggler -->
                            <button
                                @click.prevent="darkMode = !darkMode"
                                class="flex h-11 w-11 items-center justify-center rounded-full border border-border-default bg-surface-1 text-text-muted transition-safe hover:bg-surface-2 dark:border-gray-800 dark:bg-gray-900 dark:text-text-muted dark:hover:bg-gray-800"
                            >
                                <svg
                                    class="hidden dark:block"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 20 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <svg
                                    class="dark:hidden"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 20 20"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </button>

                            <!-- User Dropdown -->
                            <div class="relative">
                                <button
                                    @click.prevent="dropdownOpen = !dropdownOpen"
                                    class="flex items-center gap-2 text-text-primary dark:text-text-muted transition-safe"
                                >
                                    <span
                                        class="h-9 w-9 overflow-hidden rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-sm font-bold"
                                    >
                                        {{ strtoupper(substr(Auth::guard('admin')->user()?->name ?? 'A', 0, 1)) }}
                                    </span>
                                    <span
                                        class="hidden text-sm font-medium sm:block"
                                        >{{ Auth::guard('admin')->user()?->name ?? 'Admin' }}</span
                                    >
                                    <svg
                                        :class="dropdownOpen && 'rotate-180'"
                                        class="stroke-gray-500 dark:stroke-gray-400 transition-safe"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 18 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M4.3125 8.65625L9 13.3437L13.6875 8.65625"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div
                                    x-show="dropdownOpen"
                                    x-cloak
                                    class="shadow-theme-lg absolute right-0 mt-3 w-60 rounded-lg border border-border-default bg-surface-1 p-3 dark:border-gray-800 dark:bg-gray-900"
                                >
                                    <div
                                        class="mb-3 border-b border-border-default pb-3 dark:border-gray-800"
                                    >
                                        <span
                                            class="block text-sm font-medium text-heading dark:text-white"
                                            >{{ Auth::guard('admin')->user()?->name }}</span
                                        >
                                        <span
                                            class="block text-xs text-text-muted dark:text-text-muted mt-0.5"
                                            >{{ Auth::guard('admin')->user()?->email }}</span
                                        >
                                    </div>

                                    <form
                                        method="POST"
                                        action="{{ route('admin.logout') }}"
                                        class="mt-3"
                                    >
                                        @csrf
                                        <button
                                            type="submit"
                                            class="w-full px-3 py-2 text-sm font-medium text-text-primary rounded-lg hover:bg-surface-2 dark:text-text-muted dark:hover:bg-surface-1/[0.03] transition-safe text-left"
                                        >
                                            Sign out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- ===== Header End ===== -->

                <!-- ===== Main Content Start ===== -->
                <main class="flex-1 overflow-y-auto">
                    <div class="mx-auto max-w-7xl px-4 py-6 md:px-6 md:py-8">
                        @yield('content')
                    </div>
                </main>
                <!-- ===== Main Content End ===== -->
            </div>
            <!-- ===== Content Area End ===== -->
        </div>
        <!-- ===== Page Wrapper End ===== -->

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                setTimeout(() => {
                    document.querySelector('[x-data*="loaded"]')?.dispatchEvent(
                        new CustomEvent("update", {
                            detail: { loaded: true },
                        })
                    );
                }, 500);
            });
        </script>
    </body>
</html>
