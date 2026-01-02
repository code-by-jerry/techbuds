<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Pricing - Affordable Web Development, Mobile Apps & SEO Services | Techbuds';
            $metaDescription = 'Transparent pricing for web development (from ₹7,999), mobile app development (from ₹14,999), SEO services (from ₹6,000/month), and more. Affordable, value-driven pricing with clear tiers. No hidden costs.';
            $metaKeywords = 'web development pricing, mobile app pricing, SEO pricing, affordable web development, pricing plans, web development cost, mobile app cost, SEO services cost, web development price in india, mobile app development price';
        @endphp
        @include('components.meta-tags')
        @include('components.google-analytics')

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://api.fontshare.com/v2/css?f[]=clash-display@500,600,700&display=swap" rel="stylesheet">

        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Styles -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <style>
            .text-clip {
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 50%, #7E30E1 100%);
                background-size: 200% 200%;
                background-position: 0% 50%;
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .service-pill {
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                padding: 0.45rem 1.1rem;
                border-radius: 999px;
                background: rgba(37, 99, 235, 0.1);
                color: var(--text-primary);
                font-size: 0.65rem;
                letter-spacing: 0.28em;
                text-transform: uppercase;
                font-weight: 600;
            }

            .pricing-tab {
                padding: 0.75rem 1.5rem;
                border-radius: 0.75rem;
                font-weight: 600;
                transition: all 0.3s ease;
                cursor: pointer;
                border: 2px solid transparent;
            }

            .pricing-tab.active {
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                color: white;
                border-color: var(--brand-primary);
            }

            .pricing-tab:not(.active) {
                background: var(--surface);
                color: var(--text-secondary);
                border-color: var(--border-default);
            }

            .pricing-tab:not(.active):hover {
                border-color: var(--brand-primary);
                color: var(--brand-primary);
            }

            .pricing-card {
                background: var(--surface);
                border: 2px solid var(--border-default);
                border-radius: 1.5rem;
                padding: 2rem;
                transition: all 0.3s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .pricing-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 60px rgba(37, 99, 235, 0.15);
                border-color: var(--brand-primary);
            }

            .pricing-card.recommended {
                border-color: var(--brand-primary);
                box-shadow: 0 20px 60px rgba(37, 99, 235, 0.2);
                position: relative;
            }

            .pricing-card.recommended::before {
                content: 'Most Popular';
                position: absolute;
                top: -12px;
                left: 50%;
                transform: translateX(-50%);
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                color: white;
                padding: 0.4rem 1.2rem;
                border-radius: 999px;
                font-size: 0.7rem;
                font-weight: 600;
                letter-spacing: 0.1em;
            }

            .price-amount {
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--text-primary);
                line-height: 1;
            }

            .price-period {
                font-size: 0.9rem;
                color: var(--text-secondary);
                margin-top: 0.5rem;
            }
        </style>
    </head>
