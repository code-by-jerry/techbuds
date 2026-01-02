@php
    $services = config('service_pages', []);
    $locations = collect(config('locations', []))
        ->filter(fn ($loc) => ($loc['priority'] ?? null) === 'high' && ($loc['seo_index'] ?? false))
        ->take(6) // Show top 6 locations
        ->all();
    
    $serviceNames = [
        'web-development' => 'Web Development',
        'mobile-app-development' => 'Mobile App Development',
        'brand-experience-content-marketing' => 'Brand Experience & Content Marketing',
        'web-hosting-app-deployment-support' => 'Web Hosting & Deployment',
        'seo-digital-marketing' => 'SEO Services',
        'database-data-warehousing' => 'Database & Data Warehousing',
        'api-development-system-integration' => 'API & System Integration',
        'custom-it-solutions' => 'Custom IT Solutions',
    ];
@endphp

<footer class="bg-surface-1 border-t border-border-default" itemscope itemtype="https://schema.org/Organization">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Main Footer Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-12 mb-12">
            <!-- Brand & Contact Column -->
            <div class="lg:col-span-2">
                <div class="mb-6">
                    <img src="{{ asset('images/techbuds-light.png') }}" alt="Techbuds - Design Develop Deliver" class="h-10 w-auto mb-4" itemprop="logo">
                    <p class="text-text-muted text-sm mb-6 max-w-md">Design Develop Deliver - Professional web development, mobile app development, SEO services, API integration, and web hosting & deployment solutions. Trusted technology partner for growing businesses.</p>
                </div>
                
                <!-- Contact Information -->
                <div class="space-y-4 mb-6" itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <div>
                            <div class="text-xs text-text-disabled uppercase tracking-wider mb-1">Phone</div>
                            <a href="tel:+917092936243" class="text-text-primary font-semibold hover:text-brand-primary transition-colors text-sm" itemprop="telephone">+91 7092936243, +91 9885394334</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <div class="text-xs text-text-disabled uppercase tracking-wider mb-1">Email</div>
                            <a href="mailto:techbuds57@gmail.com" class="text-text-primary font-semibold hover:text-brand-primary transition-colors text-sm" itemprop="email">techbuds57@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-3" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <svg class="w-5 h-5 text-brand-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <div class="text-xs text-text-disabled uppercase tracking-wider mb-1">Location</div>
                            <span class="text-text-primary font-semibold text-sm" itemprop="addressLocality">Bangalore</span>, <span itemprop="addressCountry">India</span>
                        </div>
                    </div>
                </div>
                
                <!-- Social Links -->
                <div class="flex items-center gap-3">
                    <a href="https://twitter.com/techbuds" target="_blank" rel="noopener noreferrer" aria-label="Follow Techbuds on Twitter" class="w-10 h-10 rounded-lg bg-surface-2 flex items-center justify-center text-text-muted hover:bg-brand-primary hover:text-white transition-all duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="https://linkedin.com/company/techbuds" target="_blank" rel="noopener noreferrer" aria-label="Follow Techbuds on LinkedIn" class="w-10 h-10 rounded-lg bg-surface-2 flex items-center justify-center text-text-muted hover:bg-brand-primary hover:text-white transition-all duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="https://github.com/techbuds" target="_blank" rel="noopener noreferrer" aria-label="Follow Techbuds on GitHub" class="w-10 h-10 rounded-lg bg-surface-2 flex items-center justify-center text-text-muted hover:bg-brand-primary hover:text-white transition-all duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                </div>
            </div>
            
            <!-- Services Column -->
            <div>
                <h4 class="text-heading font-semibold mb-4 text-sm uppercase tracking-wider">Our Services</h4>
                <ul class="space-y-3">
                    @php
                        $focusedServices = [
                            'web-development' => 'Web Development',
                            'mobile-app-development' => 'Mobile App Development',
                            'seo-digital-marketing' => 'SEO Services',
                            'api-development-system-integration' => 'API & System Integration',
                            'web-hosting-app-deployment-support' => 'Web Hosting & Deployment'
                        ];
                    @endphp
                    @foreach($focusedServices as $slug => $name)
                        @if(isset($services[$slug]))
                        <li>
                            <a href="{{ route('services.show', $slug) }}" class="text-text-muted hover:text-brand-primary transition-colors text-sm font-medium" title="{{ $name }}">
                                {{ $name }}
                            </a>
                        </li>
                        @endif
                    @endforeach
                    <li class="pt-2 border-t border-border-default mt-3">
                        <a href="{{ route('services') }}" class="text-brand-primary hover:text-brand-soft font-medium text-sm inline-flex items-center gap-1">
                            View All Services
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Location-Based Services Column -->
            <div>
                <h4 class="text-heading font-semibold mb-4 text-sm uppercase tracking-wider">Services by Location</h4>
                <ul class="space-y-3">
                    @foreach($locations as $locationSlug => $location)
                    <li>
                        <a href="{{ route('locations') }}#{{ $locationSlug }}" class="text-text-muted hover:text-brand-primary transition-colors text-sm" title="Techbuds Services in {{ $location['name'] }}">
                            Services in {{ $location['name'] }}
                        </a>
                    </li>
                    @endforeach
                    <li class="pt-2">
                        <a href="{{ route('locations') }}" class="text-brand-primary hover:text-brand-soft font-medium text-sm inline-flex items-center gap-1">
                            All Locations
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Company & Resources Column -->
            <div>
                <h4 class="text-heading font-semibold mb-4 text-sm uppercase tracking-wider">Company</h4>
                <ul class="space-y-3 mb-6">
                    <li><a href="/#story" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Our Story</a></li>
                    <li><a href="/portfolio" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Portfolio</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Blog & Insights</a></li>
                    <li><a href="{{ route('contact') }}" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Contact Us</a></li>
                    <li><a href="{{ route('devtools.index') }}" class="text-text-muted hover:text-brand-primary transition-colors text-sm">Developer Tools</a></li>
                </ul>
                
                <!-- CTA Button -->
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 text-sm shadow-lg shadow-brand-primary/25 w-full">
                    Get Free Consultation
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- SEO Service Links Section -->
        <div class="pt-8 border-t border-surface-2 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                @php
                    $focusedServicesForSEO = ['web-development', 'mobile-app-development', 'seo-digital-marketing', 'api-development-system-integration', 'web-hosting-app-deployment-support'];
                    $topLocations = ['india', 'usa', 'uk', 'canada', 'australia', 'uae'];
                @endphp
                
                @foreach($focusedServicesForSEO as $serviceSlug)
                    @if(isset($services[$serviceSlug]))
                    <div>
                        <h5 class="text-heading font-semibold mb-3 text-sm">{{ $serviceNames[$serviceSlug] ?? ucfirst(str_replace('-', ' ', $serviceSlug)) }}</h5>
                        <ul class="space-y-2">
                            @foreach($topLocations as $locationSlug)
                                @if(isset(config('locations')[$locationSlug]))
                                    <li>
                                        <a href="{{ route('services.location', ['service' => $serviceSlug, 'location' => $locationSlug]) }}" class="text-text-muted hover:text-brand-primary transition-colors text-sm flex items-center gap-2 group" title="{{ $serviceNames[$serviceSlug] ?? ucfirst(str_replace('-', ' ', $serviceSlug)) }} in {{ config('locations')[$locationSlug]['name'] }}">
                                            <svg class="w-3 h-3 text-text-disabled group-hover:text-brand-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                            <span>in {{ config('locations')[$locationSlug]['name'] }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-surface-2 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex flex-col md:flex-row items-center gap-4">
                <p class="text-text-disabled text-sm">&copy; {{ date('Y') }} <span itemprop="name">Techbuds</span>. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="text-text-disabled hover:text-text-muted transition-colors text-sm">Privacy Policy</a>
                    <span class="text-text-disabled">•</span>
                    <a href="#" class="text-text-disabled hover:text-text-muted transition-colors text-sm">Terms of Service</a>
                    <span class="text-text-disabled">•</span>
                    <a href="/sitemap.xml" class="text-text-disabled hover:text-text-muted transition-colors text-sm">Sitemap</a>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-text-disabled text-xs">Made with</span>
                <svg class="w-4 h-4 text-error" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                </svg>
                <span class="text-text-disabled text-xs">in Bangalore, India</span>
            </div>
        </div>
    </div>
