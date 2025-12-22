<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Our Portfolio - Web & Mobile App Development Projects | Techbuds';
            $metaDescription = 'Explore Techbuds portfolio showcasing powerful digital products across e-commerce, healthcare, SaaS, delivery apps, and more. Real-world engineering, modern design, and clean execution with measurable results.';
            $metaKeywords = 'techbuds portfolio, web development portfolio, mobile app portfolio, case studies, web development projects, mobile app projects, software development portfolio, UI/UX design portfolio';
        @endphp
        @include('components.meta-tags')

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

            .portfolio-card {
                position: relative;
                border-radius: 1.5rem;
                overflow: hidden;
                background: var(--surface);
                border: 1px solid var(--border-default);
                box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
                transition: transform .45s ease, box-shadow .45s ease, border-color .45s ease;
                padding: 2rem;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .portfolio-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 24px 70px rgba(37, 99, 235, 0.15);
                border-color: var(--brand-primary);
            }

            .category-card {
                position: relative;
                border-radius: 2rem;
                overflow: hidden;
                background: var(--surface);
                border: 1px solid var(--border-default);
                box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
                transition: all .45s ease;
                padding: 0;
                display: flex;
                flex-direction: column;
            }

            .category-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 28px 80px rgba(37, 99, 235, 0.15);
                border-color: var(--brand-primary);
            }

            .category-header {
                padding: 2rem 2rem 1.5rem;
                background: linear-gradient(135deg, rgba(37, 99, 235, 0.06) 0%, rgba(56, 189, 248, 0.03) 100%);
                border-bottom: 1px solid var(--border-default);
            }

            .category-icon {
                width: 4rem;
                height: 4rem;
                border-radius: 1.2rem;
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                box-shadow: 0 15px 35px rgba(37, 99, 235, 0.25);
                margin-bottom: 1rem;
            }

            .category-body {
                padding: 1.5rem 2rem 2rem;
                flex: 1;
            }

            .project-item {
                display: flex;
                align-items: flex-start;
                gap: 0.75rem;
                padding: 0.75rem;
                border-radius: 0.75rem;
                background: rgba(37, 99, 235, 0.03);
                margin-bottom: 0.75rem;
                transition: all .3s ease;
            }

            .project-item:hover {
                background: rgba(37, 99, 235, 0.08);
                transform: translateX(4px);
            }

            .project-item:last-child {
                margin-bottom: 0;
            }

            .project-badge {
                display: inline-flex;
                align-items: center;
                padding: 0.35rem 0.75rem;
                border-radius: 999px;
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                color: white;
                font-size: 0.7rem;
                font-weight: 600;
                margin-top: 0.5rem;
            }

            .tech-tag {
                display: inline-flex;
                align-items: center;
                padding: 0.4rem 0.9rem;
                border-radius: 999px;
                background: rgba(37, 99, 235, 0.08);
                color: var(--text-primary);
                font-size: 0.75rem;
                font-weight: 600;
            }

            .capability-card {
                background: var(--surface);
                border-radius: 1.5rem;
                padding: 1.5rem;
                border: 1px solid var(--border-default);
                box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
                transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
            }

            .capability-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 55px rgba(37, 99, 235, 0.12);
                border-color: var(--brand-primary);
            }

            .feature-list {
                display: grid;
                gap: 0.75rem;
            }

            .feature-item {
                position: relative;
                padding-left: 1.4rem;
                font-size: 0.9rem;
                color: var(--text-secondary);
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
        </style>
    </head>
<body class="bg-app-background text-text-primary font-sans antialiased">
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 min-h-[500px] md:min-h-[600px] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/portfolio-page-banner.jpg') }}" 
                alt="Techbuds Portfolio - Digital Products" 
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
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">Our Portfolio</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                Powerful, Scalable <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">Digital Products</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl mx-auto leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                We build powerful, scalable digital products for businesses across multiple industries. From e-commerce to healthcare, SaaS to delivery apps, our work reflects <strong class="text-white">real-world engineering, modern design, and clean execution</strong>.
            </p>
        </div>
    </section>

    <!-- Portfolio by Categories -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
    <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Portfolio Categories</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our Versatility Across <span class="text-clip">Industries</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                    Explore our expertise across different domains and technologies
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $categories = [
                        [
                            'icon' => '🛒',
                            'title' => 'E-Commerce & Payments',
                            'projects' => [
                                ['name' => 'E-Commerce Platform', 'tech' => 'Laravel, React, Stripe'],
                                ['name' => 'Marketplace Platform', 'tech' => 'Next.js, NestJS, Escrow']
                            ],
                            'shows' => 'Payment integration, carts, order flows, inventory, multi-vendor systems.'
                        ],
                        [
                            'icon' => '🏥',
                            'title' => 'Healthcare & Service Industry',
                            'projects' => [
                                ['name' => 'Clinic Management System', 'tech' => 'Vue, Node, MongoDB']
                            ],
                            'shows' => 'Secure data handling, appointments, patient records, dashboards.'
                        ],
                        [
                            'icon' => '🚚',
                            'title' => 'Food, Grocery & Delivery',
                            'projects' => [
                                ['name' => 'Food Delivery App', 'tech' => 'Flutter, Google Maps, Stripe'],
                                ['name' => 'Food & Grocery Delivery', 'tech' => 'Flutter, Firebase, Razorpay']
                            ],
                            'shows' => 'Real-time tracking, GPS zones, delivery flows, driver apps.'
                        ],
                        [
                            'icon' => '💼',
                            'title' => 'SaaS & B2B Platforms',
                            'projects' => [
                                ['name' => 'SaaS Billing System', 'tech' => 'Laravel, React, Stripe'],
                                ['name' => 'B2B CRM Portal', 'tech' => 'Laravel, Inertia']
                            ],
                            'shows' => 'Subscription billing, multi-tenant logic, pipelines, automation.'
                        ],
                        [
                            'icon' => '📚',
                            'title' => 'Education & E-Learning',
                            'projects' => [
                                ['name' => 'E-Learning Platform', 'tech' => 'Next.js, Prisma, AWS S3']
                            ],
                            'shows' => 'Video streaming, quizzes, progress tracking, personalized learning.'
                        ],
                        [
                            'icon' => '📊',
                            'title' => 'Dashboards & Data',
                            'projects' => [
                                ['name' => 'Analytics Dashboard', 'tech' => 'React, D3.js, Python, PostgreSQL']
                            ],
                            'shows' => 'Data visualization, BI dashboards, interactive charts.'
                        ]
                    ];
                @endphp

                @foreach($categories as $index => $category)
                <div class="category-card" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.1 }}">
                    <div class="category-header">
                        <div class="category-icon">{{ $category['icon'] }}</div>
                        <h3 class="text-xl font-bold text-heading">{{ $category['title'] }}</h3>
                    </div>
                    <div class="category-body">
                        <div class="mb-4">
                            @foreach($category['projects'] as $project)
                            <div class="project-item">
                                <svg class="w-5 h-5 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="flex-1">
                                    <p class="font-semibold text-heading text-sm">{{ $project['name'] }}</p>
                                    <p class="text-xs text-text-muted mt-0.5">{{ $project['tech'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="pt-4 border-t border-border-default">
                            <span class="project-badge">What this shows</span>
                            <p class="text-sm text-text-secondary mt-3 leading-relaxed">{{ $category['shows'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- What Our Work Says About Us -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Expertise</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    What Our Work <span class="text-clip">Says About Us</span>
                </h2>
                <p class="mt-3 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                    This section translates your portfolio → capabilities
                </p>
        </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $expertise = [
                        [
                            'title' => 'Full-Stack Expertise',
                            'desc' => 'We build everything — frontend, backend, apps, dashboards, DevOps, and databases.'
                        ],
                        [
                            'title' => 'Industry Versatility',
                            'desc' => 'E-commerce, healthcare, SaaS, logistics, education, finance — we\'ve delivered across all.'
                        ],
                        [
                            'title' => 'Modern Tech Stack',
                            'desc' => 'Laravel, React, Vue, Next.js, NestJS, Flutter, Firebase, Stripe, AWS, PostgreSQL and more.'
                        ],
                        [
                            'title' => 'Real-World Functionality',
                            'desc' => 'Real-time tracking, subscription billing, streaming platforms, analytics dashboards, GPS integrations, and more.'
                        ],
                        [
                            'title' => 'Problem-Solving Capability',
                            'desc' => 'Every project solves a real business challenge — we don\'t just "code," we create solutions.'
                        ],
                        [
                            'title' => 'Proven Delivery Experience',
                            'desc' => 'From small startups to scalable enterprise systems, we\'ve built products that work.'
                        ]
                ];
            @endphp

                @foreach($expertise as $index => $item)
                <div class="capability-card" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.1 }}">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">{{ $item['title'] }}</h3>
                            <p class="text-sm text-text-secondary leading-relaxed">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12 p-6 rounded-2xl bg-gradient-to-br from-brand-primary/10 to-brand-soft/5 border border-brand-primary/20" data-animate="fade-up">
                <h3 class="text-xl font-semibold text-heading mb-4">Real-World Functionality Highlights</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @php
                        $features = [
                            'Real-time tracking',
                            'Subscription billing',
                            'Streaming platforms',
                            'Analytics dashboards',
                            'GPS + map integrations',
                            'Multi-vendor systems',
                            'Custom automation',
                            'Secure medical records'
                        ];
                    @endphp
                    @foreach($features as $feature)
                    <div class="feature-item">{{ $feature }}</div>
                    @endforeach
                </div>
                </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white relative overflow-hidden">
        <div class="absolute inset-0" style="background: radial-gradient(circle at top left, rgba(255,255,255,0.12), transparent 45%); pointer-events: none;"></div>
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-semibold leading-tight mb-6" data-animate="fade-up">
                Ready to Build Your <span class="text-white">Project?</span>
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Let's turn your idea into a high-quality digital product.
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
    <!-- Schema Markup -->
    @php
        $portfolioSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'Techbuds Portfolio',
            'description' => 'Explore Techbuds portfolio showcasing powerful digital products across e-commerce, healthcare, SaaS, delivery apps, and more.',
            'url' => url('/portfolio'),
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($portfolioSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
    </script>
    @include('components.schema.breadcrumb', [
        'items' => [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Portfolio', 'url' => url('/portfolio')],
        ]
    ])
</body>
</html>
