<header
    x-data="{menuToggle: false}"
    class="sticky top-0 z-[99999] flex w-full border-b border-[#088395]/10 bg-white"
>
    <div class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6">
        <!-- Mobile Header -->
        <div class="flex w-full items-center justify-between gap-2 border-b border-[#088395]/10 px-3 py-3 sm:gap-4 lg:hidden">
            <!-- Logo -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                <img class="h-10" src="{{ asset('images/techbuds!.png') }}" alt="Techbuds Logo" />
            </a>

            <!-- Mobile Menu Button -->
            <button
                class="flex h-10 w-10 items-center justify-center rounded-lg text-[#11224E] hover:bg-[#088395]/5 transition-colors"
                @click.stop="mobileMenuOpen = !mobileMenuOpen"
            >
                <svg :class="mobileMenuOpen ? 'hidden' : 'block'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg :class="mobileMenuOpen ? 'block' : 'hidden'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Desktop Header -->
        <div class="hidden w-full items-center justify-between gap-2 px-3 py-3 sm:gap-4 lg:flex lg:justify-normal lg:px-0 lg:py-4">
            <!-- Hamburger Toggle -->
            <button
                :class="sidebarToggle ? 'bg-[#088395]/5' : ''"
                class="z-[99999] flex h-10 w-10 items-center justify-center rounded-lg border border-[#088395]/20 text-[#11224E] hover:bg-[#088395]/5 transition-colors lg:h-11 lg:w-11"
                @click.stop="sidebarToggle = !sidebarToggle"
            >
                <svg class="fill-current" width="16" height="12" viewBox="0 0 16 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z" fill="currentColor"/>
                </svg>
            </button>

            <!-- Search -->
            <div class="hidden lg:block">
                <form>
                    <div class="relative">
                        <span class="absolute top-1/2 left-4 -translate-y-1/2">
                            <svg class="fill-[#088395]/60" width="20" height="20" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z" fill=""/>
                            </svg>
                        </span>
                        <input
                            type="text"
                            placeholder="Search..."
                            class="h-11 w-full rounded-lg border border-[#088395]/20 bg-white py-2.5 pr-4 pl-12 text-sm text-[#11224E] placeholder:text-[#088395]/40 focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395] focus:outline-none xl:w-[430px] transition-all"
                        />
                    </div>
                </form>
            </div>
        </div>

        <!-- Desktop User Menu -->
        <div class="hidden w-full items-center justify-end gap-4 px-5 py-4 lg:flex lg:px-0">
            <!-- Notifications -->
            <div class="relative" x-data="notificationDropdown()" @click.outside="open = false">
                <button
                    @click="open = !open; loadNotifications()"
                    class="relative flex h-11 w-11 items-center justify-center rounded-lg border border-[#088395]/20 text-[#11224E] hover:bg-[#088395]/5 transition-colors"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span
                        x-show="unreadCount > 0"
                        x-cloak
                        class="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs font-semibold text-white"
                        x-text="unreadCount"
                    ></span>
                </button>

                <!-- Notification Dropdown -->
                <div
                    x-show="open"
                    x-cloak
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-3 w-80 rounded-xl border border-[#088395]/20 bg-white shadow-lg z-50"
                >
                    <div class="flex items-center justify-between border-b border-[#088395]/10 px-4 py-3">
                        <h3 class="text-sm font-semibold text-[#11224E]">Notifications</h3>
                        <button
                            @click="markAllAsRead()"
                            x-show="unreadCount > 0"
                            x-cloak
                            class="text-xs text-[#088395] hover:text-[#37B7C3] transition-colors"
                        >
                            Mark all as read
                        </button>
                    </div>
                    <div class="max-h-48 overflow-y-auto">
                        <template x-if="notifications.length === 0">
                            <div class="px-4 py-8 text-center">
                                <p class="text-sm text-[#088395]/70">No notifications</p>
                            </div>
                        </template>
                        <template x-for="notification in notifications" :key="notification.id">
                            <a
                                :href="notification.link || '#'"
                                @click="markAsRead(notification.id)"
                                class="block px-4 py-3 border-b border-[#088395]/5 hover:bg-[#088395]/5 transition-colors"
                                :class="notification.is_read ? 'bg-white' : 'bg-[#088395]/2'"
                            >
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 mt-1">
                                        <div
                                            class="h-2 w-2 rounded-full"
                                            :class="notification.is_read ? 'bg-transparent' : 'bg-[#088395]'"
                                        ></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-[#11224E]" x-text="notification.title"></p>
                                        <p class="text-xs text-[#088395]/70 mt-1 line-clamp-2" x-text="notification.message"></p>
                                        <p class="text-xs text-[#088395]/50 mt-1" x-text="formatDate(notification.created_at)"></p>
                                    </div>
                                </div>
                            </a>
                        </template>
                    </div>
                </div>
            </div>

            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                <a
                    class="flex items-center text-[#11224E] hover:opacity-80 transition-opacity"
                    href="#"
                    @click.prevent="dropdownOpen = ! dropdownOpen"
                >
                    <span class="mr-3 h-11 w-11 overflow-hidden rounded-full bg-gradient-to-br from-[#088395] to-[#37B7C3] flex items-center justify-center">
                        <span class="text-white font-semibold text-sm">{{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}</span>
                    </span>
                    <span class="text-sm mr-1 block font-medium">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                    <svg :class="dropdownOpen && 'rotate-180'" class="stroke-[#088395] transition-transform" width="18" height="20" viewBox="0 0 18 20">
                        <path d="M4.3125 8.65625L9 13.3437L13.6875 8.65625" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                <!-- Dropdown -->
                <div
                    x-show="dropdownOpen"
                    x-cloak
                    class="absolute right-0 mt-3 flex w-[260px] flex-col rounded-xl border border-[#088395]/20 bg-white p-3 shadow-lg"
                >
                    <div class="pb-3 border-b border-[#088395]/10">
                        <span class="text-sm block font-semibold text-[#11224E]">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                        <span class="text-xs mt-0.5 block text-[#088395]/70">{{ Auth::guard('admin')->user()->email ?? 'admin@techbuds.online' }}</span>
                    </div>

                    <ul class="flex flex-col gap-1 pt-3 pb-2">
                        <li>
                            <a href="{{ route('admin.profile.show') }}" class="group text-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile Update
                            </a>
                        </li>
                    </ul>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="group text-sm mt-2 flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors w-full text-left border-t border-[#088395]/10 pt-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Sign out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        x-show="mobileMenuOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="lg:hidden fixed inset-y-0 right-0 z-[99999] w-80 bg-white shadow-xl border-l border-[#088395]/10"
    >
        <div class="flex flex-col h-full">
            <!-- Mobile Menu Header -->
            <div class="flex items-center justify-between p-4 border-b border-[#088395]/10">
                <h2 class="text-lg font-semibold text-[#11224E]">Menu</h2>
                <button @click="mobileMenuOpen = false" class="p-2 rounded-lg hover:bg-[#088395]/5">
                    <svg class="w-5 h-5 text-[#11224E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Content -->
            <div class="flex-1 overflow-y-auto p-4">
                <nav class="space-y-6">
                    <!-- MENU Section -->
                    <div>
                        <h3 class="mb-3 text-xs uppercase leading-[20px] text-[#088395]/60">MENU</h3>
                        <div class="space-y-2">
                            <a href="{{ route('admin.dashboard') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>
                            <a href="{{ route('admin.contacts.index') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Contacts
                            </a>
                        </div>
                    </div>

                    <!-- Content and Seo Section -->
                    <div>
                        <h3 class="mb-3 text-xs uppercase leading-[20px] text-[#088395]/60">Content and Seo</h3>
                        <div class="space-y-2">
                            <a href="{{ route('admin.blogs.index') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Blogs
                            </a>
                        </div>
                    </div>

                    <!-- Roles and Access Section (Only for Super Admin) -->
                    @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->email === 'admin@techbuds.online')
                    <div>
                        <h3 class="mb-3 text-xs uppercase leading-[20px] text-[#088395]/60">Roles and Access</h3>
                        <div class="space-y-2">
                            <a href="{{ route('admin.roles.index') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                User Roles and Actions
                            </a>
                            <a href="{{ route('admin.admins.index') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Admins/Users
                            </a>
                        </div>
                    </div>
                    @endif
                </nav>

                <!-- Mobile User Section -->
                <div class="mt-8 pt-8 border-t border-[#088395]/10">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="h-12 w-12 overflow-hidden rounded-full bg-gradient-to-br from-[#088395] to-[#37B7C3] flex items-center justify-center">
                            <span class="text-white font-semibold">{{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}</span>
                        </span>
                        <div>
                            <p class="text-sm font-semibold text-[#11224E]">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-[#088395]/70">{{ Auth::guard('admin')->user()->email ?? 'admin@techbuds.online' }}</p>
                        </div>
                    </div>
                    <nav class="space-y-1">
                        <a href="{{ route('admin.profile.show') }}" @click="mobileMenuOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors">
                            Profile Update
                        </a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5 transition-colors mt-2 border-t border-[#088395]/10 pt-2">
                                Sign out
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
function notificationDropdown() {
    return {
        open: false,
        notifications: [],
        unreadCount: 0,
        
        async loadNotifications() {
            try {
                const response = await fetch('{{ route("admin.notifications.index") }}');
                const data = await response.json();
                this.notifications = data.notifications;
                this.unreadCount = data.unread_count;
            } catch (error) {
                console.error('Error loading notifications:', error);
            }
        },
        
        async markAsRead(notificationId) {
            try {
                const response = await fetch(`/admin/notifications/${notificationId}/read`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                });
                const data = await response.json();
                if (data.success) {
                    this.unreadCount = data.unread_count;
                    const notification = this.notifications.find(n => n.id === notificationId);
                    if (notification) {
                        notification.is_read = true;
                    }
                }
            } catch (error) {
                console.error('Error marking notification as read:', error);
            }
        },
        
        async markAllAsRead() {
            try {
                const response = await fetch('{{ route("admin.notifications.mark-all-read") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                });
                const data = await response.json();
                if (data.success) {
                    this.unreadCount = 0;
                    this.notifications.forEach(n => n.is_read = true);
                }
            } catch (error) {
                console.error('Error marking all as read:', error);
            }
        },
        
        formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diff = now - date;
            const minutes = Math.floor(diff / 60000);
            const hours = Math.floor(diff / 3600000);
            const days = Math.floor(diff / 86400000);
            
            if (minutes < 1) return 'Just now';
            if (minutes < 60) return `${minutes}m ago`;
            if (hours < 24) return `${hours}h ago`;
            if (days < 7) return `${days}d ago`;
            return date.toLocaleDateString();
        },
        
        init() {
            this.loadNotifications();
            // Refresh notifications every 30 seconds
            setInterval(() => {
                if (!this.open) {
                    this.loadNotifications();
                }
            }, 30000);
        }
    }
}
</script>
