<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $serviceName = $serviceConfig['name'] ?? $servicePricing['name'];
            $starterPrice = $servicePricing['tiers']['starter']['price'] ?? 'Contact us';
            $metaTitle = $servicePricing['name'] . ' - Transparent Pricing | Techbuds';
            $metaDescription = 'Get transparent pricing for ' . strtolower($serviceName) . '. Starting from ' . $starterPrice . '. Affordable tiers from Starter to Enterprise. Clear pricing, no hidden costs. Professional quality at competitive rates.';
            $metaKeywords = strtolower($serviceName) . ' pricing, ' . str_replace(' ', ' cost, ', strtolower($serviceName)) . ' rates, ' . strtolower($serviceName) . ' price in india';
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
    <section class="relative overflow-hidden pt-32 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <div data-animate="fade-up">
                <span class="service-pill">{{ $servicePricing['name'] }}</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-heading leading-tight" data-animate="fade-up" data-delay="0.1">
                Transparent <span class="text-clip">Pricing</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-text-secondary max-w-3xl mx-auto leading-relaxed" data-animate="fade-up" data-delay="0.2">
                Choose the plan that fits your needs. All prices are transparent with no hidden costs.
            </p>
        </div>
    </section>

    <!-- Pricing Cards -->
    <section class="py-12 px-4 sm:px-6 lg:px-8 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-animate="fade-up">
                @foreach($servicePricing['tiers'] as $tierKey => $tier)
                <div class="pricing-card {{ $tier['is_recommended'] ? 'recommended' : '' }}">
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-heading mb-2">{{ $tier['name'] }}</h3>
                        <p class="text-sm text-text-secondary mb-4">{{ $tier['description'] }}</p>
                        <div class="flex items-baseline gap-2">
                            <span class="price-amount">{{ $tier['price'] }}</span>
                            @if(isset($servicePricing['is_monthly']) && $servicePricing['is_monthly'])
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

            <!-- Internal Links Section -->
            <div class="mt-12 pt-12 border-t border-border-default" data-animate="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('services.show', $slug) }}" class="group block p-6 rounded-xl bg-surface-2 border border-border-default hover:border-brand-primary hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-brand-primary/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-heading mb-2 group-hover:text-brand-primary transition-colors">
                                    Learn About {{ $serviceName }}
                                </h3>
                                <p class="text-sm text-text-secondary mb-3">
                                    Discover what's included, our process, and how we deliver results.
                                </p>
                                <span class="inline-flex items-center gap-2 text-sm font-semibold text-brand-primary">
                                    View Service Details
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 12h15"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('pricing.index') }}" class="group block p-6 rounded-xl bg-surface-2 border border-border-default hover:border-brand-primary hover:shadow-lg transition-all">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-brand-primary/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-heading mb-2 group-hover:text-brand-primary transition-colors">
                                    View All Pricing
                                </h3>
                                <p class="text-sm text-text-secondary mb-3">
                                    Compare pricing across all our services and find the best fit.
                                </p>
                                <span class="inline-flex items-center gap-2 text-sm font-semibold text-brand-primary">
                                    See All Prices
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 12h15"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Disclaimer -->
            <div class="mt-16 text-center" data-animate="fade-up">
                <p class="text-sm text-text-secondary italic">
                    * All prices are indicative. Final pricing depends on project scope, requirements, and timeline.
                </p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">FAQs</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Pricing <span class="text-clip">Questions</span>
                </h2>
            </div>

            <div class="space-y-4">
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
                        [
                            'q' => 'What if I need features not listed in a tier?',
                            'a' => 'We can customize any tier to include additional features. Contact us to discuss your specific needs and get a custom quote.',
                        ],
                    ];
                @endphp
                @foreach($pricingFaqs as $index => $faq)
                <div class="p-6 rounded-xl bg-surface border border-border-default" data-animate="fade-up" data-delay="{{ $index * 0.1 }}">
                    <h3 class="text-lg font-semibold text-heading mb-2">{{ $faq['q'] }}</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">{{ $faq['a'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-semibold leading-tight mb-6" data-animate="fade-up">
                Ready to Get Started?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Contact us for a custom quote or to discuss your project requirements.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="{{ route('contact') }}" class="bg-white text-brand-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Contact Us
                </a>
                <a href="{{ route('pricing.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white/10 transition-all transform hover:scale-105">
                    View All Pricing
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
    @include('components.schema.pricing', [
        'pricingData' => $servicePricing,
        'serviceSlug' => $slug,
        'serviceConfig' => $serviceConfig
    ])
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
            [
                'q' => 'What if I need features not listed in a tier?',
                'a' => 'We can customize any tier to include additional features. Contact us to discuss your specific needs and get a custom quote.',
            ],
        ];
    @endphp
    @include('components.schema.faq', ['faqs' => $pricingFaqs])
    @include('components.schema.breadcrumb', [
        'items' => [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Pricing', 'url' => route('pricing.index')],
            ['name' => $servicePricing['name'], 'url' => url()->current()],
        ]
    ])
</body>
</html>

