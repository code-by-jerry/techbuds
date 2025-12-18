<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Our Services - Techbuds</title>
        <meta name="description" content="Techbuds offers comprehensive digital solutions: Web Development, Mobile Apps, SEO, UI/UX Design, DevOps, Database Warehousing, AI Automation, and Custom IT Solutions.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Fonts: Inter (Body) + Clash Display (Headings) -->
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

            .service-icon {
                display: inline-flex;
                width: 2.5rem;
                height: 2.5rem;
                border-radius: 1rem;
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                color: white;
                align-items: center;
                justify-content: center;
                box-shadow: 0 15px 35px rgba(37, 99, 235, 0.25);
            }

            .service-card {
                position: relative;
                border-radius: 1.5rem;
                overflow: hidden;
                background: var(--surface);
                border: 1px solid var(--border-default);
                box-shadow: 0 16px 45px rgba(0, 0, 0, 0.1);
                transition: transform .45s ease, box-shadow .45s ease, border-color .45s ease;
                padding: 2rem;
                display: flex;
                flex-direction: column;
                gap: 1rem;
                text-decoration: none;
                color: inherit;
            }

            .service-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 24px 70px rgba(37, 99, 235, 0.15);
                border-color: var(--brand-primary);
            }

            .service-card-icon {
                width: 3.5rem;
                height: 3.5rem;
                border-radius: 1.2rem;
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.75rem;
                box-shadow: 0 15px 35px rgba(37, 99, 235, 0.25);
            }

            .service-panel {
                position: relative;
                border-radius: 2rem;
                overflow: hidden;
                background: var(--subtle-surface);
                border: 1px solid var(--border-default);
                box-shadow: 0 22px 60px rgba(0, 0, 0, 0.08);
            }

            .service-panel::before {
                content: '';
                position: absolute;
                inset: 0;
                background: radial-gradient(circle at top left, rgba(37, 99, 235, 0.05), transparent 55%);
                mix-blend-mode: multiply;
                pointer-events: none;
            }

            .service-media {
                position: relative;
                border-radius: 1.6rem;
                overflow: hidden;
            }

            .service-media::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(37, 99, 235, 0.45) 0%, rgba(56, 189, 248, 0.1) 75%);
                opacity: 0.55;
            }

            .service-media img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transform: scale(1.05);
            }

            .service-highlights {
                display: grid;
                gap: 0.75rem;
            }

            .service-highlight {
                position: relative;
                padding-left: 1.4rem;
                font-size: 0.9rem;
                color: var(--text-secondary);
            }

            .service-highlight::before {
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

            .why-choose-card {
                background: var(--surface);
                border-radius: 1.5rem;
                padding: 2rem;
                border: 1px solid var(--border-default);
                box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
                transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
            }

            .why-choose-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 55px rgba(37, 99, 235, 0.12);
                border-color: var(--brand-primary);
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
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto text-center">
            <div data-animate="fade-up">
                <span class="service-pill">Our Services</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-heading leading-tight" data-animate="fade-up" data-delay="0.1">
                Empowering businesses with <span class="text-clip">end-to-end digital solutions</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-text-secondary max-w-3xl mx-auto leading-relaxed" data-animate="fade-up" data-delay="0.2">
                At Techbuds, we design, build, optimize, and scale digital products that help brands grow faster, operate smarter, and stay future-ready. Whether you need a website, mobile app, SEO, DevOps, branding, or custom IT solutions — we deliver <strong class="text-text-primary">clean, reliable, and high-impact results</strong>.
            </p>
        </div>
    </section>

    <!-- Service Cards Grid -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    What We <span class="text-clip">Offer</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                    Comprehensive digital solutions tailored to your business needs
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Web Development -->
                <a href="{{ route('services.show', 'web-development') }}" class="service-card cursor-pointer" data-animate="fade-up">
                    <div class="service-card-icon">🌐</div>
                    <h3 class="text-xl font-semibold text-heading">Web Development</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Modern, fast, and scalable websites built for performance, SEO, and user experience.</p>
                </a>

                <!-- Mobile App Development -->
                <a href="{{ route('services.show', 'mobile-app-development') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.1">
                    <div class="service-card-icon">📱</div>
                    <h3 class="text-xl font-semibold text-heading">Mobile App Development</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Intuitive Android & iOS applications designed to engage users and boost retention.</p>
                </a>

                <!-- SEO & Digital Marketing -->
                <a href="{{ route('services.show', 'seo-digital-marketing') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.2">
                    <div class="service-card-icon">🔍</div>
                    <h3 class="text-xl font-semibold text-heading">SEO & Digital Marketing</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Rank higher, grow faster, and generate quality leads with advanced SEO & data-driven marketing.</p>
                </a>

                <!-- UI/UX Design & Branding -->
                <a href="{{ route('services.show', 'ui-ux-design') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.3">
                    <div class="service-card-icon">🖥️</div>
                    <h3 class="text-xl font-semibold text-heading">UI/UX Design & Branding</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Beautiful, user-centered designs that make your brand unforgettable.</p>
                </a>

                <!-- DevOps & Cloud Deployment -->
                <a href="{{ route('services.show', 'devops-cloud') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.4">
                    <div class="service-card-icon">⚙️</div>
                    <h3 class="text-xl font-semibold text-heading">DevOps & Cloud Deployment</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Lightning-fast infrastructure, CI/CD pipelines, monitoring, and high-availability systems.</p>
                </a>

                <!-- Database & Data Warehousing -->
                <a href="{{ route('services.show', 'database-data-warehousing') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.5">
                    <div class="service-card-icon">📊</div>
                    <h3 class="text-xl font-semibold text-heading">Database & Data Warehousing</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Organized, scalable, and secure data architecture for analytics and business intelligence.</p>
                </a>

                <!-- AI & Automation Solutions -->
                <a href="{{ route('services.show', 'ai-automation') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.6">
                    <div class="service-card-icon">🤖</div>
                    <h3 class="text-xl font-semibold text-heading">AI & Automation Solutions</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Smart automation, AI integrations, chatbots, workflows & business efficiency upgrades.</p>
                </a>

                <!-- Custom IT Solutions -->
                <a href="{{ route('services.show', 'custom-it-solutions') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.7">
                    <div class="service-card-icon">🛠️</div>
                    <h3 class="text-xl font-semibold text-heading">Custom IT Solutions</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Tailored software systems designed around your business needs, not the other way around.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Detailed Service Descriptions -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Service Details</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    What You Get with <span class="text-clip">Each Service</span>
                </h2>
            </div>

            <div class="space-y-10">
                @php
                    $services = [
                        [
                            'icon' => '🌐',
                            'title' => 'Web Development',
                            'description' => 'Your website is your first impression — and we make it unforgettable. We build fast, modern, mobile-friendly, and SEO-optimized websites that convert visitors into customers. From landing pages to custom web applications, everything is tailored for performance and growth.',
                            'features' => [
                                'Professional design',
                                'Blazing-fast performance',
                                'SEO-friendly structure',
                                'Responsive & mobile-first layout',
                                'Custom dashboards, CMS, portals',
                                'Secure & scalable development'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=60'
                        ],
                        [
                            'icon' => '📱',
                            'title' => 'Mobile App Development',
                            'description' => 'We create powerful, intuitive mobile apps that users love. Whether you need a business app, customer app, e-commerce app, or internal app — we deliver smooth performance with clean UI/UX.',
                            'features' => [
                                'Android & iOS apps',
                                'Smooth navigation & solid UX',
                                'API development & integration',
                                'Scalable architecture',
                                'App Store Optimization (ASO)',
                                'Maintenance & feature upgrades'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1600&q=60'
                        ],
                        [
                            'icon' => '🔍',
                            'title' => 'SEO & Digital Marketing',
                            'description' => 'Your customers are searching — we make sure they find you first. We combine technical SEO, content strategy, and digital marketing to bring consistent, high-intent traffic to your business.',
                            'features' => [
                                'Full SEO Audit',
                                'Keyword strategy & content plan',
                                'On-page + technical SEO',
                                'Local SEO optimization',
                                'Link building & authority boosting',
                                'Digital marketing strategy (ads, content, SMM)'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8f2d1c6?auto=format&fit=crop&w=1600&q=60'
                        ],
                        [
                            'icon' => '🖥️',
                            'title' => 'UI/UX Design & Branding',
                            'description' => 'Design isn\'t just "how it looks." It\'s how it feels, how it guides, and how it converts. We craft intuitive interfaces and beautiful branding that build trust at first sight.',
                            'features' => [
                                'Wireframes & prototypes',
                                'Modern UI design',
                                'UX research & flow optimization',
                                'Branding guidelines & logo',
                                'Web + mobile designs',
                                'High-converting layouts'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&fit=crop&w=1600&q=60'
                        ],
                        [
                            'icon' => '⚙️',
                            'title' => 'DevOps & Cloud Deployment',
                            'description' => 'We ensure your digital product runs flawlessly — no downtime, no slow load, no chaos. Our DevOps team provides high-performance infrastructure and automation that keeps your app stable 24/7.',
                            'features' => [
                                'CI/CD pipelines',
                                'AWS / GCP / DigitalOcean deployment',
                                'Performance monitoring',
                                'Auto-scaling & load balancing',
                                'Server optimization',
                                'Error-free deployments'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1600&q=60'
                        ],
                        [
                            'icon' => '📊',
                            'title' => 'Database & Data Warehousing',
                            'description' => 'Your data should work for you — not overwhelm you. We design scalable data systems that help businesses analyze, understand, and make powerful decisions.',
                            'features' => [
                                'Database architecture',
                                'Data modeling & optimization',
                                'Data warehouse setup',
                                'ETL automation',
                                'BI dashboards (PowerBI / Looker / Tableau)'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=60'
                        ],
                        [
                            'icon' => '🤖',
                            'title' => 'AI & Automation Solutions',
                            'description' => 'Make your business faster, smarter, and more efficient. We bring AI into your workflows so you save time, reduce errors, and serve customers better.',
                            'features' => [
                                'AI chatbots',
                                'Lead automation',
                                'Data processing bots',
                                'Generative content tools',
                                'Custom AI pipelines'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=1600&q=60'
                        ],
                        [
                            'icon' => '🛠️',
                            'title' => 'Custom IT Solutions',
                            'description' => 'No template. No generic features. We build exactly what your business needs to operate smarter and grow faster.',
                            'features' => [
                                'Tailor-made software',
                                'Management systems',
                                'CRMs, ERPs, inventory apps',
                                'Task, HR, and workflow systems',
                                'Custom dashboards & admin panels'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=60'
                        ]
                    ];
                @endphp

                @foreach($services as $index => $service)
                <article class="service-panel p-6 md:p-8" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.1 }}">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                        @if($index % 2 == 0)
                        <div class="lg:col-span-5">
                            <div class="service-media h-60 md:h-64" data-animate="slide-right">
                                <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                            </div>
                        </div>
                        @endif
                        <div class="lg:col-span-7 space-y-5">
                            <div class="flex items-center gap-4">
                                <span class="service-icon text-2xl">
                                    {{ $service['icon'] }}
                                </span>
                                <div>
                                    <p class="service-pill">{{ $service['title'] }}</p>
                                    <h3 class="mt-2 text-2xl md:text-3xl font-semibold text-heading">{{ $service['title'] }}</h3>
                                </div>
                            </div>
                            <p class="text-sm md:text-base text-text-secondary leading-relaxed">
                                {{ $service['description'] }}
                            </p>
                            <div class="service-highlights">
                                @foreach($service['features'] as $feature)
                                <div class="service-highlight">{{ $feature }}</div>
                                @endforeach
                            </div>
                        </div>
                        @if($index % 2 == 1)
                        <div class="lg:col-span-5 order-first lg:order-last">
                            <div class="service-media h-60 md:h-64" data-animate="slide-left">
                                <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                            </div>
                        </div>
                        @endif
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Why Choose Us</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why Businesses <span class="text-clip">Choose Techbuds</span>
                </h2>
                <p class="mt-3 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                    We build long-term partnerships anchored in clarity, velocity, and measurable results.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $reasons = [
                        ['title' => 'We build with clarity', 'desc' => 'No confusing tech jargon — we explain everything clearly.'],
                        ['title' => 'We deliver on time, every time', 'desc' => 'Quality + speed = our core value.'],
                        ['title' => 'We focus on long-term results', 'desc' => 'Not quick fixes. Sustainable growth.'],
                        ['title' => 'We combine design, development & marketing', 'desc' => 'One team. One workflow. One powerful digital ecosystem.'],
                        ['title' => 'We build future-ready systems', 'desc' => 'Scalable, secure, and designed for growth.'],
                        ['title' => 'We treat projects like partnerships', 'desc' => 'Your success = our success.']
                    ];
                @endphp

                @foreach($reasons as $index => $reason)
                <div class="why-choose-card" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.1 }}">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">{{ $reason['title'] }}</h3>
                            <p class="text-sm text-text-secondary leading-relaxed">{{ $reason['desc'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How We Work Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Process</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    How We <span class="text-clip">Work</span>
                </h2>
                <p class="mt-3 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                    A clean 4-step workflow communicates professionalism + reliability.
                </p>
            </div>

            <div class="space-y-6">
                @php
                    $steps = [
                        ['num' => '1', 'title' => 'Discover & Understand', 'desc' => 'We understand your goals, requirements, and the problem you want to solve.'],
                        ['num' => '2', 'title' => 'Plan & Strategize', 'desc' => 'We create a roadmap — design, development, marketing, timelines.'],
                        ['num' => '3', 'title' => 'Build & Optimize', 'desc' => 'We design, develop, integrate, test, and optimize your product.'],
                        ['num' => '4', 'title' => 'Launch & Support', 'desc' => 'We deploy, monitor, improve, and support long-term growth.']
                    ];
                @endphp

                @foreach($steps as $index => $step)
                <div class="process-step" data-animate="fade-up" data-delay="{{ $index * 0.1 }}">
                    <div class="process-number">{{ $step['num'] }}</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">{{ $step['title'] }}</h3>
                    <p class="text-base text-text-secondary leading-relaxed">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-semibold leading-tight mb-6" data-animate="fade-up">
                Let's Build Something <span class="text-white">Amazing Together</span> 🚀
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Ready to transform your digital presence? Get in touch and let's discuss how we can help your business grow.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="{{ route('contact') }}" class="bg-white text-brand-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Book a Free Consultation
                </a>
                <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white/10 transition-all transform hover:scale-105">
                    Get a Custom Quote
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
            if (!window.gsap || !window.ScrollTrigger) {
                return;
            }

            gsap.registerPlugin(ScrollTrigger);

            const animationMap = {
                'fade-up': { y: 40 },
                'fade-in': {},
                'slide-up': { y: 60 },
                'slide-right': { x: -60 },
                'slide-left': { x: 60 },
            };

            Object.entries(animationMap).forEach(([key, config]) => {
                gsap.utils.toArray(`[data-animate="${key}"]`).forEach((el) => {
                    const delay = parseFloat(el.dataset.delay || '0');
                    gsap.from(el, {
                        duration: 1.1,
                        opacity: config.opacity ?? 0,
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

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