</footer>

<!-- Enhanced Structured Data -->
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Techbuds',
    'url' => url('/'),
    'logo' => asset('images/techbuds-light.png'),
    'description' => 'Techbuds - Design Develop Deliver. Professional web development, mobile app development, SEO services, API integration, and web hosting & deployment solutions. Trusted technology partner for growing businesses.',
    'foundingDate' => '2025',
    'founders' => [
        [
            '@type' => 'Person',
            'name' => 'Techbuds Team'
        ]
    ],
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Bangalore',
        'addressRegion' => 'Karnataka',
        'addressCountry' => 'IN'
    ],
    'contactPoint' => [
        [
            '@type' => 'ContactPoint',
            'telephone' => '+91-7092936243',
            'contactType' => 'Customer Service',
            'email' => 'techbuds57@gmail.com',
            'areaServed' => 'Worldwide',
            'availableLanguage' => ['English', 'Hindi']
        ]
    ],
    'sameAs' => [
        'https://twitter.com/techbuds',
        'https://linkedin.com/company/techbuds',
        'https://github.com/techbuds'
    ],
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Techbuds Professional Services',
        'itemListElement' => array_values(array_filter(array_map(function($slug, $service) use ($serviceNames) {
            $focusedServices = ['web-development', 'mobile-app-development', 'seo-digital-marketing', 'api-development-system-integration', 'web-hosting-app-deployment-support'];
            if (!in_array($slug, $focusedServices)) {
                return null;
            }
            return [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => $serviceNames[$slug] ?? ucfirst(str_replace('-', ' ', $slug)),
                    'description' => $service['description'] ?? '',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'Techbuds'
                    ]
                ],
                'url' => route('services.show', $slug)
            ];
        }, array_keys($services), $services)))
    ]
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => url('/#website'),
    'name' => 'Techbuds',
    'url' => url('/'),
    'potentialAction' => [
        [
            '@type' => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => url('/blog?search={search_term_string}')
            ],
            'query-input' => 'required name=search_term_string'
        ]
    ]
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

<!-- Floating WhatsApp Button -->
@include('components.whatsapp-float')
