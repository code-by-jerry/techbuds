<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SEO & Digital Marketing Services in India | Rank Higher & Get Leads – Techbuds</title>
        <meta name="description" content="Professional SEO & digital marketing services to increase rankings, traffic, and conversions. Technical SEO, content, local SEO, social, PPC & CRO for growth-focused brands.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Styles -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            .text-clip {
                background: linear-gradient(135deg, #088395 0%, #37B7C3 50%, #7E30E1 100%);
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
                background: rgba(8,131,149,0.08);
                color: #11224E;
                font-size: 0.65rem;
                letter-spacing: 0.28em;
                text-transform: uppercase;
                font-weight: 600;
            }
            .service-card {
                position: relative;
                border-radius: 1.5rem;
                overflow: hidden;
                background: rgba(255,255,255,0.95);
                border: 1px solid rgba(8,131,149,0.1);
                box-shadow: 0 16px 45px rgba(8,131,149,0.12);
                transition: transform .45s ease, box-shadow .45s ease;
                padding: 2rem;
            }
            .service-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 24px 70px rgba(8,131,149,0.16);
            }
            .feature-item {
                position: relative;
                padding-left: 1.4rem;
                font-size: 0.9rem;
                color: rgba(8,131,149,0.78);
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
                background: linear-gradient(135deg, #11224E 0%, #088395 100%);
                box-shadow: 0 6px 12px rgba(8,131,149,0.25);
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
                background: linear-gradient(180deg, #088395 0%, rgba(8,131,149,0.2) 100%);
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
                background: linear-gradient(135deg, #11224E 0%, #088395 100%);
                color: #FFFDF6;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 0.75rem;
                box-shadow: 0 6px 12px rgba(8,131,149,0.25);
            }
            .faq-item {
                background: rgba(255,255,255,0.9);
                border-radius: 1rem;
                padding: 1.5rem;
                border: 1px solid rgba(8,131,149,0.1);
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
<body class="bg-[#FFFDF6] text-gray-900 antialiased">
    @include('components.navbar')

    <!-- Hero -->
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-7xl mx-auto">
            <div data-animate="fade-up">
                <span class="service-pill">SEO & Digital Marketing</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-bold text-[#11224E] leading-tight" data-animate="fade-up" data-delay="0.1">
                SEO & <span class="text-clip">Digital Marketing</span> That Drives Traffic, Leads & Long-Term Growth
            </h1>
            <p class="mt-6 text-lg md:text-xl text-[#11224E]/80 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.2">
                Your customers are searching for your services right now. If you’re not ranking, you’re losing revenue. At <strong>Techbuds</strong>,
                we provide data-driven SEO & digital marketing services designed to increase visibility, attract high-intent users, and convert traffic
                into measurable business results.
            </p>
            <p class="mt-4 text-base md:text-lg text-[#11224E]/70 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.3">
                From startups to growing businesses, we build long-term SEO and digital marketing systems – technical SEO, content, local SEO, social,
                paid campaigns, and conversion optimization – all aligned with your growth goals.
            </p>
        </div>
    </section>

    <!-- Our SEO & Digital Marketing Services -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Our <span class="text-clip">SEO & Digital Marketing</span> Services
                </h2>
                <p class="mt-4 text-base md:text-lg text-[#11224E]/75 max-w-3xl mx-auto">
                    One integrated system across SEO, content, social, and paid – not scattered tactics.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">Technical SEO</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Full site & crawl audits</div>
                        <div class="feature-item">Core Web Vitals & performance optimization</div>
                        <div class="feature-item">Indexing & crawl budget optimization</div>
                        <div class="feature-item">Schema markup & structured data</div>
                        <div class="feature-item">Laravel & custom-stack SEO implementation</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.05">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">On-Page SEO</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Keyword mapping to pages & clusters</div>
                        <div class="feature-item">Meta titles, descriptions & headings</div>
                        <div class="feature-item">Content structure & internal linking</div>
                        <div class="feature-item">Page speed & UX improvements</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">Content Strategy & SEO Blogging</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Search intent & topic research</div>
                        <div class="feature-item">Blog & landing page content strategy</div>
                        <div class="feature-item">Content clusters & topical authority</div>
                        <div class="feature-item">SEO copywriting guidance & briefs</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.15">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">Local SEO</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Google Business Profile optimization</div>
                        <div class="feature-item">Local citations & NAP consistency</div>
                        <div class="feature-item">Location-based keyword strategy</div>
                        <div class="feature-item">Map pack visibility & call-driven leads</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">Link Building & Authority</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Authority backlinks (contextual & relevant)</div>
                        <div class="feature-item">Guest posting & digital PR outreach</div>
                        <div class="feature-item">Brand mentions & unlinked brand fixes</div>
                        <div class="feature-item">Competitor backlink gap analysis</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.25">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">Digital Marketing & Paid Growth</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Search & display campaigns (Google Ads)</div>
                        <div class="feature-item">Social media ads & remarketing</div>
                        <div class="feature-item">Conversion tracking & analytics setup</div>
                        <div class="feature-item">Landing page CRO & funnel optimization</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Techbuds -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            <div data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Why Choose <span class="text-clip">Techbuds</span> for SEO & Digital Marketing?
                </h2>
                <p class="mt-4 text-base md:text-lg text-[#11224E]/80 leading-relaxed">
                    We don’t chase vanity metrics. Every campaign is designed to support your pipeline, sales, and long-term brand authority.
                </p>
            </div>
            <div class="space-y-3" data-animate="fade-up" data-delay="0.1">
                <div class="feature-item">Long-term, compounding SEO – not quick hacks or risky shortcuts.</div>
                <div class="feature-item">Technical SEO expertise across Laravel, JS frameworks, and modern stacks.</div>
                <div class="feature-item">Transparent reporting, clear KPIs, and action-oriented dashboards.</div>
                <div class="feature-item">Search + content + CRO integrated into one growth system.</div>
                <div class="feature-item">Strategies aligned with your business model – SaaS, services, local, or e‑commerce.</div>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Our <span class="text-clip">SEO & Marketing</span> Process
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-8">
                    <div class="process-step" data-animate="fade-up">
                        <span class="process-number">1</span>
                        <h3 class="text-xl font-semibold text-[#11224E] mb-2">Audit & Research</h3>
                        <p class="text-[#11224E]/75 text-sm md:text-base">
                            Technical audit, content and keyword analysis, competitor breakdown, and analytics review to understand your current baseline.
                        </p>
                    </div>
                    <div class="process-step" data-animate="fade-up" data-delay="0.05">
                        <span class="process-number">2</span>
                        <h3 class="text-xl font-semibold text-[#11224E] mb-2">Strategy & Roadmap</h3>
                        <p class="text-[#11224E]/75 text-sm md:text-base">
                            We define a clear SEO and digital marketing roadmap: priority pages, content clusters, link building plan, and measurement framework.
                        </p>
                    </div>
                </div>
                <div class="space-y-8">
                    <div class="process-step" data-animate="fade-up" data-delay="0.1">
                        <span class="process-number">3</span>
                        <h3 class="text-xl font-semibold text-[#11224E] mb-2">Execution & Optimization</h3>
                        <p class="text-[#11224E]/75 text-sm md:text-base">
                            Implementation of on-page changes, technical fixes, content publishing, campaigns, and link acquisition – with constant iteration.
                        </p>
                    </div>
                    <div class="process-step" data-animate="fade-up" data-delay="0.15">
                        <span class="process-number">4</span>
                        <h3 class="text-xl font-semibold text-[#11224E] mb-2">Tracking, Reporting & Scaling</h3>
                        <p class="text-[#11224E]/75 text-sm md:text-base">
                            Monthly reporting, insights, experiment logs, and scaling of what works across new pages, locations, and acquisition channels.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industries & Tools -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
            <div data-animate="fade-up">
                <h2 class="text-2xl md:text-3xl font-bold text-[#11224E] mb-4">
                    Industries We Work With
                </h2>
                <div class="service-card mt-4">
                    <ul class="list-none space-y-2">
                        <li class="feature-item">Startups & SaaS products</li>
                        <li class="feature-item">Local and service-based businesses</li>
                        <li class="feature-item">E‑commerce & D2C brands</li>
                        <li class="feature-item">Agencies & B2B companies</li>
                    </ul>
                </div>
            </div>
            <div data-animate="fade-up" data-delay="0.1">
                <h2 class="text-2xl md:text-3xl font-bold text-[#11224E] mb-4">
                    Tools & Platforms We Use
                </h2>
                <div class="service-card mt-4">
                    <ul class="list-none space-y-2">
                        <li class="feature-item">Google Search Console & Google Analytics</li>
                        <li class="feature-item">SEO & keyword tools (e.g. Ahrefs / SEMrush when applicable)</li>
                        <li class="feature-item">Crawling & auditing tools (e.g. Screaming Frog)</li>
                        <li class="feature-item">Page speed & Core Web Vitals monitoring</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Frequently Asked Questions
                </h2>
            </div>
            <div data-animate="fade-up" data-delay="0.05">
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">How long does SEO take to show results?</h3>
                    <p class="text-[#11224E]/80 text-sm md:text-base">
                        Typically <strong>3–6 months</strong>, depending on your competition, current website health, and how aggressively we implement the plan.
                        We focus on early quick wins while building long-term authority.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Do you provide local SEO?</h3>
                    <p class="text-[#11224E]/80 text-sm md:text-base">
                        Yes. We specialize in <strong>Google Maps and location-based rankings</strong>, including Google Business Profile optimization,
                        local citations, review strategies, and localized landing pages.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Is SEO and digital marketing suitable for startups?</h3>
                    <p class="text-[#11224E]/80 text-sm md:text-base">
                        Absolutely. When done right, SEO and content are some of the most <strong>cost-effective long-term growth channels</strong>.
                        We design lean strategies that work with startup timelines and budgets.
                    </p>
                </div>
                <div class="faq-item">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Can you work with our existing marketing team?</h3>
                    <p class="text-[#11224E]/80 text-sm md:text-base">
                        Yes. We regularly collaborate with in‑house marketing, founders, and sales teams to align SEO, content, and campaigns
                        with real business priorities.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#11224E]">
        <div class="max-w-4xl mx-auto text-center text-[#FFFDF6]" data-animate="fade-up">
            <span class="service-pill bg-white/10 text-xs tracking-[0.25em] text-[#FFFDF6]">
                Ready to grow organically?
            </span>
            <h2 class="mt-6 text-3xl md:text-4xl font-bold leading-tight">
                Ready to rank higher and turn traffic into real revenue?
            </h2>
            <p class="mt-4 text-base md:text-lg text-[#FFFDF6]/80 max-w-2xl mx-auto">
                Get a free SEO & digital growth review for your website. We’ll show you where you are, what’s blocking growth,
                and the exact roadmap to improve rankings and leads.
            </p>
            <div class="mt-8">
                <a href="{{ url('/#contact') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#FFFDF6] text-[#11224E] font-semibold text-sm hover:bg-[#F4F1E8] transition-colors">
                    Get a free SEO & marketing audit
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


