<nav x-data="{ mobileMenuOpen: false }" class="fixed top-0 w-full bg-[#176B87] z-50 border-b border-[#176B87] text-[#FFFDF6]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="/" aria-label="Techbuds Home">
                    <img src="{{ asset('images/techbuds-light.png') }}" alt="Techbuds Logo" class="h-10 w-auto">
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('services') }}" class="text-[#FFFDF6] hover:opacity-80 transition-colors">Services</a>
                <a href="/#story" class="text-[#FFFDF6] hover:opacity-80 transition-colors">Story</a>
                <a href="/portfolio" class="text-[#FFFDF6] hover:opacity-80 transition-colors">Portfolio</a>
                <a href="/#contact" class="text-[#FFFDF6] hover:opacity-80 transition-colors">Contact</a>
                <a href="{{ route('blog.index') }}" class="text-[#FFFDF6] hover:opacity-80 transition-colors">Blogs</a>
            </div>
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-[#FFFDF6]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-[#176B87] border-t border-[#176B87]">
        <div class="px-4 py-4 space-y-3">
            <a href="{{ route('services') }}" @click="mobileMenuOpen = false" class="block text-[#FFFDF6] hover:opacity-80">Services</a>
            <a href="/#story" @click="mobileMenuOpen = false" class="block text-[#FFFDF6] hover:opacity-80">Story</a>
            <a href="/portfolio" @click="mobileMenuOpen = false" class="block text-[#FFFDF6] hover:opacity-80">Portfolio</a>
            <a href="{{ route('blog.index') }}" @click="mobileMenuOpen = false" class="block text-[#FFFDF6] hover:opacity-80">Blogs</a>
            <a href="/#contact" @click="mobileMenuOpen = false" class="block text-[#FFFDF6] hover:opacity-80">Contact</a>
        </div>
    </div>
</nav>
