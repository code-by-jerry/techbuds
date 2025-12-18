<footer class="bg-surface-1 border-t border-border-default">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- Brand Column -->
            <div class="md:col-span-1">
                <img src="{{ asset('images/techbuds!.png') }}" alt="Techbuds Logo" class="h-10 w-auto mb-4 brightness-0 invert">
                <p class="text-text-muted text-sm mb-6">Design Develop Deliver</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="w-9 h-9 rounded-lg bg-surface-2 flex items-center justify-center text-text-muted hover:bg-brand-primary hover:text-white transition-all duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-surface-2 flex items-center justify-center text-text-muted hover:bg-brand-primary hover:text-white transition-all duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-surface-2 flex items-center justify-center text-text-muted hover:bg-brand-primary hover:text-white transition-all duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                </div>
            </div>
            
            <!-- Services Column -->
            <div>
                <h4 class="text-heading font-semibold mb-4 text-sm uppercase tracking-wider">Services</h4>
                <ul class="space-y-3">
                    <li><a href="/services/web-development" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Web Development</a></li>
                    <li><a href="/services/mobile-app-development" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Mobile Apps</a></li>
                    <li><a href="/services/ui-ux-design" class="text-text-muted hover:text-brand-primary transition-colors text-sm">UI/UX Design</a></li>
                    <li><a href="/services/devops-cloud" class="text-text-muted hover:text-brand-primary transition-colors text-sm">DevOps & Cloud</a></li>
                    <li><a href="/services/seo-digital-marketing" class="text-text-muted hover:text-brand-primary transition-colors text-sm">SEO & Marketing</a></li>
                </ul>
            </div>
            
            <!-- Company Column -->
            <div>
                <h4 class="text-heading font-semibold mb-4 text-sm uppercase tracking-wider">Company</h4>
                <ul class="space-y-3">
                    <li><a href="/#story" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Our Story</a></li>
                    <li><a href="/portfolio" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Portfolio</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Contact</a></li>
                </ul>
            </div>
            
            <!-- Contact Column -->
            <div>
                <h4 class="text-heading font-semibold mb-4 text-sm uppercase tracking-wider">Contact</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-brand-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:contact@techbuds.online" class="text-text-muted hover:text-brand-primary transition-colors text-sm">contact@techbuds.online</a>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-brand-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-text-muted text-sm">Bangalore, India</span>
                    </li>
                </ul>
                <a href="/api/login" class="mt-6 inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-border-default text-text-muted hover:border-brand-primary hover:text-brand-primary transition-all text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Admin Portal
                </a>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-surface-2 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-text-disabled text-sm">&copy; {{ date('Y') }} Techbuds. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="text-text-disabled hover:text-text-muted transition-colors text-sm">Privacy Policy</a>
                <a href="#" class="text-text-disabled hover:text-text-muted transition-colors text-sm">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<!-- Structured Data -->
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Techbuds',
    'url' => url('/'),
    'logo' => asset('images/techbuds!.png'),
    'email' => 'contact@techbuds.online',
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => url('/#website'),
    'name' => 'Techbuds',
    'url' => url('/'),
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
</script>

