<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Our Portfolio - Web & Mobile App Development Projects | Techbuds';
            $metaDescription = 'Explore Techbuds portfolio showcasing powerful digital products across e-commerce, healthcare, SaaS, delivery apps, and more. Real-world engineering, modern design, and clean execution with measurable results.';
            $metaKeywords = 'techbuds portfolio, web development portfolio, mobile app portfolio, case studies, web development projects, mobile app projects, software development portfolio, UI/UX design portfolio';
        @endphp
        @include('components.meta-tags')
        @include('components.google-analytics')

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

            .case-study-card {
                position: relative;
                border-radius: 1.5rem;
                overflow: hidden;
                background: var(--surface);
                border: 1px solid var(--border-default);
                box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
                transition: all .45s ease;
                display: flex;
                flex-direction: column;
                height: 100%;
                text-decoration: none;
                color: inherit;
                cursor: pointer;
            }

            .case-study-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 28px 80px rgba(37, 99, 235, 0.15);
                border-color: var(--brand-primary);
            }

            .case-study-image {
                width: 100%;
                height: 240px;
                object-fit: cover;
                background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(56, 189, 248, 0.05) 100%);
            }

            .case-study-content {
                padding: 2rem;
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .industry-badge {
                display: inline-flex;
                align-items: center;
                padding: 0.4rem 0.9rem;
                border-radius: 999px;
                background: rgba(37, 99, 235, 0.1);
                color: var(--brand-primary);
                font-size: 0.7rem;
                font-weight: 600;
                letter-spacing: 0.05em;
                margin-bottom: 1rem;
            }

            .capability-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .capability-list li {
                position: relative;
                padding-left: 1.5rem;
                margin-bottom: 0.75rem;
                font-size: 0.9rem;
                color: var(--text-secondary);
                line-height: 1.6;
            }

            .capability-list li::before {
                content: '→';
                position: absolute;
                left: 0;
                color: var(--brand-primary);
                font-weight: 600;
            }

            .capability-list li:last-child {
                margin-bottom: 0;
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
                Enterprise-Grade <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">Software Solutions</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl mx-auto leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                We design, engineer, and scale <strong class="text-white">production-ready digital platforms</strong> for startups, SMEs, and growing enterprises. Our portfolio reflects real business use cases—each solution built for performance, security, scalability, and long-term maintainability.
            </p>
        </div>
    </section>

    <!-- Featured Case Studies -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <span class="service-pill">Featured Projects</span>
                <h2 class="mt-5 text-3xl md:text-4xl lg:text-5xl font-heading font-semibold text-heading leading-tight">
                    Real-World <span class="text-clip">Case Studies</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                    Production-ready digital systems aligned with real business goals—performance, scalability, security, and long-term ROI.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $caseStudies = [
                        [
                            'title' => 'Destro Solutions',
                            'subtitle' => 'Software-Defined Vehicles Platform',
                            'industry' => 'Automotive Technology / Mobility',
                            'url' => 'https://info.destrosolutions.com/',
                            'website' => 'info.destrosolutions.com',
                            'thumbnail' => 'destrosolution.png',
                            'overview' => 'A high-performance platform focused on software-defined vehicles, showcasing innovative automotive technology and digital mobility solutions.',
                            'tech' => 'Laravel · Tailwind CSS · SEO Architecture · Performance Optimization'
                        ],
                        [
                            'title' => 'Bhumi Infra',
                            'subtitle' => 'Construction & Real Estate Platform',
                            'industry' => 'Construction / Real Estate',
                            'url' => 'https://bhumi-infra.pages.dev/',
                            'website' => 'bhumi-infra.pages.dev',
                            'thumbnail' => 'blueinfra.png',
                            'overview' => 'A professional construction and real estate website designed to showcase projects, establish trust, and generate leads for large-scale infrastructure developments.',
                            'tech' => 'Modern Frontend · SEO Strategy · Conversion UX'
                        ],
                        [
                            'title' => 'Kovai Heritage Dairy',
                            'subtitle' => 'Dairy & FMCG Brand Platform',
                            'industry' => 'Dairy / FMCG / Food Production',
                            'url' => 'https://kovaiheritagedairy24.pages.dev/',
                            'website' => 'kovaiheritagedairy24.pages.dev',
                            'thumbnail' => 'kovaiheritagedairy.png',
                            'overview' => 'A brand-focused website for a regional dairy manufacturer emphasizing heritage, purity, and product trust in the milk and dairy industry.',
                            'tech' => 'Laravel · Tailwind · Content Architecture · SEO'
                        ],
                        [
                            'title' => 'Misty Beans',
                            'subtitle' => 'Café & Restaurant Digital Presence',
                            'industry' => 'Food & Beverage / Hospitality',
                            'url' => 'https://mistybeans.pages.dev/',
                            'website' => 'mistybeans.pages.dev',
                            'thumbnail' => 'mistybean.png',
                            'overview' => 'A modern coffee and restaurant website designed to attract customers, showcase the brand, and provide an engaging digital experience for café enthusiasts.',
                            'tech' => 'Frontend Optimization · UX Design · SEO'
                        ],
                        [
                            'title' => 'EduKalam',
                            'subtitle' => 'Online Learning Platform',
                            'industry' => 'Education / E-Learning',
                            'url' => 'https://edukalam.pages.dev/',
                            'website' => 'edukalam.pages.dev',
                            'thumbnail' => 'edukalam.png',
                            'overview' => 'An education platform structured for course discovery, learner engagement, and scalable learning experiences for students and educators.',
                            'tech' => 'Modern Frontend · SEO · Scalable UI Architecture'
                        ]
                    ];
                @endphp

                @foreach($caseStudies as $index => $case)
                <a href="{{ $case['url'] }}" target="_blank" rel="noopener noreferrer" class="case-study-card group" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.1 }}">
                    <img 
                        src="{{ asset('images/portfolio-thumbnails/' . $case['thumbnail']) }}" 
                        alt="{{ $case['title'] }} - {{ $case['subtitle'] }}"
                        class="case-study-image"
                        loading="lazy">
                    <div class="case-study-content">
                        <span class="industry-badge">{{ $case['industry'] }}</span>
                        <h3 class="text-xl font-bold text-heading mb-2 group-hover:text-brand-primary transition-colors">{{ $case['title'] }}</h3>
                        <p class="text-sm font-semibold text-brand-primary mb-4">{{ $case['subtitle'] }}</p>
                        <p class="text-sm text-text-secondary mb-4 leading-relaxed flex-grow">{{ $case['overview'] }}</p>
                        <div class="pt-4 border-t border-border-default">
                            <p class="text-xs text-text-muted font-medium mb-2">{{ $case['tech'] }}</p>
                            <p class="text-xs text-brand-primary font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                                Visit Website
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Industry Experience & Solution Capabilities -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
    <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Industry Expertise</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Solution Capabilities Across <span class="text-clip">Industries</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                    We build secure, scalable platforms tailored to industry-specific requirements and business objectives.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $categories = [
                        [
                            'title' => 'E-Commerce & Payment Systems',
                            'description' => 'We build secure, scalable e-commerce platforms with integrated payment workflows.',
                            'capabilities' => [
                                'Payment gateway integrations (Stripe, Razorpay)',
                                'Cart, checkout, and order lifecycle management',
                                'Multi-vendor and marketplace systems'
                            ]
                        ],
                        [
                            'title' => 'Healthcare & Service Platforms',
                            'description' => 'Security-focused systems for healthcare and service-based businesses with HIPAA-aware architecture.',
                            'capabilities' => [
                                'Appointment scheduling systems',
                                'Secure data handling & dashboards',
                                'Role-based access systems'
                            ]
                        ],
                        [
                            'title' => 'Food, Grocery & Delivery Systems',
                            'description' => 'End-to-end digital solutions for food, grocery, and logistics businesses.',
                            'capabilities' => [
                                'Real-time order tracking',
                                'Delivery workflows & driver logic',
                                'Location-based services'
                            ]
                        ],
                        [
                            'title' => 'SaaS & B2B Platforms',
                            'description' => 'Robust platforms built for scale, subscriptions, and enterprise workflows.',
                            'capabilities' => [
                                'Multi-tenant SaaS architecture',
                                'Subscription billing systems',
                                'Internal dashboards & automation'
                            ]
                        ],
                        [
                            'title' => 'Education & E-Learning',
                            'description' => 'Scalable learning platforms designed for growth and engagement.',
                            'capabilities' => [
                                'Course platforms & LMS foundations',
                                'Progress tracking systems',
                                'Video and content delivery structures'
                            ]
                        ],
                        [
                            'title' => 'Analytics & Business Dashboards',
                            'description' => 'Data-driven dashboards for decision-makers and business intelligence.',
                            'capabilities' => [
                                'Interactive data visualization',
                                'Business intelligence dashboards',
                                'Performance and reporting systems'
                            ]
                        ]
                    ];
                @endphp

                @foreach($categories as $index => $category)
                <div class="category-card" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.1 }}">
                    <div class="category-header">
                        <h3 class="text-xl font-bold text-heading">{{ $category['title'] }}</h3>
                    </div>
                    <div class="category-body">
                        <p class="text-sm text-text-secondary mb-4 leading-relaxed">{{ $category['description'] }}</p>
                        <div class="pt-4 border-t border-border-default">
                            <span class="project-badge">Capabilities</span>
                            <ul class="capability-list mt-3">
                                @foreach($category['capabilities'] as $capability)
                                <li>{{ $capability }}</li>
                                @endforeach
                            </ul>
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
                    We do not build experimental projects. We engineer production-ready digital systems aligned with real business goals.
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
                            'desc' => 'From small startups to scalable enterprise systems, we\'ve built products that work in production environments.'
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

            <div class="mt-12 p-8 rounded-2xl bg-gradient-to-br from-brand-primary/10 to-brand-soft/5 border border-brand-primary/20" data-animate="fade-up">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-semibold text-heading mb-2">Real-World Functionality Highlights</h3>
                    <p class="text-sm text-text-secondary">Production-tested features across our portfolio</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
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
