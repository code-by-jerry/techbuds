<nav x-data="{ mobileMenuOpen: false, scrolled: false }" 
     @scroll.window="scrolled = window.scrollY > 20"
     :class="scrolled ? 'bg-app-background/95 backdrop-blur-lg border-border-default' : 'bg-app-background border-transparent'"
     class="fixed top-0 w-full z-50 border-b transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" aria-label="Techbuds Home" class="flex items-center gap-2">
                    <img src="{{ asset('images/techbuds-light.png') }}" alt="Techbuds Logo" class="h-10 w-auto">
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('services') }}" class="px-4 py-2 rounded-lg text-text-secondary hover:text-white hover:bg-surface-2 transition-all duration-200 text-sm font-medium">Services</a>
                <a href="/#story" class="px-4 py-2 rounded-lg text-text-secondary hover:text-white hover:bg-surface-2 transition-all duration-200 text-sm font-medium">Story</a>
                <a href="/portfolio" class="px-4 py-2 rounded-lg text-text-secondary hover:text-white hover:bg-surface-2 transition-all duration-200 text-sm font-medium">Portfolio</a>
                <a href="{{ route('blog.index') }}" class="px-4 py-2 rounded-lg text-text-secondary hover:text-white hover:bg-surface-2 transition-all duration-200 text-sm font-medium">Blogs</a>
                <a href="/#contact" class="ml-2 px-5 py-2.5 rounded-lg bg-brand-primary text-white hover:bg-brand-hover transition-all duration-200 text-sm font-medium shadow-lg shadow-brand-primary/20">
                    Contact Us
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg text-text-secondary hover:bg-surface-2 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden bg-surface-1 border-t border-border-default">
        <div class="px-4 py-4 space-y-1">
            <a href="{{ route('services') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-lg text-text-secondary hover:text-white hover:bg-surface-2 transition-colors text-sm font-medium">Services</a>
            <a href="/#story" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-lg text-text-secondary hover:text-white hover:bg-surface-2 transition-colors text-sm font-medium">Story</a>
            <a href="/portfolio" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-lg text-text-secondary hover:text-white hover:bg-surface-2 transition-colors text-sm font-medium">Portfolio</a>
            <a href="{{ route('blog.index') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-lg text-text-secondary hover:text-white hover:bg-surface-2 transition-colors text-sm font-medium">Blogs</a>
            <a href="/#contact" @click="mobileMenuOpen = false" class="block px-4 py-3 mt-2 rounded-lg bg-brand-primary text-white text-center hover:bg-brand-hover transition-colors text-sm font-medium">Contact Us</a>
        </div>
    </div>
</nav>
