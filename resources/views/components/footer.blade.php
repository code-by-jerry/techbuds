<footer class="bg-[#176B87] text-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <img src="{{ asset('images/techbuds!.png') }}" alt="Techbuds Logo" class="h-10 w-auto mb-4 brightness-0 invert">
                <p class="text-gray-400">Design Develop Deliver</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Services</h4>
                <ul class="space-y-2 text-gray-200">
                    <li><a href="/\#services" class="hover:text-white transition-colors">Web Development</a></li>
                    <li><a href="/\#services" class="hover:text-white transition-colors">Mobile Apps</a></li>
                    <li><a href="/\#services" class="hover:text-white transition-colors">UI/UX Design</a></li>
                    <li><a href="/\#services" class="hover:text-white transition-colors">DevOps</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-200">
                    <li>Email: contact@techbuds.online</li>
                    <li><a href="/api/login" class="hover:text-white transition-colors">Admin Portal</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 pt-8 text-center text-gray-200">
            <p>&copy; {{ date('Y') }} Techbuds. All rights reserved.</p>
        </div>
    </div>
</footer>
