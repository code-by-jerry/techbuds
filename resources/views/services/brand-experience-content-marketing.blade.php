<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Brand Experience & Content Marketing Services | Branding, UI/UX & Content – Techbuds';
            $metaDescription = 'Design-led branding, UI/UX, and content marketing that build trust and drive growth. Brand positioning, visual identity, content strategy, and conversion-focused experiences — no paid ads.';
            $metaKeywords = 'brand experience services, content marketing services, branding services, UI UX design services, brand identity, content strategy, visual identity, brand positioning';
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

            .service-card {
                position: relative;
                border-radius: 1.5rem;
                overflow: hidden;
                background: var(--surface);
                border: 1px solid var(--border-default);
                box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
                transition: transform .45s ease, box-shadow .45s ease;
                padding: 2rem;
            }

            .service-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 24px 70px rgba(37, 99, 235, 0.15);
            }

            .feature-item {
                position: relative;
                padding-left: 1.4rem;
                font-size: 0.9rem;
                color: var(--text-secondary);
                margin-bottom: 0.75rem;
            }

            .feature-item::before {
                content: '';
                position: absolute;
                left: 0;
                top: 0.4rem;
                width: 0.5rem;
                height: 0.5rem;
                border-radius: 0.3rem;
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                box-shadow: 0 6px 12px rgba(37, 99, 235, 0.25);
            }

            .process-step {
                position: relative;
                padding-left: 3rem;
                padding-bottom: 2.5rem;
            }

            .process-step::before {
                content: '';
                position: absolute;
                left: 0.75rem;
                top: 0;
                bottom: 0;
                width: 2px;
                background: linear-gradient(180deg, var(--brand-primary) 0%, rgba(37, 99, 235, 0.2) 100%);
            }

            .process-step:last-child::before {
                display: none;
            }

            .process-number {
                position: absolute;
                left: 0;
                top: 0;
                width: 1.5rem;
                height: 1.5rem;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 0.75rem;
                box-shadow: 0 6px 12px rgba(37, 99, 235, 0.25);
            }

            .faq-item {
                background: var(--surface);
                border-radius: 1rem;
                padding: 1.5rem;
                border: 1px solid var(--border-default);
                margin-bottom: 1rem;
            }

            @media (max-width: 768px) {
                .service-card {
                    padding: 1.5rem;
                }
                .process-step {
                    padding-left: 2.5rem;
                }
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
                src="{{ asset('images/banner images/UI UX.jpg') }}" 
                alt="Brand Experience & Content Marketing Services - Techbuds" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto w-full z-10">
            <div data-animate="fade-up">
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">Brand Experience & Content Marketing</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                Design-Led Branding, UI/UX & <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">Content That Build Trust</span> and Drive Growth
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                Modern growth is not driven by ads alone — it is driven by <strong class="text-white">clarity, consistency, and experience</strong>. At <strong class="text-white">Techbuds</strong>, our <strong class="text-white">Brand Experience & Content Marketing</strong> service helps businesses communicate clearly, look credible, and convert users through strong design, branding, and content systems.
            </p>
            <p class="mt-4 text-base md:text-lg text-white/85 max-w-3xl leading-relaxed drop-shadow-sm" data-animate="fade-up" data-delay="0.3">
                We focus on <strong class="text-white">organic, experience-led growth</strong> — not paid advertising.
            </p>
        </div>
    </section>

    <!-- What Is Brand Experience & Content Marketing -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    What Is <span class="text-clip">Brand Experience & Content Marketing</span>?
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-heading mb-4">Brand experience is how users:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Perceive your business</div>
                        <div class="feature-item">Interact with your brand</div>
                        <div class="feature-item">Build trust and loyalty</div>
                        <div class="feature-item">Remember your brand</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-heading mb-4">Content marketing ensures your message is:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Clear and consistent</div>
                        <div class="feature-item">Valuable to your audience</div>
                        <div class="feature-item">Conversion-focused</div>
                        <div class="feature-item">Aligned with your brand</div>
                    </div>
                    <p class="mt-4 text-sm text-heading/70 leading-relaxed">
                        Together, they help businesses <strong>build credibility, improve engagement, increase conversions, and strengthen long-term brand value</strong>.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clear Scope - No Paid Ads -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-4xl mx-auto">
            <div class="service-card bg-brand-primary/10 border-brand-primary/30" data-animate="fade-up">
                <div class="text-center">
                    <h3 class="text-2xl font-semibold text-heading mb-4">Clear Scope – No Paid Ads</h3>
                    <p class="text-base md:text-lg text-heading/80 leading-relaxed mb-4">
                        We focus on <strong>brand, experience, and content-led growth</strong>.
                    </p>
                    <p class="text-lg font-semibold text-heading">
                        <strong>We do not run paid advertising campaigns.</strong>
                    </p>
                    <p class="mt-4 text-sm text-heading/70 leading-relaxed">
                        This ensures clarity, transparency, and trust.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Brand Experience & Content Services -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Brand Experience & Content</span> Services
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    From brand identity to content strategy — we build experiences that users trust and remember.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-heading mb-4">UI/UX Design & Experience Optimization</h3>
                    <p class="text-sm text-heading/70 mb-4">Design that guides users and improves conversion.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Website & application UI/UX design</div>
                        <div class="feature-item">User journey & flow optimization</div>
                        <div class="feature-item">Conversion-focused layouts</div>
                        <div class="feature-item">Mobile-first & responsive design</div>
                        <div class="feature-item">Usability & experience audits</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.05">
                    <h3 class="text-xl font-semibold text-heading mb-4">Branding & Visual Identity</h3>
                    <p class="text-sm text-heading/70 mb-4">Build a brand users recognize and trust.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Brand positioning & messaging</div>
                        <div class="feature-item">Logo design & refinement</div>
                        <div class="feature-item">Color systems & typography</div>
                        <div class="feature-item">Brand guidelines & consistency</div>
                        <div class="feature-item">Visual identity for web & digital platforms</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-heading mb-4">Content Marketing & Strategy</h3>
                    <p class="text-sm text-heading/70 mb-4">Content that supports SEO, branding, and conversion.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Website & landing page content structure</div>
                        <div class="feature-item">Brand tone & messaging alignment</div>
                        <div class="feature-item">SEO-aligned content planning</div>
                        <div class="feature-item">Blog & content strategy guidance</div>
                        <div class="feature-item">Content optimization for clarity and impact</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.15">
                    <h3 class="text-xl font-semibold text-heading mb-4">Conversion-Focused Content & UX</h3>
                    <p class="text-sm text-heading/70 mb-4">Turn visitors into leads.</p>
                    <div class="space-y-2">
                        <div class="feature-item">CTA optimization</div>
                        <div class="feature-item">Page flow & structure improvements</div>
                        <div class="feature-item">Messaging clarity & hierarchy</div>
                        <div class="feature-item">UX + content alignment for conversions</div>
                    </div>
                </div>

                <div class="service-card md:col-span-2" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-xl font-semibold text-heading mb-4">Analytics & Experience Insights</h3>
                    <p class="text-sm text-heading/70 mb-4">Understand what users do — and why.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <div class="feature-item">Google Analytics & Search Console setup</div>
                            <div class="feature-item">User behavior insights</div>
                        </div>
                    <div class="space-y-2">
                            <div class="feature-item">Content & experience performance review</div>
                            <div class="feature-item">Actionable improvement recommendations</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Process -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Process</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-8">
                    <div class="process-step" data-animate="fade-up">
                        <span class="process-number">1</span>
                        <h3 class="text-xl font-semibold text-heading mb-2">Discovery & Brand Understanding</h3>
                        <p class="text-heading/75 text-sm md:text-base">
                            We understand your business, audience, and goals to create a foundation for your brand experience.
                        </p>
                    </div>
                    <div class="process-step" data-animate="fade-up" data-delay="0.05">
                        <span class="process-number">2</span>
                        <h3 class="text-xl font-semibold text-heading mb-2">Strategy & Experience Planning</h3>
                        <p class="text-heading/75 text-sm md:text-base">
                            Define brand direction, content structure, and UX flow aligned with your business objectives.
                        </p>
                    </div>
                </div>
                <div class="space-y-8">
                    <div class="process-step" data-animate="fade-up" data-delay="0.1">
                        <span class="process-number">3</span>
                        <h3 class="text-xl font-semibold text-heading mb-2">Design & Content Execution</h3>
                        <p class="text-heading/75 text-sm md:text-base">
                            UI/UX design, branding assets, and content optimization that bring your brand to life.
                        </p>
                    </div>
                    <div class="process-step" data-animate="fade-up" data-delay="0.15">
                        <span class="process-number">4</span>
                        <h3 class="text-xl font-semibold text-heading mb-2">Review & Optimization</h3>
                        <p class="text-heading/75 text-sm md:text-base">
                            Refinement based on performance, usability, and clarity to continuously improve your brand experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Techbuds -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            <div data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why Choose <span class="text-clip">Techbuds</span>?
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 leading-relaxed">
                    We don't push traffic — <strong>we improve how your brand works</strong>.
                </p>
            </div>
            <div class="space-y-3" data-animate="fade-up" data-delay="0.1">
                <div class="feature-item">Design-led, experience-first approach</div>
                <div class="feature-item">Honest scope — no ads, no hype</div>
                <div class="feature-item">Strong alignment with SEO & development</div>
                <div class="feature-item">Clear communication & transparency</div>
                <div class="feature-item">Long-term brand thinking</div>
            </div>
        </div>
    </section>

    <!-- Who This Service Is For -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Who This <span class="text-clip">Service Is For</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="service-card text-center" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-heading mb-2">Startups & growing businesses</h3>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">SaaS & digital products</h3>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Service-based companies</h3>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">Founders refining brand positioning</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Frequently Asked Questions
                </h2>
            </div>
            <div data-animate="fade-up" data-delay="0.05">
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you run paid ads?</h3>
                    <p class="text-heading/80 text-sm md:text-base">
                        No. We focus on <strong>organic, content-led and experience-driven growth</strong>. We do not run paid advertising campaigns.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-heading mb-2">Is this different from SEO?</h3>
                    <p class="text-heading/80 text-sm md:text-base">
                        Yes. SEO focuses on rankings. This service focuses on <strong>brand clarity, UX, and content quality</strong>, which supports SEO and conversions.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-heading mb-2">Can this work without ads?</h3>
                    <p class="text-heading/80 text-sm md:text-base">
                        Absolutely. Strong brand experience and content improve <strong>trust, engagement, and organic growth</strong> without paid advertising.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you work with existing brands?</h3>
                    <p class="text-heading/80 text-sm md:text-base">
                        Yes. We handle audits, redesigns, and content optimization for existing businesses.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[var(--heading)]">
        <div class="max-w-4xl mx-auto text-center text-heading" data-animate="fade-up">
            <span class="service-pill bg-surface-1/10 text-xs tracking-[0.25em] text-heading">
                Ready to strengthen your brand experience?
            </span>
            <h2 class="mt-6 text-3xl md:text-4xl font-bold leading-tight">
                Ready to Strengthen Your Brand Experience?
            </h2>
            <p class="mt-4 text-base md:text-lg text-heading/80 max-w-2xl mx-auto">
                Let's build a brand, experience, and content system that users trust and remember.
            </p>
            <div class="mt-8">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-app-background text-heading font-semibold text-sm hover:bg-surface-1 transition-colors">
                    Get a free brand experience consultation
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h15"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    @include('components.service-blogs', [
        'serviceKey' => 'brand-experience-content-marketing',
        'service' => config('service_pages.brand-experience-content-marketing'),
    ])

    @include('components.footer')
    @include('components.service-schema', ['serviceKey' => 'brand-experience-content-marketing'])
</body>
</html>
