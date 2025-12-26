<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'SEO Services in India | Technical SEO, Local SEO & Content Strategy – Techbuds';
            $metaDescription = 'Professional SEO services to improve rankings, grow organic traffic, and build authority. Technical SEO, on-page optimization, local SEO, content strategy, and performance tracking.';
            $metaKeywords = 'SEO services, technical SEO services, local SEO services, search engine optimization, on-page SEO, SEO company India, SEO audit, content strategy';
        @endphp
        @include('components.meta-tags')

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

    <!-- Hero -->
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 min-h-[500px] md:min-h-[600px] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/seo.jpg') }}" 
                alt="SEO Services - Techbuds" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto w-full z-10">
            <div data-animate="fade-up">
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">SEO Services</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                Technical, Content & <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">Local SEO</span> That Drive Sustainable Growth
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                Search visibility is not accidental — it is engineered. At <strong class="text-white">Techbuds</strong>,
                we provide <strong class="text-white">professional SEO services</strong> focused on technical excellence, content relevance, and long-term rankings that translate into real business growth.
            </p>
            <p class="mt-4 text-base md:text-lg text-white/85 max-w-3xl leading-relaxed drop-shadow-sm" data-animate="fade-up" data-delay="0.3">
                We don't chase shortcuts or temporary spikes. We build <strong class="text-white">search-engine-compliant SEO systems</strong> that scale.
            </p>
        </div>
    </section>

    <!-- Why SEO Is Critical -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why <span class="text-clip">SEO Is Critical</span> for Business Growth
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-heading mb-4">When your website ranks well, you gain:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">High-intent organic traffic</div>
                        <div class="feature-item">Consistent lead generation</div>
                        <div class="feature-item">Lower acquisition costs</div>
                        <div class="feature-item">Long-term brand authority</div>
                    </div>
                </div>
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-heading mb-4">Poor SEO leads to:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Slow pages and poor performance</div>
                        <div class="feature-item">Low search visibility</div>
                        <div class="feature-item">Missed opportunities</div>
                        <div class="feature-item">Competitors ranking ahead</div>
                    </div>
                    <p class="mt-4 text-sm text-heading/70 leading-relaxed">
                        Our SEO services are designed to <strong>eliminate these issues at the root level</strong>.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our SEO Services -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">SEO Services</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/75 max-w-3xl mx-auto">
                    Technical excellence, content relevance, and long-term rankings — not quick fixes.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-heading mb-4">Technical SEO</h3>
                    <p class="text-sm text-heading/70 mb-4">The foundation of all successful SEO strategies.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Full website SEO audit</div>
                        <div class="feature-item">Crawlability & indexing fixes</div>
                        <div class="feature-item">Core Web Vitals optimization</div>
                        <div class="feature-item">Page speed & performance improvements</div>
                        <div class="feature-item">Schema markup & structured data</div>
                        <div class="feature-item">Secure, SEO-friendly architecture</div>
                    </div>
                    <p class="mt-4 text-sm text-heading/70 leading-relaxed">
                        We specialize in <strong>technical SEO for modern stacks</strong>, including Laravel-based websites.
                    </p>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.05">
                    <h3 class="text-xl font-semibold text-heading mb-4">On-Page SEO Optimization</h3>
                    <p class="text-sm text-heading/70 mb-4">Aligning content with search intent.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Keyword research & mapping</div>
                        <div class="feature-item">Meta titles & descriptions</div>
                        <div class="feature-item">Heading structure (H1–H6)</div>
                        <div class="feature-item">Internal linking strategy</div>
                        <div class="feature-item">Image & asset optimization</div>
                        <div class="feature-item">SEO-friendly URL structures</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-heading mb-4">Content & Keyword Strategy</h3>
                    <p class="text-sm text-heading/70 mb-4">SEO without content does not scale.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Search intent analysis</div>
                        <div class="feature-item">Content gap & competitor research</div>
                        <div class="feature-item">Blog & landing page strategy</div>
                        <div class="feature-item">Content clustering & topical authority</div>
                        <div class="feature-item">SEO copy guidance & optimization</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.15">
                    <h3 class="text-xl font-semibold text-heading mb-4">Local SEO Services</h3>
                    <p class="text-sm text-heading/70 mb-4">Get discovered by customers near you.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Google Business Profile optimization</div>
                        <div class="feature-item">Local keyword targeting</div>
                        <div class="feature-item">NAP consistency</div>
                        <div class="feature-item">Local citations</div>
                        <div class="feature-item">Map pack ranking strategy</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-xl font-semibold text-heading mb-4">Performance & UX SEO</h3>
                    <p class="text-sm text-heading/70 mb-4">SEO that improves both rankings and conversions.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Mobile-first optimization</div>
                        <div class="feature-item">UX & engagement improvements</div>
                        <div class="feature-item">Bounce rate reduction</div>
                        <div class="feature-item">Conversion-focused structure</div>
                        <div class="feature-item">Accessibility best practices</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.25">
                    <h3 class="text-xl font-semibold text-heading mb-4">SEO Tracking & Reporting</h3>
                    <p class="text-sm text-heading/70 mb-4">Clear metrics, no guesswork.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Google Search Console setup</div>
                        <div class="feature-item">Google Analytics integration</div>
                        <div class="feature-item">Keyword performance tracking</div>
                        <div class="feature-item">Traffic & conversion analysis</div>
                        <div class="feature-item">Actionable monthly insights</div>
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
                    Why Choose <span class="text-clip">Techbuds</span> for SEO?
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 leading-relaxed">
                    We focus on <strong>rankings that last</strong>, not temporary boosts.
                </p>
            </div>
            <div class="space-y-3" data-animate="fade-up" data-delay="0.1">
                <div class="feature-item">Technical SEO expertise</div>
                <div class="feature-item">Clean, Google-compliant practices</div>
                <div class="feature-item">Performance-driven approach</div>
                <div class="feature-item">Transparent communication</div>
                <div class="feature-item">Long-term ranking strategies</div>
                <div class="feature-item">SEO aligned with business goals</div>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">SEO Process</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-8">
                    <div class="process-step" data-animate="fade-up">
                        <span class="process-number">1</span>
                        <h3 class="text-xl font-semibold text-heading mb-2">Audit & Research</h3>
                        <p class="text-heading/75 text-sm md:text-base">
                            We analyze your website, competitors, and market opportunities to understand your current baseline.
                        </p>
                    </div>
                    <div class="process-step" data-animate="fade-up" data-delay="0.05">
                        <span class="process-number">2</span>
                        <h3 class="text-xl font-semibold text-heading mb-2">Strategy & Planning</h3>
                        <p class="text-heading/75 text-sm md:text-base">
                            Keyword mapping, technical roadmap, and content strategy aligned with your business goals.
                        </p>
                    </div>
                </div>
                <div class="space-y-8">
                    <div class="process-step" data-animate="fade-up" data-delay="0.1">
                        <span class="process-number">3</span>
                        <h3 class="text-xl font-semibold text-heading mb-2">Implementation & Optimization</h3>
                        <p class="text-heading/75 text-sm md:text-base">
                            Technical fixes, content optimization, and performance improvements with constant iteration.
                        </p>
                    </div>
                    <div class="process-step" data-animate="fade-up" data-delay="0.15">
                        <span class="process-number">4</span>
                        <h3 class="text-xl font-semibold text-heading mb-2">Monitoring & Scaling</h3>
                        <p class="text-heading/75 text-sm md:text-base">
                            Tracking results, refining strategy, and scaling growth across new pages and opportunities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who This Service Is For -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Who This <span class="text-clip">Service Is For</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="service-card text-center" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-heading mb-2">Startups & SaaS products</h3>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Local businesses</h3>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Service-based companies</h3>
            </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">Growing digital platforms</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Frequently Asked Questions
                </h2>
            </div>
            <div data-animate="fade-up" data-delay="0.05">
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-heading mb-2">How long does SEO take to show results?</h3>
                    <p class="text-heading/80 text-sm md:text-base">
                        Most SEO campaigns show measurable improvements within <strong>3–6 months</strong>, depending on competition and website condition.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you provide local SEO?</h3>
                    <p class="text-heading/80 text-sm md:text-base">
                        Yes. We specialize in <strong>local SEO and Google Maps optimization</strong>.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-heading mb-2">Is SEO suitable for small businesses?</h3>
                    <p class="text-heading/80 text-sm md:text-base">
                        Absolutely. SEO is one of the most <strong>cost-effective long-term growth channels</strong> for startups and growing businesses.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you work with existing websites?</h3>
                    <p class="text-heading/80 text-sm md:text-base">
                        Yes. We handle audits, fixes, and optimization for existing sites.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[var(--heading)]">
        <div class="max-w-4xl mx-auto text-center text-heading" data-animate="fade-up">
            <span class="service-pill bg-surface-1/10 text-xs tracking-[0.25em] text-heading">
                Ready to improve your search visibility?
            </span>
            <h2 class="mt-6 text-3xl md:text-4xl font-bold leading-tight">
                Ready to Improve Your Search Visibility?
            </h2>
            <p class="mt-4 text-base md:text-lg text-heading/80 max-w-2xl mx-auto">
                Let's build a strong SEO foundation that drives traffic, leads, and long-term growth.
            </p>
            <div class="mt-8">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-app-background text-heading font-semibold text-sm hover:bg-surface-1 transition-colors">
                    Get a free SEO consultation
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h15"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    @include('components.service-blogs', [
        'serviceKey' => 'seo-digital-marketing',
        'service' => config('service_pages.seo-digital-marketing'),
    ])

    @include('components.footer')
    @include('components.service-schema', ['serviceKey' => 'seo-digital-marketing'])
</body>
</html>
