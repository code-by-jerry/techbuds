<aside
    :class="sidebarToggle ? 'lg:w-[90px]' : 'lg:w-[290px]'"
    class="sidebar hidden lg:flex fixed left-0 top-0 z-[9999] h-screen w-[290px] flex-col overflow-y-auto border-r border-[#088395]/10 bg-white px-5 transition-all duration-500 ease-in-out lg:static no-scrollbar"
>
    <!-- Sidebar Header -->
    <div
        :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 pb-7"
    >
        <a href="{{ route('admin.dashboard') }}">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="h-10" src="{{ asset('images/techbuds!.png') }}" alt="Techbuds Logo" />
            </span>
            <img
                :class="sidebarToggle ? 'lg:block h-7' : 'hidden'"
                src="{{ asset('images/techbuds!-mini.png') }}"
                alt="Logo"
            />
        </a>
    </div>

    <div class="flex flex-col duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav>
            <div>
                <!-- MENU Section -->
                <h3
                    class="mb-4 text-xs uppercase leading-[20px] text-[#088395]/60 transition-opacity duration-300"
                    :class="sidebarToggle ? 'lg:hidden' : ''"
                >
                    MENU
                </h3>

                <ul class="flex flex-col gap-2" :class="sidebarToggle ? 'lg:mb-0' : 'lg:mb-6'">
                    <!-- Dashboard -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.dashboard') }}"
                            x-data="{ 
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'dashboard' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                Dashboard
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <!-- Contacts -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.contacts.index') }}"
                            x-data="{ 
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'contacts' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                Contacts
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                Contacts
                            </span>
                        </a>
                    </li>
                </ul>

                <!-- CRM Section -->
                <h3
                    class="mb-4 text-xs uppercase leading-[20px] text-[#088395]/60 transition-opacity duration-300"
                    :class="sidebarToggle ? 'lg:hidden' : ''"
                >
                    CRM
                </h3>

                <ul class="flex flex-col gap-2" :class="sidebarToggle ? 'lg:mb-0' : 'lg:mb-6'">
                    <!-- Clients -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.clients.index') }}"
                            x-data="{ 
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'clients' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                Clients
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                Clients
                            </span>
                        </a>
                    </li>

                    <!-- Projects -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.projects.index') }}"
                            x-data="{ 
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'projects' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                Projects
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                Projects
                            </span>
                        </a>
                    </li>
                </ul>

                <!-- Content and Seo Section -->
                <h3
                    class="mb-4 text-xs uppercase leading-[20px] text-[#088395]/60 transition-opacity duration-300"
                    :class="sidebarToggle ? 'lg:hidden' : ''"
                >
                    Content and Seo
                </h3>

                <ul class="flex flex-col gap-2" :class="sidebarToggle ? 'lg:mb-0' : 'lg:mb-6'">
                    <!-- Blogs -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.blogs.index') }}"
                            x-data="{ 
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'blogs' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                Blogs
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                Blogs
                            </span>
                        </a>
                    </li>

                    <!-- DevTools -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.tool-categories.index') }}"
                            x-data="{ 
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'tools' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                DevTools
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                DevTools
                            </span>
                        </a>
                    </li>

                    <!-- Templates -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.templates.index') }}"
                            x-data="{
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'templates' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-9a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2z" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                Templates
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                Templates
                            </span>
                        </a>
                    </li>
                </ul>

                <!-- Roles and Access Section (Only for Super Admin) -->
                @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->email === 'admin@techbuds.online')
                <h3
                    class="mb-4 text-xs uppercase leading-[20px] text-[#088395]/60 transition-opacity duration-300"
                    :class="sidebarToggle ? 'lg:hidden' : ''"
                >
                    Roles and Access
                </h3>

                <ul class="flex flex-col gap-2" :class="sidebarToggle ? 'lg:mb-0' : 'lg:mb-6'">
                    <!-- User Roles and Actions -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.roles.index') }}"
                            x-data="{ 
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'roles' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                User Roles and Actions
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                User Roles and Actions
                            </span>
                        </a>
                    </li>

                    <!-- Admins/Users -->
                    <li class="relative">
                        <a
                            href="{{ route('admin.admins.index') }}"
                            x-data="{ 
                                tooltipVisible: false,
                                updateTooltipPosition() {
                                    if (!this.tooltipVisible) return;
                                    const aside = $el.closest('aside');
                                    const rect = $el.getBoundingClientRect();
                                    const tooltip = $el.querySelector('.tooltip');
                                    if (tooltip && aside) {
                                        tooltip.style.left = (aside.offsetWidth + 8) + 'px';
                                        tooltip.style.top = (rect.top + (rect.height / 2)) + 'px';
                                        tooltip.style.transform = 'translateY(-50%)';
                                    }
                                }
                            }"
                            @mouseenter="if(sidebarToggle) { tooltipVisible = true; $nextTick(() => updateTooltipPosition()); }"
                            @mouseleave="tooltipVisible = false"
                            @mousemove="updateTooltipPosition()"
                            class="menu-item group flex items-center rounded-lg text-sm font-medium transition-all relative"
                            :class="[
                                sidebarToggle ? 'lg:justify-center lg:px-2.5 lg:py-2.5 lg:min-h-[40px]' : 'lg:gap-3 lg:px-3 lg:py-2.5',
                                page === 'admins' ? 'bg-[#088395]/10 text-[#088395]' : 'text-[#11224E] hover:bg-[#088395]/5'
                            ]"
                        >
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span
                                class="transition-all duration-300"
                                :class="sidebarToggle ? 'lg:hidden' : ''"
                            >
                                Admins/Users
                            </span>
                            <span
                                x-show="tooltipVisible"
                                x-transition
                                x-cloak
                                class="tooltip fixed px-2 py-1 text-xs font-medium text-white bg-[#11224E] rounded whitespace-nowrap pointer-events-none z-[10000] shadow-lg"
                            >
                                Admins/Users
                            </span>
                        </a>
                    </li>
                </ul>
                @endif
            </div>
        </nav>
    </div>
</aside>