<body class="bg-app-background text-text-primary font-sans antialiased">
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 min-h-[500px] md:min-h-[600px] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/pricing-banner.jpg') }}" 
                alt="Techbuds Pricing - Transparent & Affordable" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <!-- Content -->
        <div class="relative max-w-7xl mx-auto text-center w-full z-10">
            <div data-animate="fade-up">
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">Transparent Pricing</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                Affordable, <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">Value-Driven</span> Pricing
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl mx-auto leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                Clear pricing tiers for every business size. No hidden costs. Professional quality at competitive rates.
            </p>
        </div>
    </section>

    <!-- Pricing Tabs & Content -->
    <section class="py-12 px-4 sm:px-6 lg:px-8 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <!-- Service Tabs -->
            <div x-data="{ active: '{{ $defaultService }}' }" class="space-y-12">
                <div class="flex flex-wrap justify-center gap-3 mb-12" data-animate="fade-up">
                    @php
                        $serviceNames = [
                            'web-development' => 'Web Development',
                            'mobile-app-development' => 'Mobile Apps',
                            'seo-digital-marketing' => 'SEO Services',
                            'brand-experience-content-marketing' => 'Brand & Content',
                            'api-development-system-integration' => 'API & Integration',
                            'web-hosting-app-deployment-support' => 'Hosting & Support',
                            'custom-it-solutions' => 'Custom IT',
                            'database-data-warehousing' => 'Database & Data',
                        ];
                    @endphp
                    @foreach($services as $serviceSlug)
                    <button 
                        @click="active = '{{ $serviceSlug }}'"
                        :class="active === '{{ $serviceSlug }}' ? 'pricing-tab active' : 'pricing-tab'"
                        class="pricing-tab {{ $serviceSlug === $defaultService ? 'active' : '' }}"
                        data-service="{{ $serviceSlug }}">
                        {{ $serviceNames[$serviceSlug] ?? ucwords(str_replace('-', ' ', $serviceSlug)) }}
                    </button>
                    @endforeach
                </div>

                @foreach($pricingData as $serviceSlug => $service)
                <div 
                    x-show="active === '{{ $serviceSlug }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="grid grid-cols-1 md:grid-cols-3 gap-6"
                    data-animate="fade-up">
                    @foreach($service['tiers'] as $tierKey => $tier)
                    <div class="pricing-card {{ $tier['is_recommended'] ? 'recommended' : '' }}">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-heading mb-2">{{ $tier['name'] }}</h3>
                            <p class="text-sm text-text-secondary mb-4">{{ $tier['description'] }}</p>
                            <div class="flex items-baseline gap-2">
                                <span class="price-amount">{{ $tier['price'] }}</span>
                                @if(isset($service['is_monthly']) && $service['is_monthly'])
                                <span class="price-period">/ month</span>
                                @endif
                            </div>
                        </div>
                        
                        <ul class="flex-1 space-y-3 mb-6">
                            @foreach($tier['features'] as $feature)
                            <li class="flex items-start gap-2 text-sm text-text-secondary">
                                <svg class="w-5 h-5 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ $feature }}
                            </li>
                            @endforeach
                            @if(isset($tier['limitations']))
                                @foreach($tier['limitations'] as $limitation)
                                <li class="flex items-start gap-2 text-sm text-text-muted italic">
                                    <svg class="w-5 h-5 text-text-muted flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    {{ $limitation }}
                                </li>
                                @endforeach
                            @endif
                        </ul>

                        <a href="{{ route('contact') }}" class="block w-full text-center py-3 px-6 rounded-lg font-semibold transition-all {{ $tier['is_recommended'] ? 'bg-brand-primary text-white hover:bg-brand-hover' : 'bg-surface-2 text-heading hover:bg-surface-1 border border-border-default' }}">
                            Get Started
                        </a>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            </div>

            <!-- Disclaimer -->
            <div class="mt-16 text-center" data-animate="fade-up">
                <p class="text-sm text-text-secondary italic">
                    * All prices are indicative. Final pricing depends on project scope, requirements, and timeline.
                </p>
            </div>

            <!-- FAQ Section -->
            <div class="mt-20 pt-12 border-t border-border-default" data-animate="fade-up">
                <div class="text-center mb-12">
                    <span class="service-pill">FAQs</span>
                    <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                        Pricing <span class="text-clip">Questions</span>
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                    @php
                        $pricingFaqs = [
                            [
                                'q' => 'Are these prices final?',
                                'a' => 'Prices are indicative. Final pricing depends on your specific project requirements, scope, and timeline. Contact us for a detailed quote.',
                            ],
                            [
                                'q' => 'What payment methods do you accept?',
                                'a' => 'We accept bank transfers, UPI, and other standard payment methods. Payment terms are discussed during project planning.',
                            ],
                            [
                                'q' => 'Do you offer payment plans?',
                                'a' => 'Yes. We offer flexible payment plans for larger projects. Typically, we work with milestone-based payments.',
                            ],
                            [
                                'q' => 'Can I upgrade or downgrade my plan later?',
                                'a' => 'Yes. You can upgrade or modify your plan based on changing requirements. We\'ll adjust pricing accordingly.',
                            ],
                        ];
                    @endphp
                    @foreach($pricingFaqs as $index => $faq)
                    <div class="p-6 rounded-xl bg-surface-1 border-2 border-border-default hover:border-brand-primary/40 transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5" data-animate="fade-up" data-delay="{{ $index * 0.1 }}">
                        <h3 class="text-lg font-semibold text-heading mb-3">{{ $faq['q'] }}</h3>
                        <p class="text-sm text-text-secondary leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Internal Links Section -->
            <div class="mt-20 pt-12 border-t border-border-default" data-animate="fade-up">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-heading font-semibold text-heading mb-3">
                        Explore Our <span class="text-clip">Services</span>
                    </h2>
                    <p class="text-text-secondary max-w-2xl mx-auto">
                        Learn more about what's included in each service and how we deliver results.
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @php
                        $serviceLinks = [
                            'web-development' => 'Web Development',
                            'mobile-app-development' => 'Mobile Apps',
                            'seo-digital-marketing' => 'SEO Services',
                            'web-hosting-app-deployment-support' => 'Hosting & Support',
                        ];
                    @endphp
                    @foreach($serviceLinks as $slug => $name)
                    <a href="{{ route('services.show', $slug) }}" class="block p-4 rounded-lg bg-surface-2 border border-border-default hover:border-brand-primary hover:shadow-lg transition-all text-center">
                        <span class="text-sm font-semibold text-heading">{{ $name }}</span>
                    </a>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="{{ route('services') }}" class="inline-flex items-center gap-2 text-brand-primary hover:text-brand-hover font-semibold">
                        View All Services
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 12h15"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-semibold leading-tight mb-6" data-animate="fade-up">
                Need a Custom Quote?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                For enterprise projects or custom requirements, get in touch for a personalized quote.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="{{ route('contact') }}" class="bg-white text-brand-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
    <script>
        window.addEventListener('load', () => {
            if (!window.gsap || !window.ScrollTrigger) return;
            gsap.registerPlugin(ScrollTrigger);

            const animationMap = {
                'fade-up': { y: 40 },
            };

            Object.entries(animationMap).forEach(([key, config]) => {
                gsap.utils.toArray(`[data-animate="${key}"]`).forEach((el) => {
                    const delay = parseFloat(el.dataset.delay || '0');
                    gsap.from(el, {
                        duration: 1.1,
                        opacity: 0,
                        ease: 'power3.out',
                        delay,
                        ...config,
                        scrollTrigger: {
                            trigger: el,
                            start: 'top 85%',
                            once: true
                        }
                    });
                });
            });
        });
    </script>

    <!-- Schema Markup -->
    @php
        $pricingPageSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            '@id' => url('/pricing') . '#webpage',
            'name' => 'Pricing - Affordable Web Development, Mobile Apps & SEO Services | Techbuds',
            'description' => 'Transparent pricing for web development, mobile app development, SEO services, and more. Affordable, value-driven pricing with clear tiers. Get started from ₹7,999.',
            'url' => url('/pricing'),
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => 'Techbuds',
                'url' => url('/'),
            ],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Home',
                        'item' => url('/'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Pricing',
                        'item' => url('/pricing'),
                    ],
                ],
            ],
        ];
        
        // Add Service schemas for each pricing option
        $serviceSchemas = [];
        foreach ($pricingData as $serviceSlug => $service) {
            $serviceConfig = config("service_pages.{$serviceSlug}", []);
            $offers = [];
            foreach ($service['tiers'] as $tier) {
                $priceValue = preg_replace('/[^0-9]/', '', $tier['price']);
                $offers[] = [
                    '@type' => 'Offer',
                    'name' => $tier['name'],
                    'price' => (int) $priceValue,
                    'priceCurrency' => 'INR',
                    'availability' => 'https://schema.org/InStock',
                ];
            }
            
            $serviceSchemas[] = [
                '@type' => 'Service',
                'name' => $service['name'],
                'description' => $serviceConfig['description'] ?? $service['name'],
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'Techbuds',
                    'url' => url('/'),
                ],
                'offers' => $offers,
            ];
        }
    @endphp
    <script type="application/ld+json">
    {!! json_encode($pricingPageSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
    </script>
    @foreach($serviceSchemas as $serviceSchema)
    <script type="application/ld+json">
    {!! json_encode($serviceSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
    </script>
    @endforeach
    @php
        $pricingFaqs = [
            [
                'q' => 'Are these prices final?',
                'a' => 'Prices are indicative. Final pricing depends on your specific project requirements, scope, and timeline. Contact us for a detailed quote.',
            ],
            [
                'q' => 'What payment methods do you accept?',
                'a' => 'We accept bank transfers, UPI, and other standard payment methods. Payment terms are discussed during project planning.',
            ],
            [
                'q' => 'Do you offer payment plans?',
                'a' => 'Yes. We offer flexible payment plans for larger projects. Typically, we work with milestone-based payments.',
            ],
            [
                'q' => 'Can I upgrade or downgrade my plan later?',
                'a' => 'Yes. You can upgrade or modify your plan based on changing requirements. We\'ll adjust pricing accordingly.',
            ],
        ];
    @endphp
    @include('components.schema.faq', ['faqs' => $pricingFaqs])
    @include('components.schema.breadcrumb', [
        'items' => [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Pricing', 'url' => url('/pricing')],
        ]
    ])
</body>
</html>

