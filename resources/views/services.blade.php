<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Our Services - Web Development, Mobile Apps, SEO & More | Techbuds';
            $metaDescription = 'Professional web development, mobile app development, SEO services, web hosting & deployment, and API integration services. Techbuds delivers scalable, high-performance digital solutions for growing businesses.';
            $metaKeywords = 'web development services, mobile app development, SEO services, web hosting services, app deployment, API development, system integration, Laravel development, React development, Flutter apps, hosting support, web development company';
        @endphp
        @include('components.meta-tags')
        @include('components.google-analytics')

        <!-- Favicon -->
        @include('components.favicon')

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
                max-height: 18rem;
                transition: transform 0.3s ease, opacity 0.3s ease;
            }

            .service-media::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(37, 99, 235, 0.45) 0%, rgba(56, 189, 248, 0.1) 75%);
                opacity: 0.55;
                transition: opacity 0.3s ease;
            }

            .service-media img {
                width: 100%;
                height: 100%;
                max-height: 18rem;
                object-fit: cover;
                transform: scale(1.05);
                transition: transform 0.3s ease;
            }

            .group:hover .service-media {
                transform: translateY(-4px);
            }

            .group:hover .service-media img {
                transform: scale(1.08);
            }

            .group:hover .service-media::after {
                opacity: 0.4;
            }

            .service-content-wrapper {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
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
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 min-h-[500px] md:min-h-[600px] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/service-page-banner.jpg') }}" 
                alt="Techbuds Services - Digital Solutions Team" 
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
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">Our Services</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                Empowering businesses with <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">end-to-end digital solutions</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl mx-auto leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                At Techbuds, we design, build, optimize, and scale digital products that help brands grow faster, operate smarter, and stay future-ready. Whether you need a website, mobile app, SEO, DevOps, branding, or custom IT solutions — we deliver <strong class="text-white">clean, reliable, and high-impact results</strong>.
            </p>
        </div>
    </section>

    <!-- Professional Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill bg-brand-primary/20 text-brand-primary border-brand-primary/30">Complete Solutions</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Professional <span class="text-clip">Digital Services</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                    Comprehensive technology solutions to accelerate your business growth, improve efficiency, and drive measurable results
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Web Development -->
                <a href="{{ route('services.show', 'web-development') }}" class="service-card cursor-pointer" data-animate="fade-up">
                    <div class="service-card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-heading">Web Development</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Modern, fast, and scalable websites built for performance, SEO, and user experience.</p>
                </a>

                <!-- Mobile App Development -->
                <a href="{{ route('services.show', 'mobile-app-development') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.1">
                    <div class="service-card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-heading">Mobile App Development</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Intuitive Android & iOS applications designed to engage users and boost retention.</p>
                </a>

                <!-- SEO Services -->
                <a href="{{ route('services.show', 'seo-digital-marketing') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.2">
                    <div class="service-card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-heading">SEO Services</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Improve rankings, grow organic traffic, and build authority with technical SEO and optimization.</p>
                </a>

                <!-- Web Hosting, App Deployment & Support -->
                <a href="{{ route('services.show', 'web-hosting-app-deployment-support') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.3">
                    <div class="service-card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-heading">Web Hosting & Deployment</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Reliable hosting, smooth deployments, and ongoing technical support for your applications.</p>
                </a>

                <!-- API Development & System Integration -->
                <a href="{{ route('services.show', 'api-development-system-integration') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.4">
                    <div class="service-card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-heading">API & Integration</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Secure APIs, seamless integrations, and system-to-system connections.</p>
                </a>

                <!-- Brand Experience & Content Marketing -->
                <a href="{{ route('services.show', 'brand-experience-content-marketing') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.5">
                    <div class="service-card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-heading">Brand Experience & Content Marketing</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Design-led branding, UI/UX, and content that build trust and drive growth — no paid ads.</p>
                </a>

                <!-- Database & Data Warehousing -->
                <a href="{{ route('services.show', 'database-data-warehousing') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.6">
                    <div class="service-card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-heading">Database & Data Warehousing</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Scalable database architectures, data warehousing, and BI dashboards for data-driven decisions.</p>
                </a>

                <!-- Custom IT Solutions -->
                <a href="{{ route('services.show', 'custom-it-solutions') }}" class="service-card cursor-pointer" data-animate="fade-up" data-delay="0.7">
                    <div class="service-card-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-heading">Custom IT Solutions</h3>
                    <p class="text-sm text-text-secondary leading-relaxed">Tailored enterprise software, CRMs, ERPs, and workflow automation for your business needs.</p>
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
                    // All professional services
                    $allServices = [
                        [
                            'slug' => 'web-development',
                            'is_core' => true,
                            'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>',
                            'title' => 'Web Development',
                            'description' => 'Fast, scalable, and SEO-optimized websites built with modern technologies. We create custom web applications, e-commerce platforms, and business portals designed for performance and growth.',
                            'features' => [
                                'Custom website development (Laravel, React, Next.js)',
                                'E-commerce platforms and online stores',
                                'Content Management Systems (CMS)',
                                'Business portals and dashboards',
                                'SEO-optimized and mobile-first design'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80'
                        ],
                        [
                            'slug' => 'mobile-app-development',
                            'is_core' => true,
                            'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>',
                            'title' => 'Mobile App Development',
                            'description' => 'Native and cross-platform mobile applications for Android and iOS. We build intuitive apps with seamless API integration, real-time features, and App Store Optimization.',
                            'features' => [
                                'Native Android and iOS development',
                                'Cross-platform apps (Flutter, React Native)',
                                'E-commerce and business mobile apps',
                                'API integration and backend connectivity',
                                'App Store Optimization (ASO)'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1600&q=80'
                        ],
                        [
                            'slug' => 'seo-digital-marketing',
                            'is_core' => true,
                            'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>',
                            'title' => 'SEO Services',
                            'description' => 'Improve search rankings and grow organic traffic with professional SEO services. Technical SEO, on-page optimization, local SEO, content strategy, and performance tracking.',
                            'features' => [
                                'Complete SEO audit and optimization',
                                'Keyword research and content strategy',
                                'On-page and technical SEO',
                                'Local SEO optimization',
                                'Performance tracking and reporting'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80'
                        ],
                        [
                            'slug' => 'web-hosting-app-deployment-support',
                            'is_core' => true,
                            'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>',
                            'title' => 'Web Hosting, App Deployment & Support',
                            'description' => 'Reliable hosting, smooth deployments, and ongoing technical support. We manage hosting setup, application deployment, server monitoring, and long-term maintenance so you can focus on your business.',
                            'features' => [
                                'Web hosting setup & management',
                                'Application deployment (web & mobile backends)',
                                'Server monitoring & performance optimization',
                                'Ongoing maintenance & technical support',
                                'Hosting migration & upgrades'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1600&q=80'
                        ],
                        [
                            'slug' => 'api-development-system-integration',
                            'is_core' => true,
                            'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>',
                            'title' => 'API Development & System Integration',
                            'description' => 'Secure APIs and seamless integrations that connect your systems. We develop REST APIs, integrate third-party services, and build system-to-system connections.',
                            'features' => [
                                'REST API development and architecture',
                                'Third-party API integration',
                                'System-to-system integration',
                                'API security and performance optimization',
                                'API maintenance and versioning'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1600&q=80'
                        ],
                        [
                            'slug' => 'brand-experience-content-marketing',
                            'is_core' => true,
                            'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>',
                            'title' => 'Brand Experience & Content Marketing',
                            'description' => 'Design-led branding, UI/UX, and content marketing that build trust and drive growth. Brand positioning, visual identity, content strategy, and conversion-focused experiences — no paid ads.',
                            'features' => [
                                'UI/UX design & experience optimization',
                                'Branding & visual identity',
                                'Content marketing & strategy',
                                'Conversion-focused content & UX',
                                'Analytics & experience insights'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&fit=crop&w=1600&q=80'
                        ],
                        [
                            'slug' => 'database-data-warehousing',
                            'is_core' => true,
                            'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>',
                            'title' => 'Database & Data Warehousing',
                            'description' => 'Scalable database architectures and data warehousing solutions. We design data systems using PostgreSQL, MySQL, MongoDB, and create BI dashboards for data-driven decisions.',
                            'features' => [
                                'Database architecture and design',
                                'PostgreSQL, MySQL, MongoDB setup',
                                'Data warehouse and ETL pipelines',
                                'Business Intelligence dashboards',
                                'Database optimization and migration'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80'
                        ],
                        [
                            'slug' => 'custom-it-solutions',
                            'is_core' => true,
                            'icon_svg' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>',
                            'title' => 'Custom IT Solutions',
                            'description' => 'Tailored enterprise software development for your business needs. We build custom management systems, CRMs, ERPs, inventory software, and workflow automation tools.',
                            'features' => [
                                'Custom software development',
                                'CRM and ERP system development',
                                'Inventory and supply chain management',
                                'HR and employee management systems',
                                'Workflow automation and integration'
                            ],
                            'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80'
                        ]
                    ];
                @endphp

                @foreach($allServices as $index => $service)
                <article class="service-panel p-6 md:p-8" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.1 }}">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                        @if($index % 2 == 0)
                        <div class="lg:col-span-5">
                            <a href="{{ route('services.show', $service['slug']) }}" class="block cursor-pointer group">
                                <div class="service-media" data-animate="slide-right">
                                    <img src="{{ $service['image'] }}" alt="{{ $service['title'] }} Services - Techbuds" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                                </div>
                            </a>
                        </div>
                        @endif
                        <div class="lg:col-span-7 service-content-wrapper">
                            <div>
                                <div class="flex items-center gap-4 mb-5">
                                    <div class="service-icon text-white">
                                        {!! $service['icon_svg'] !!}
                                    </div>
                                    <div>
                                        <p class="service-pill">{{ $service['title'] }}</p>
                                        <h3 class="mt-2 text-2xl md:text-3xl font-semibold text-heading">{{ $service['title'] }}</h3>
                                    </div>
                                </div>
                                <p class="text-sm md:text-base text-text-secondary leading-relaxed mb-6">
                                    {{ $service['description'] }}
                                </p>
                            </div>
                            <div class="service-highlights">
                                @foreach($service['features'] as $feature)
                                <div class="service-highlight">{{ $feature }}</div>
                                @endforeach
                            </div>
                        </div>
                        @if($index % 2 == 1)
                        <div class="lg:col-span-5 order-first lg:order-last">
                            <a href="{{ route('services.show', $service['slug']) }}" class="block cursor-pointer group">
                                <div class="service-media" data-animate="slide-left">
                                    <img src="{{ $service['image'] }}" alt="{{ $service['title'] }} Services - Techbuds" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                                </div>
                            </a>
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
                        ['title' => 'We deliver on time, every time', 'desc' => 'Quality + speed = our commitment.'],
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
    
    <!-- Schema Markup -->
    @php
        $servicesPageSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'Techbuds Services',
            'description' => 'Professional web development, mobile app development, SEO services, web hosting & deployment, and API integration services. Techbuds delivers scalable, high-performance digital solutions.',
            'url' => route('services'),
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($servicesPageSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
    </script>
    @include('components.schema.breadcrumb', [
        'items' => [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Services', 'url' => route('services')],
        ]
    ])
</body>
</html>
