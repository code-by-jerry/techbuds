<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'About Techbuds - Complete Digital Solutions for Growing Businesses | Web Development & SEO';
            $metaDescription = 'Techbuds delivers complete digital solutions including web development, SEO, branding, and scalable infrastructure. Technology consulting partner helping businesses build high-performance digital systems that generate leads and support growth.';
            $metaKeywords = 'complete digital solutions, web development and SEO services, technology consulting for businesses, end-to-end digital services, business-first digital strategy, web development services, SEO-focused platforms, scalable infrastructure, technology partner';
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
            [x-cloak] { display: none !important; }
            
            body {
                font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            }
            
            .font-display {
                font-family: 'Clash Display', 'Inter', sans-serif;
            }
            
            /* Gradient Text */
            .text-gradient {
                background: linear-gradient(135deg, #2563EB 0%, #38BDF8 100%);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            /* Glow Effects */
            .glow-brand {
                box-shadow: 0 0 40px rgba(37, 99, 235, 0.15);
            }
            
            /* Card Hover */
            .card-hover {
                transition: all 0.3s ease;
            }
            .card-hover:hover {
                border-color: #2563EB;
                box-shadow: 0 0 0 1px rgba(37, 99, 235, 0.4), 0 20px 40px rgba(0, 0, 0, 0.3);
                transform: translateY(-4px);
            }
            
            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }
            ::-webkit-scrollbar-track {
                background: #0B1220;
            }
            ::-webkit-scrollbar-thumb {
                background: #334155;
                border-radius: 4px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #475569;
            }
            
            /* Gradient Background Pattern */
            .gradient-pattern {
                background: radial-gradient(circle at 20% 50%, rgba(37, 99, 235, 0.1) 0%, transparent 50%),
                            radial-gradient(circle at 80% 80%, rgba(56, 189, 248, 0.1) 0%, transparent 50%);
            }
            
            /* Section Divider */
            .section-divider {
                height: 1px;
                background: linear-gradient(to right, transparent, rgba(37, 99, 235, 0.3), transparent);
            }
            
            /* Process Step Number */
            .process-step-number {
                position: relative;
            }
            .process-step-number::after {
                content: '';
                position: absolute;
                left: 50%;
                top: 100%;
                width: 2px;
                height: 2rem;
                background: linear-gradient(to bottom, rgba(37, 99, 235, 0.3), transparent);
                transform: translateX(-50%);
            }
            @media (min-width: 768px) {
                .process-step-number::after {
                    left: 100%;
                    top: 50%;
                    width: 2rem;
                    height: 2px;
                    background: linear-gradient(to right, rgba(37, 99, 235, 0.3), transparent);
                    transform: translateY(-50%);
                }
            }
            
            /* Icon Container */
            .icon-container {
                width: 48px;
                height: 48px;
                border-radius: 12px;
                background: linear-gradient(135deg, rgba(37, 99, 235, 0.2), rgba(56, 189, 248, 0.2));
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid rgba(37, 99, 235, 0.2);
            }
            
            
            /* Reduced motion */
            @media (prefers-reduced-motion: reduce) {
                *, *::before, *::after {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                }
            }
        </style>
    </head>
<body class="bg-app-background text-text-primary antialiased">
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden min-h-[500px] md:min-h-[600px] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/about-page-banner.jpg') }}" 
                alt="About Techbuds - Digital Solutions Team" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-4xl mx-auto text-center w-full z-10">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/20 border border-brand-primary/30 backdrop-blur-sm mb-6">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                <span class="text-xs font-medium text-white uppercase tracking-wider">About Techbuds</span>
            </div>
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-lg">
                Complete Digital Solutions<br>
                <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">For Growing Businesses</span>
            </h1>
            <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto leading-relaxed drop-shadow-md mb-8">
                Technology consulting and development partner helping businesses build high-performance digital systems that generate leads, build trust, and support long-term growth.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/25 hover:shadow-xl hover:shadow-brand-primary/30 hover:scale-105">
                    Schedule a Consultation
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg border border-white/30 text-white font-semibold hover:border-white hover:bg-white/10 transition-all duration-200 backdrop-blur-sm">
                    Discover Our Services
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 bg-app-background gradient-pattern">
        <div class="max-w-6xl mx-auto">
            <!-- Our Story -->
            <div class="mb-12 md:mb-16" data-animate="fade-up">
                <div class="text-center mb-10 md:mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Our Story</span>
                    </div>
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-4">
                        Thoughtful digital solutions, <span class="text-gradient">built by experienced hands</span>
                    </h2>
                </div>

                <!-- Timeline -->
                <div class="relative max-w-4xl mx-auto">
                    <div class="absolute left-6 md:left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-primary to-border-default"></div>
                    
                    <div class="space-y-8 md:space-y-10">
                        <div class="relative pl-16 md:pl-20" data-animate="fade-up">
                            <div class="absolute left-4 md:left-6 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-app-background"></div>
                            <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">2019 – 2024</div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Experience Before the Brand</h3>
                            <p class="text-text-muted leading-relaxed text-sm md:text-base">We spent these years working independently across web development, application building, and system design — solving real business problems and sharpening our technical and creative expertise.</p>
                        </div>

                        <div class="relative pl-16 md:pl-20" data-animate="fade-up" data-delay="0.1">
                            <div class="absolute left-4 md:left-6 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-app-background"></div>
                            <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">Early 2025</div>
                            <h3 class="text-lg font-semibold text-heading mb-2">The Techbuds Idea</h3>
                            <p class="text-text-muted leading-relaxed text-sm md:text-base">With shared values around clean engineering, clarity, and reliability, the idea of <strong class="text-text-secondary">Techbuds</strong> took shape — bringing individual experience together under one focused digital identity.</p>
                        </div>

                        <div class="relative pl-16 md:pl-20" data-animate="fade-up" data-delay="0.2">
                            <div class="absolute left-4 md:left-6 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-app-background"></div>
                            <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">Mid 2025</div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Working as Techbuds</h3>
                            <p class="text-text-muted leading-relaxed text-sm md:text-base">We began collaborating as a small, hands-on team delivering modern websites, scalable applications, and performance-driven digital solutions for businesses and founders.</p>
                        </div>
                
                        <div class="relative pl-16 md:pl-20" data-animate="fade-up" data-delay="0.3">
                            <div class="absolute left-4 md:left-6 top-1 w-4 h-4 rounded-full bg-green-500 border-4 border-app-background animate-pulse"></div>
                            <div class="text-xs font-semibold text-green-500 uppercase tracking-wider mb-2">Today</div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Growing With Intention</h3>
                            <p class="text-text-muted leading-relaxed text-sm md:text-base">Techbuds operates as a freelance-led digital solutions team, focused on long-term partnerships, thoughtful execution, and sustainable growth — while laying the foundation for a formally registered entity in the future.</p>
                        </div>
                    </div>
                </div>

                <!-- Final Quote -->
                <div class="mt-10 md:mt-12 text-center" data-animate="fade-up" data-delay="0.4">
                    <blockquote class="max-w-2xl mx-auto">
                        <p class="text-lg md:text-xl font-display font-semibold text-heading italic leading-relaxed">
                            We believe good technology should be simple, reliable, and built to last.
                        </p>
                    </blockquote>
                </div>
            </div>

            <div class="section-divider my-8 md:my-12"></div>

            <!-- About Techbuds - Intro Section -->
            <div class="mb-12 md:mb-16" data-animate="fade-up">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                    <!-- Image Section - Left Side -->
                    <div class="relative order-1 lg:order-1" data-animate="fade-up" data-delay="0.1">
                        <div class="relative rounded-2xl overflow-hidden aspect-[4/5] lg:aspect-[3/4]">
                            <div class="absolute inset-0 bg-gradient-to-br from-brand-primary/20 via-brand-soft/10 to-transparent rounded-2xl"></div>
                            <img 
                                src="{{ asset('images/about page/1.jpg') }}" 
                                alt="Techbuds - Complete Digital Solutions Team"
                                class="w-full h-full object-cover relative z-10"
                                loading="lazy">
                            <!-- Decorative Element -->
                            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-brand-primary/10 rounded-full blur-3xl z-0"></div>
                            <div class="absolute -top-6 -left-6 w-24 h-24 bg-brand-soft/10 rounded-full blur-2xl z-0"></div>
                    </div>
                    </div>

                    <!-- Content Section - Right Side -->
                    <div class="order-1 lg:order-2" data-animate="fade-up">
                        <div class="space-y-6">
                            <!-- Section Label -->
                            <div class="inline-flex items-center gap-2 mb-4">
                                <div class="h-px w-8 bg-gradient-to-r from-brand-primary to-transparent"></div>
                                <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">Who We Are</span>
                                <div class="h-px w-8 bg-gradient-to-l from-brand-primary to-transparent"></div>
                            </div>

                            <!-- Main Heading -->
                            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-heading leading-tight">
                                About <span class="text-gradient">Techbuds</span>
                    </h2>

                            <!-- Subheading -->
                            <h3 class="font-display text-xl md:text-2xl font-semibold text-text-secondary">
                                Complete Digital Solutions for Growing Businesses
                            </h3>

                            <!-- Content Paragraphs -->
                            <div class="space-y-4 pt-3">
                                <p class="text-base md:text-lg text-text-muted leading-relaxed">
                                    Techbuds is a technology consulting and development partner helping businesses build <strong class="text-text-primary font-semibold">high-performance digital systems</strong> that generate leads, build trust, and support long-term growth.
                                </p>
                                <p class="text-base md:text-lg text-text-muted leading-relaxed">
                                    We specialize in <strong class="text-text-primary font-semibold">web development, SEO-focused platforms, branding systems, and scalable infrastructure</strong>—designed as one connected ecosystem rather than isolated services.
                    </p>
                </div>
                
                            <!-- Highlight Statement -->
                            <div class="relative mt-6 pt-6 border-t border-border-default">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="w-1.5 h-1.5 rounded-full bg-brand-primary"></div>
                                    </div>
                                    <p class="text-lg md:text-xl font-semibold text-heading leading-relaxed">
                                        Our focus is simple: <span class="text-gradient">deliver practical digital solutions that create measurable business impact.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-divider my-8 md:my-12"></div>
        </div>
    </section>

    <!-- Business-First Digital Strategy - Unique Compact Layout -->
    <section class="relative py-12 md:py-16 flex items-center overflow-hidden">
        <!-- Unique Background Pattern -->
        <div class="absolute inset-0 opacity-40">
            <!-- Diagonal Stripes Pattern -->
            <div class="absolute inset-0" style="background-image: repeating-linear-gradient(135deg, transparent, transparent 2px, rgba(37, 99, 235, 0.03) 2px, rgba(37, 99, 235, 0.03) 4px);"></div>
            <!-- Dot Grid Pattern -->
            <div class="absolute inset-0" style="background-image: radial-gradient(circle, rgba(37, 99, 235, 0.08) 1px, transparent 1px); background-size: 24px 24px;"></div>
            <!-- Gradient Orbs -->
            <div class="absolute top-1/4 -left-1/4 w-96 h-96 bg-brand-primary/5 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-1/4 -right-1/4 w-96 h-96 bg-brand-soft/5 rounded-full blur-[100px]"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8 md:gap-10 lg:gap-12 items-center">
                <!-- Left Side - Content -->
                <div class="py-4 md:py-0" data-animate="fade-up">
                    <div class="space-y-4 md:space-y-5">
                        <!-- Section Badge -->
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-primary/10 border border-brand-primary/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                            <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">Our Approach</span>
                        </div>

                        <!-- Main Heading -->
                        <div>
                            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-heading leading-tight mb-3">
                                Business-First<br>
                                <span class="text-gradient">Digital Strategy</span>
                            </h2>
                            <div class="h-0.5 w-16 bg-gradient-to-r from-brand-primary to-transparent mt-4"></div>
                        </div>

                        <!-- Subheading -->
                        <p class="text-lg md:text-xl font-semibold text-text-secondary">
                            Strategy Before Execution
                        </p>

                        <!-- Intro Text -->
                        <p class="text-base md:text-lg text-text-muted leading-relaxed">
                            Before we design or develop anything, we focus on understanding your business.
                        </p>

                        <!-- Bottom Statement -->
                        <div class="pt-6 border-t border-border-default/50">
                            <p class="text-base md:text-lg text-text-secondary leading-relaxed mb-4">
                                This allows us to recommend <strong class="text-text-primary font-semibold">only what is required for your business today</strong>, while planning for future expansion—saving time, cost, and complexity.
                            </p>
                            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-brand-primary hover:text-brand-soft text-sm font-medium transition-colors">
                                Discuss your business needs
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                            </a>
                                </div>
                            </div>
                                    </div>

                <!-- Right Side - Focus Areas in Unique Layout -->
                <div class="py-8 md:py-0" data-animate="fade-up" data-delay="0.2">
                    <div class="space-y-4 md:space-y-5">
                        <!-- Focus Item 1 -->
                        <div class="relative group">
                            <div class="absolute -left-2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-primary via-brand-soft to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="flex items-start gap-4 p-4 md:p-5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/30 hover:bg-surface-1 transition-all duration-300">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20">
                                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                        </svg>
                                    </div>
                                    </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-heading mb-1.5 text-sm md:text-base">Business Model & Revenue Goals</h4>
                                    <p class="text-text-muted text-xs md:text-sm leading-relaxed">Understanding your core business and growth objectives</p>
                                    </div>
                                    </div>
                        </div>

                        <!-- Focus Item 2 -->
                        <div class="relative group">
                            <div class="absolute -left-2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-primary via-brand-soft to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="flex items-start gap-4 p-4 md:p-5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/30 hover:bg-surface-1 transition-all duration-300">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20">
                                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-heading mb-1.5 text-sm md:text-base">Target Audience & Buyer Intent</h4>
                                    <p class="text-text-muted text-xs md:text-sm leading-relaxed">Identifying who you serve and how they make decisions</p>
                                </div>
                            </div>
                        </div>

                        <!-- Focus Item 3 -->
                        <div class="relative group">
                            <div class="absolute -left-2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-primary via-brand-soft to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="flex items-start gap-4 p-4 md:p-5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/30 hover:bg-surface-1 transition-all duration-300">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20">
                                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                            </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-heading mb-1.5 text-sm md:text-base">Current Digital Challenges</h4>
                                    <p class="text-text-muted text-xs md:text-sm leading-relaxed">Analyzing gaps and opportunities in your digital presence</p>
                                    </div>
                                    </div>
                                    </div>

                        <!-- Focus Item 4 -->
                        <div class="relative group">
                            <div class="absolute -left-2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-primary via-brand-soft to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="flex items-start gap-4 p-4 md:p-5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/30 hover:bg-surface-1 transition-all duration-300">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20">
                                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                        </svg>
                        </div>
                    </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-heading mb-1.5 text-sm md:text-base">Growth Stage & Scalability</h4>
                                    <p class="text-text-muted text-xs md:text-sm leading-relaxed">Planning for today's needs and tomorrow's expansion</p>
                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services Work Together - Unique Full-Height Layout -->
    <section class="relative py-12 md:py-0 h-auto md:h-screen flex items-center overflow-hidden">
        <!-- Unique Background Pattern -->
        <div class="absolute inset-0 opacity-30">
            <!-- Circular Pattern -->
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(37, 99, 235, 0.1) 1px, transparent 0); background-size: 40px 40px;"></div>
            <!-- Wave Pattern -->
            <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(56, 189, 248, 0.03) 35px, rgba(56, 189, 248, 0.03) 70px);"></div>
            <!-- Corner Accents -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-brand-primary/5 rounded-full blur-[120px] -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-brand-soft/5 rounded-full blur-[120px] -ml-32 -mb-32"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-0">
            <div class="grid md:grid-cols-2 md:h-full md:max-h-[900px] gap-8 md:gap-12 lg:gap-16 items-center">
                <!-- Left Side - Services List -->
                <div class="space-y-6 md:space-y-4" data-animate="fade-up">
                    <!-- Header -->
                    <div class="mb-6 md:mb-8">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-4">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                            <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">Our Services</span>
                        </div>
                        <h2 class="font-display text-2xl md:text-3xl lg:text-4xl font-bold text-heading mb-2 leading-tight">
                            Our Services Work<br>
                            <span class="text-gradient">Together</span>
                        </h2>
                        <p class="text-sm md:text-base text-text-muted">
                            A Connected Digital Ecosystem
                    </p>
                </div>

                    <!-- Services List - Vertical Compact Layout -->
                    <div class="space-y-3 md:space-y-2.5">
                        <!-- Service 1: Web Development -->
                        <a href="{{ route('services.show', 'web-development') }}" class="group relative flex items-center gap-3 p-3 md:p-3.5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/40 hover:bg-surface-1 transition-all duration-300">
                            <div class="flex-shrink-0 w-8 h-8 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20 group-hover:border-brand-primary/40 group-hover:bg-brand-primary/10 transition-all">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-0.5 group-hover:text-brand-primary transition-colors">Website Development</h4>
                                <p class="text-text-muted text-xs md:text-sm line-clamp-1">Fast, secure, SEO-ready websites</p>
                            </div>
                            <svg class="w-4 h-4 text-brand-primary/0 group-hover:text-brand-primary flex-shrink-0 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <!-- Service 2: Mobile App Development -->
                        <a href="{{ route('services.show', 'mobile-app-development') }}" class="group relative flex items-center gap-3 p-3 md:p-3.5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/40 hover:bg-surface-1 transition-all duration-300">
                            <div class="flex-shrink-0 w-8 h-8 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20 group-hover:border-brand-primary/40 group-hover:bg-brand-primary/10 transition-all">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-0.5 group-hover:text-brand-primary transition-colors">App Development</h4>
                                <p class="text-text-muted text-xs md:text-sm line-clamp-1">Android & iOS applications</p>
                            </div>
                            <svg class="w-4 h-4 text-brand-primary/0 group-hover:text-brand-primary flex-shrink-0 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <!-- Service 3: SEO Services -->
                        <a href="{{ route('services.show', 'seo-digital-marketing') }}" class="group relative flex items-center gap-3 p-3 md:p-3.5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/40 hover:bg-surface-1 transition-all duration-300">
                            <div class="flex-shrink-0 w-8 h-8 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20 group-hover:border-brand-primary/40 group-hover:bg-brand-primary/10 transition-all">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-0.5 group-hover:text-brand-primary transition-colors">Search Engine Optimization</h4>
                                <p class="text-text-muted text-xs md:text-sm line-clamp-1">SEO strategies for organic traffic</p>
                            </div>
                            <svg class="w-4 h-4 text-brand-primary/0 group-hover:text-brand-primary flex-shrink-0 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <!-- Service 4: Branding & Content -->
                        <a href="{{ route('services.show', 'brand-experience-content-marketing') }}" class="group relative flex items-center gap-3 p-3 md:p-3.5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/40 hover:bg-surface-1 transition-all duration-300">
                            <div class="flex-shrink-0 w-8 h-8 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20 group-hover:border-brand-primary/40 group-hover:bg-brand-primary/10 transition-all">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-0.5 group-hover:text-brand-primary transition-colors">Branding & Content</h4>
                                <p class="text-text-muted text-xs md:text-sm line-clamp-1">Build authority and trust</p>
                            </div>
                            <svg class="w-4 h-4 text-brand-primary/0 group-hover:text-brand-primary flex-shrink-0 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <!-- Service 5: Web Hosting & Deployment -->
                        <a href="{{ route('services.show', 'web-hosting-app-deployment-support') }}" class="group relative flex items-center gap-3 p-3 md:p-3.5 rounded-lg bg-surface-1/50 border border-border-default/50 hover:border-brand-primary/40 hover:bg-surface-1 transition-all duration-300">
                            <div class="flex-shrink-0 w-8 h-8 md:w-10 md:h-10 rounded-lg bg-gradient-to-br from-brand-primary/20 to-brand-soft/20 flex items-center justify-center border border-brand-primary/20 group-hover:border-brand-primary/40 group-hover:bg-brand-primary/10 transition-all">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-0.5 group-hover:text-brand-primary transition-colors">Web Hosting & Deployment</h4>
                                <p class="text-text-muted text-xs md:text-sm line-clamp-1">Scalable infrastructure solutions</p>
                            </div>
                            <svg class="w-4 h-4 text-brand-primary/0 group-hover:text-brand-primary flex-shrink-0 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Side - CTA & Summary with Background Image -->
                <div class="relative h-full min-h-[500px] md:min-h-[600px] rounded-xl overflow-hidden" data-animate="fade-up" data-delay="0.2">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        <img 
                            src="{{ asset('images/about page/2.jpg') }}" 
                            alt="Technology consulting and digital solutions"
                            class="w-full h-full object-cover"
                            loading="lazy">
                        <!-- Lighter Gradient Overlay for better image visibility -->
                        <div class="absolute inset-0 bg-gradient-to-b from-app-background/50 via-app-background/40 to-app-background/50"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-app-background/60 via-transparent to-app-background/50"></div>
                    </div>

                    <!-- Content Overlay - Centered -->
                    <div class="relative z-10 h-full flex items-center justify-center p-6 md:p-8 lg:p-10">
                        <div class="w-full max-w-md space-y-6 md:space-y-6">
                            <!-- Value Proposition -->
                            <div class="space-y-4">
                                <p class="text-base md:text-lg text-white leading-relaxed drop-shadow-lg font-medium">
                                    We align all services to support a single goal: <strong class="font-bold text-white">business growth</strong>.
                                </p>
                                <p class="text-sm md:text-base text-white/95 leading-relaxed drop-shadow-md">
                                    Each service strengthens the others, resulting in <strong class="font-semibold text-white">a complete solution—not fragmented delivery</strong>.
                                </p>
                            </div>

                            <!-- Primary CTA Button -->
                            <a href="{{ route('services') }}" class="inline-flex items-center justify-center gap-2 w-full px-6 py-3.5 md:py-4 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/50 hover:shadow-xl hover:shadow-brand-primary/60 hover:scale-[1.02] text-sm md:text-base">
                                Explore All Services
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>

                            <!-- Secondary Links -->
                            <div class="flex flex-wrap gap-3 md:gap-4 pt-2">
                                <a href="{{ route('contact') }}" class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 px-4 md:px-6 py-2.5 md:py-3 rounded-lg border-2 border-white/40 bg-white/15 backdrop-blur-md text-white font-medium hover:border-white hover:bg-white/25 transition-all duration-200 text-xs md:text-sm shadow-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                    Get Quote
                                </a>
                                <a href="{{ route('services') }}" class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 px-4 md:px-6 py-2.5 md:py-3 rounded-lg border-2 border-white/40 bg-white/15 backdrop-blur-md text-white font-medium hover:border-white hover:bg-white/25 transition-all duration-200 text-xs md:text-sm shadow-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content - Continue -->
    <section class="py-12 md:py-16 px-4 sm:px-6 lg:px-8 bg-app-background gradient-pattern">
        <div class="max-w-6xl mx-auto">

            <div class="section-divider my-8 md:my-12"></div>

            <!-- How We Prioritize Business Impact - Compact Modern Chart Design -->
            <div class="mb-8 md:mb-12" data-animate="fade-up">
                <div class="text-center mb-6 md:mb-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-4">
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Our Model</span>
                    </div>
                    <h2 class="font-display text-2xl md:text-3xl lg:text-4xl font-bold text-heading mb-2">
                        How We Prioritize <span class="text-gradient">Business Impact</span>
                    </h2>
                    <p class="text-sm md:text-base text-text-muted max-w-2xl mx-auto">
                        Based on real-world project outcomes, we prioritize digital investments by impact
                    </p>
                </div>
                
                <div class="max-w-6xl mx-auto">

                    <!-- Chart and Stats Grid -->
                    <div x-data="{ 
                        selectedSegment: null,
                        segments: {
                            website: { id: 'website', name: 'Website Foundation', percent: 30, color: '#2563eb', color2: '#3b82f6', description: 'Credibility, speed, security, and conversion.' },
                            seo: { id: 'seo', name: 'SEO & Organic Visibility', percent: 25, color: '#3b82f6', color2: '#60a5fa', description: 'Sustainable lead generation with long-term ROI.' },
                            branding: { id: 'branding', name: 'Branding & Content', percent: 20, color: '#60a5fa', color2: '#93c5fd', description: 'Trust, differentiation, and improved conversion rates.' },
                            apps: { id: 'apps', name: 'Applications & Infrastructure', percent: 25, color: '#93c5fd', color2: '#dbeafe', description: 'Retention, scalability, and operational reliability.' }
                        },
                        hoveredSegment: null,
                        selectSegment(id) {
                            this.selectedSegment = this.selectedSegment === id ? null : id;
                        },
                        isSelected(id) {
                            return this.selectedSegment === id;
                        },
                        isHovered(id) {
                            return this.hoveredSegment === id;
                        },
                        isActive(id) {
                            return this.isSelected(id) || this.isHovered(id);
                        }
                    }" class="grid lg:grid-cols-2 gap-6 lg:gap-8 items-start mb-6">
                        <!-- Left: Interactive Pie/Donut Chart -->
                        <div class="relative bg-surface-1 rounded-xl border border-border-default p-5 md:p-6 overflow-hidden">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 opacity-5">
                                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(37, 99, 235, 0.3) 1px, transparent 0); background-size: 20px 20px;"></div>
                            </div>
                            
                            <div class="relative z-10">
                                <h3 class="text-base md:text-lg font-semibold text-heading mb-4 text-center">Digital Solution Breakdown</h3>
                                
                                <!-- SVG Pie Chart with Interactive Segments -->
                                <div class="relative w-full max-w-[200px] md:max-w-[240px] mx-auto mb-4">
                                    <svg viewBox="0 0 120 120" class="w-full h-auto transform -rotate-90 cursor-pointer">
                                        <!-- Background Circle -->
                                        <circle cx="60" cy="60" r="50" fill="none" stroke="rgba(37, 99, 235, 0.1)" stroke-width="20"/>
                                        
                                        <!-- Website Foundation - 30% -->
                                        <circle 
                                            @mouseenter="hoveredSegment = 'website'"
                                            @mouseleave="hoveredSegment = null"
                                            @click="selectSegment('website')"
                                            cx="60" cy="60" r="50" 
                                            fill="none" 
                                            :stroke="segments.website.color"
                                            :stroke-width="isActive('website') ? 24 : 20"
                                            stroke-dasharray="94.248 314.16"
                                            stroke-dashoffset="0"
                                            :class="{
                                                'transition-all duration-300 ease-out cursor-pointer': true,
                                                'opacity-100': isActive('website') || !selectedSegment || selectedSegment === 'website',
                                                'opacity-40': selectedSegment && selectedSegment !== 'website'
                                            }"
                                            :style="`filter: drop-shadow(0 0 ${isActive('website') ? '12px' : '0px'} ${segments.website.color}80);`">
                                        </circle>
                                        
                                        <!-- SEO & Organic - 25% -->
                                        <circle 
                                            @mouseenter="hoveredSegment = 'seo'"
                                            @mouseleave="hoveredSegment = null"
                                            @click="selectSegment('seo')"
                                            cx="60" cy="60" r="50" 
                                            fill="none" 
                                            :stroke="segments.seo.color"
                                            :stroke-width="isActive('seo') ? 24 : 20"
                                            stroke-dasharray="78.54 314.16"
                                            stroke-dashoffset="-94.248"
                                            :class="{
                                                'transition-all duration-300 ease-out cursor-pointer': true,
                                                'opacity-100': isActive('seo') || !selectedSegment || selectedSegment === 'seo',
                                                'opacity-40': selectedSegment && selectedSegment !== 'seo'
                                            }"
                                            :style="`filter: drop-shadow(0 0 ${isActive('seo') ? '12px' : '0px'} ${segments.seo.color}80);`">
                                        </circle>
                                        
                                        <!-- Branding & Content - 20% -->
                                        <circle 
                                            @mouseenter="hoveredSegment = 'branding'"
                                            @mouseleave="hoveredSegment = null"
                                            @click="selectSegment('branding')"
                                            cx="60" cy="60" r="50" 
                                            fill="none" 
                                            :stroke="segments.branding.color"
                                            :stroke-width="isActive('branding') ? 24 : 20"
                                            stroke-dasharray="62.832 314.16"
                                            stroke-dashoffset="-172.788"
                                            :class="{
                                                'transition-all duration-300 ease-out cursor-pointer': true,
                                                'opacity-100': isActive('branding') || !selectedSegment || selectedSegment === 'branding',
                                                'opacity-40': selectedSegment && selectedSegment !== 'branding'
                                            }"
                                            :style="`filter: drop-shadow(0 0 ${isActive('branding') ? '12px' : '0px'} ${segments.branding.color}80);`">
                                        </circle>
                                        
                                        <!-- Applications & Infrastructure - 25% -->
                                        <circle 
                                            @mouseenter="hoveredSegment = 'apps'"
                                            @mouseleave="hoveredSegment = null"
                                            @click="selectSegment('apps')"
                                            cx="60" cy="60" r="50" 
                                            fill="none" 
                                            :stroke="segments.apps.color"
                                            :stroke-width="isActive('apps') ? 24 : 20"
                                            stroke-dasharray="78.54 314.16"
                                            stroke-dashoffset="-235.62"
                                            :class="{
                                                'transition-all duration-300 ease-out cursor-pointer': true,
                                                'opacity-100': isActive('apps') || !selectedSegment || selectedSegment === 'apps',
                                                'opacity-40': selectedSegment && selectedSegment !== 'apps'
                                            }"
                                            :style="`filter: drop-shadow(0 0 ${isActive('apps') ? '12px' : '0px'} ${segments.apps.color}80);`">
                                        </circle>
                                    </svg>
                                    
                                    <!-- Interactive Center Display -->
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-center transition-all duration-300">
                                            <template x-if="selectedSegment && segments[selectedSegment]">
                                                <div>
                                                    <div :style="`color: ${segments[selectedSegment].color}`" class="text-xl md:text-2xl font-bold mb-0.5" x-text="segments[selectedSegment].percent + '%'"></div>
                                                    <div class="text-xs font-medium text-text-primary leading-tight px-2" x-text="segments[selectedSegment].name"></div>
                                                </div>
                                            </template>
                                            <template x-if="!selectedSegment">
                                                <div>
                                                    <div class="text-2xl md:text-3xl font-bold text-brand-primary">100%</div>
                                                    <div class="text-xs text-text-muted mt-0.5">Total Solution</div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>

                                <!-- Compact Interactive Legend -->
                                <div class="grid grid-cols-2 gap-2">
                                    <template x-for="(segment, key) in segments" :key="key">
                                        <div 
                                            @mouseenter="hoveredSegment = key"
                                            @mouseleave="hoveredSegment = null"
                                            @click="selectSegment(key)"
                                            :class="{
                                                'bg-brand-primary/10 border-brand-primary/30': isActive(key),
                                                'border-border-default': !isActive(key)
                                            }"
                                            class="flex items-center gap-2 p-2 rounded-lg border cursor-pointer transition-all duration-300">
                                            <div 
                                                :style="`background-color: ${segment.color}`"
                                                :class="{
                                                    'w-3.5 h-3.5': isActive(key),
                                                    'w-3 h-3': !isActive(key)
                                                }"
                                                class="rounded-full transition-all duration-300 flex-shrink-0"></div>
                                            <span 
                                                :class="{
                                                    'text-text-primary font-semibold text-xs': isActive(key),
                                                    'text-text-secondary text-xs': !isActive(key)
                                                }"
                                                class="transition-all duration-300 leading-tight truncate"
                                                x-text="segment.name + ' (' + segment.percent + '%)'"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Compact Interactive Comparison Bar Chart -->
                        <div class="space-y-3">
                            <template x-for="(segment, key) in segments" :key="key">
                                <div 
                                    @mouseenter="hoveredSegment = key"
                                    @mouseleave="hoveredSegment = null"
                                    @click="selectSegment(key)"
                                    :class="{
                                        'border-brand-primary/60 bg-brand-primary/5 shadow-md': isActive(key),
                                        'border-border-default': !isActive(key)
                                    }"
                                    class="bg-surface-1 rounded-lg border p-4 transition-all duration-300 cursor-pointer group">
                                    <div class="flex items-center justify-between mb-2.5">
                                        <h4 
                                            :class="{
                                                'text-brand-primary': isActive(key),
                                                'text-heading': !isActive(key)
                                            }"
                                            class="font-semibold text-base md:text-lg transition-colors duration-300"
                                            x-text="segment.name"></h4>
                                        <span 
                                            :style="`color: ${segment.color}`"
                                            :class="{
                                                'text-2xl scale-105': isActive(key),
                                                'text-xl': !isActive(key)
                                            }"
                                            class="font-bold transition-all duration-300"
                                            x-text="segment.percent + '%'"></span>
                                    </div>
                                    <div class="relative h-2.5 bg-surface-2 rounded-full overflow-hidden mb-2">
                                        <div 
                                            :style="`width: ${segment.percent}%; background: linear-gradient(to right, ${segment.color}, ${segment.color2});`"
                                            :class="{
                                                'h-3 -mt-0.5 shadow-md': isActive(key),
                                                'h-2.5': !isActive(key)
                                            }"
                                            class="absolute inset-y-0 left-0 rounded-full transition-all duration-300 ease-out"></div>
                                    </div>
                                    <p 
                                        :class="{
                                            'text-text-primary': isActive(key),
                                            'text-text-muted': !isActive(key)
                                        }"
                                        class="text-xs md:text-sm transition-colors duration-300 leading-relaxed"
                                        x-text="segment.description"></p>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Bottom Statement -->
                    <div class="bg-gradient-to-r from-brand-primary/10 via-brand-soft/10 to-brand-primary/10 rounded-lg border border-brand-primary/20 p-4 md:p-5 text-center backdrop-blur-sm">
                        <p class="text-sm md:text-base text-text-secondary leading-relaxed mb-3">
                            This ensures your investment is aligned with <strong class="text-text-primary font-semibold">what drives results—not trends</strong>.
                        </p>
                        <a href="{{ route('services') }}" class="inline-flex items-center gap-2 text-brand-primary hover:text-brand-soft text-xs md:text-sm font-medium transition-colors">
                            See how we prioritize services for maximum impact
                            <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="section-divider my-8 md:my-12"></div>

            <!-- Why Businesses Choose Techbuds - Vertical Timeline Design -->
            <div class="mb-8 md:mb-12" data-animate="fade-up">
                <div class="text-center mb-6 md:mb-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-4">
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Why Choose Us</span>
                    </div>
                    <h2 class="font-display text-2xl md:text-3xl lg:text-4xl font-bold text-heading mb-2">
                        Why Businesses Choose <span class="text-gradient">Techbuds</span>
                    </h2>
                    <p class="text-sm md:text-base text-text-muted max-w-2xl mx-auto">
                        Trusted, Transparent, and Outcome-Driven
                    </p>
                </div>

                <div class="max-w-3xl mx-auto">
                    <!-- Vertical Timeline Style -->
                    <div class="relative">
                        <!-- Timeline Line -->
                        <div class="absolute left-4 md:left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-primary/30 via-brand-primary/50 to-brand-primary/30"></div>
                        
                        <div class="space-y-4 md:space-y-5">
                            <!-- Item 1 -->
                            <div class="relative pl-12 md:pl-16">
                                <div class="absolute left-2 md:left-4 top-2 w-4 h-4 md:w-5 md:h-5 rounded-full bg-brand-primary border-4 border-app-background shadow-lg"></div>
                                <div class="bg-surface-1 rounded-lg border border-border-default p-4 md:p-5 hover:border-brand-primary/40 transition-all duration-300">
                                    <h4 class="font-semibold text-heading text-base md:text-lg mb-1.5">Technology Advisors, Not Sales Agents</h4>
                                    <p class="text-text-muted text-sm">We act as trusted advisors who prioritize your business success over quick sales.</p>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="relative pl-12 md:pl-16">
                                <div class="absolute left-2 md:left-4 top-2 w-4 h-4 md:w-5 md:h-5 rounded-full bg-brand-primary border-4 border-app-background shadow-lg"></div>
                                <div class="bg-surface-1 rounded-lg border border-border-default p-4 md:p-5 hover:border-brand-primary/40 transition-all duration-300">
                                    <h4 class="font-semibold text-heading text-base md:text-lg mb-1.5">Clear Priority Guidance</h4>
                                    <p class="text-text-muted text-sm">We clearly explain what you need now vs. what can wait for later.</p>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="relative pl-12 md:pl-16">
                                <div class="absolute left-2 md:left-4 top-2 w-4 h-4 md:w-5 md:h-5 rounded-full bg-brand-primary border-4 border-app-background shadow-lg"></div>
                                <div class="bg-surface-1 rounded-lg border border-border-default p-4 md:p-5 hover:border-brand-primary/40 transition-all duration-300">
                                    <h4 class="font-semibold text-heading text-base md:text-lg mb-1.5">No Unnecessary Complexity</h4>
                                    <p class="text-text-muted text-sm">We avoid over-engineering and unnecessary complexity in our solutions.</p>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="relative pl-12 md:pl-16">
                                <div class="absolute left-2 md:left-4 top-2 w-4 h-4 md:w-5 md:h-5 rounded-full bg-brand-primary border-4 border-app-background shadow-lg"></div>
                                <div class="bg-surface-1 rounded-lg border border-border-default p-4 md:p-5 hover:border-brand-primary/40 transition-all duration-300">
                                    <h4 class="font-semibold text-heading text-base md:text-lg mb-1.5">Scalable Solutions</h4>
                                    <p class="text-text-muted text-sm">We build solutions that scale with your business as it grows.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom CTA -->
                    <div class="mt-6 md:mt-8 text-center">
                        <p class="text-sm md:text-base text-text-secondary mb-3">
                            Our clients work with us because they want <strong class="text-text-primary font-semibold">clarity, reliability, and long-term value</strong>.
                        </p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-brand-primary hover:text-brand-soft text-xs md:text-sm font-medium transition-colors">
                            Experience our transparent approach
                            <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="section-divider my-8 md:my-12"></div>

            <!-- Who We Work With - Badge/Tag Design -->
            <div class="mb-8 md:mb-12" data-animate="fade-up" data-delay="0.2">
                <div class="text-center mb-6 md:mb-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-4">
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Partnership</span>
                    </div>
                    <h2 class="font-display text-2xl md:text-3xl lg:text-4xl font-bold text-heading mb-2">
                        Who We <span class="text-gradient">Work With</span>
                    </h2>
                    <p class="text-sm md:text-base text-text-muted max-w-2xl mx-auto">
                        Built for Growth-Focused Businesses
                    </p>
                </div>
                
                <div class="max-w-4xl mx-auto">
                    <!-- Compact Badge Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
                        <!-- Badge 1 -->
                        <div class="group relative bg-gradient-to-br from-surface-1 to-surface-2 rounded-xl border border-border-default p-4 md:p-5 hover:border-brand-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg bg-brand-primary/10 flex items-center justify-center mb-3 group-hover:bg-brand-primary/20 transition-colors">
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-1.5">Startups</h4>
                                <p class="text-text-muted text-xs leading-relaxed">Building digital foundation</p>
                            </div>
                        </div>

                        <!-- Badge 2 -->
                        <div class="group relative bg-gradient-to-br from-surface-1 to-surface-2 rounded-xl border border-border-default p-4 md:p-5 hover:border-brand-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg bg-brand-primary/10 flex items-center justify-center mb-3 group-hover:bg-brand-primary/20 transition-colors">
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-1.5">SMBs</h4>
                                <p class="text-text-muted text-xs leading-relaxed">Seeking consistent growth</p>
                            </div>
                        </div>

                        <!-- Badge 3 -->
                        <div class="group relative bg-gradient-to-br from-surface-1 to-surface-2 rounded-xl border border-border-default p-4 md:p-5 hover:border-brand-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg bg-brand-primary/10 flex items-center justify-center mb-3 group-hover:bg-brand-primary/20 transition-colors">
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-1.5">Service Companies</h4>
                                <p class="text-text-muted text-xs leading-relaxed">Building trust & authority</p>
                            </div>
                        </div>

                        <!-- Badge 4 -->
                        <div class="group relative bg-gradient-to-br from-surface-1 to-surface-2 rounded-xl border border-border-default p-4 md:p-5 hover:border-brand-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-10 h-10 md:w-12 md:h-12 rounded-lg bg-brand-primary/10 flex items-center justify-center mb-3 group-hover:bg-brand-primary/20 transition-colors">
                                    <svg class="w-5 h-5 md:w-6 md:h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-heading text-sm md:text-base mb-1.5">Founders</h4>
                                <p class="text-text-muted text-xs leading-relaxed">Long-term partnerships</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-divider my-8 md:my-12"></div>

            <!-- Our Commitment to Results - Metrics/Stat Design -->
            <div class="mb-8 md:mb-12" data-animate="fade-up" data-delay="0.3">
                <div class="text-center mb-6 md:mb-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-4">
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Our Commitment</span>
                    </div>
                    <h2 class="font-display text-2xl md:text-3xl lg:text-4xl font-bold text-heading mb-2">
                        Our Commitment to <span class="text-gradient">Results</span>
                    </h2>
                    <p class="text-sm md:text-base text-text-muted max-w-2xl mx-auto">
                        More Than Delivery — A Partnership
                    </p>
                </div>

                <div class="max-w-5xl mx-auto">
                    <!-- Metrics Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mb-6 md:mb-8">
                        <!-- Metric 1 -->
                        <div class="bg-gradient-to-br from-brand-primary/10 to-brand-soft/5 rounded-lg border border-brand-primary/20 p-4 text-center hover:border-brand-primary/40 hover:shadow-md transition-all duration-300">
                            <div class="w-8 h-8 md:w-10 md:h-10 mx-auto mb-2 rounded-lg bg-brand-primary/20 flex items-center justify-center">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-heading text-xs md:text-sm mb-1">Lead Quality</h4>
                            <p class="text-text-muted text-xs leading-tight">High-converting leads</p>
                        </div>

                        <!-- Metric 2 -->
                        <div class="bg-gradient-to-br from-brand-primary/10 to-brand-soft/5 rounded-lg border border-brand-primary/20 p-4 text-center hover:border-brand-primary/40 hover:shadow-md transition-all duration-300">
                            <div class="w-8 h-8 md:w-10 md:h-10 mx-auto mb-2 rounded-lg bg-brand-primary/20 flex items-center justify-center">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-heading text-xs md:text-sm mb-1">Performance</h4>
                            <p class="text-text-muted text-xs leading-tight">Reliable systems</p>
                        </div>

                        <!-- Metric 3 -->
                        <div class="bg-gradient-to-br from-brand-primary/10 to-brand-soft/5 rounded-lg border border-brand-primary/20 p-4 text-center hover:border-brand-primary/40 hover:shadow-md transition-all duration-300">
                            <div class="w-8 h-8 md:w-10 md:h-10 mx-auto mb-2 rounded-lg bg-brand-primary/20 flex items-center justify-center">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-heading text-xs md:text-sm mb-1">Visibility</h4>
                            <p class="text-text-muted text-xs leading-tight">Search growth</p>
                        </div>

                        <!-- Metric 4 -->
                        <div class="bg-gradient-to-br from-brand-primary/10 to-brand-soft/5 rounded-lg border border-brand-primary/20 p-4 text-center hover:border-brand-primary/40 hover:shadow-md transition-all duration-300">
                            <div class="w-8 h-8 md:w-10 md:h-10 mx-auto mb-2 rounded-lg bg-brand-primary/20 flex items-center justify-center">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-heading text-xs md:text-sm mb-1">Confidence</h4>
                            <p class="text-text-muted text-xs leading-tight">Business trust</p>
                        </div>
                    </div>

                    <!-- Bottom Statement -->
                    <div class="bg-gradient-to-r from-brand-primary/10 via-brand-soft/10 to-brand-primary/10 rounded-lg border border-brand-primary/20 p-4 md:p-5 text-center backdrop-blur-sm">
                        <p class="text-sm md:text-base text-text-secondary leading-relaxed mb-3">
                            Our goal is to ensure your digital presence <strong class="text-text-primary font-semibold">supports revenue, not just appearance</strong>.
                        </p>
                        <div class="flex flex-wrap items-center justify-center gap-2 md:gap-3">
                            <a href="{{ route('contact') }}" class="text-brand-primary hover:text-brand-soft text-xs md:text-sm font-medium inline-flex items-center gap-1 transition-colors">
                                Start measuring results
                                <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <span class="text-text-muted text-xs">•</span>
                            <a href="{{ route('services') }}" class="text-brand-primary hover:text-brand-soft text-xs md:text-sm font-medium inline-flex items-center gap-1 transition-colors">
                                Explore services
                                <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-divider my-24"></div>
        </div>
    </section>

    <!-- Technology That Works - Compact Split Design -->
    <section class="py-10 md:py-12 px-4 sm:px-6 lg:px-8 bg-app-background relative overflow-hidden">
        <!-- Subtle Background Pattern -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(37, 99, 235, 0.08) 1px, transparent 0); background-size: 32px 32px;"></div>
        </div>
        
        <div class="relative max-w-5xl mx-auto">
            <div class="grid md:grid-cols-2 gap-6 md:gap-8 items-center">
                <!-- Left: Content -->
                <div class="text-center md:text-left">
                    <h2 class="font-display text-2xl md:text-3xl lg:text-4xl font-bold text-heading mb-3">
                        Technology That Works for <span class="text-gradient">Your Business</span>
                    </h2>
                    <p class="text-sm md:text-base text-text-secondary leading-relaxed mb-4">
                        We believe technology should simplify growth—not complicate it. If you're looking for a partner to deliver <strong class="text-text-primary">complete digital solutions</strong> aligned with your business goals, let's build a digital system that generates leads and supports your business growth.
                    </p>
                    <p class="text-xs md:text-sm text-text-muted leading-relaxed">
                        Schedule a consultation and discover what your business actually needs. <span class="text-text-secondary">No pressure, just honest advice.</span>
                    </p>
                </div>

                <!-- Right: CTA Actions -->
                <div class="space-y-3">
                    <!-- Primary CTA -->
                    <a href="{{ route('contact') }}" class="group w-full md:w-auto flex items-center justify-center gap-2 px-6 py-3.5 md:py-4 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/25 hover:shadow-xl hover:shadow-brand-primary/30 hover:scale-[1.02] text-sm md:text-base">
                        Schedule a Consultation
                        <svg class="w-4 h-4 md:w-5 md:h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>

                    <!-- Secondary Links -->
                    <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border-2 border-border-default text-text-primary font-medium hover:border-brand-primary hover:text-brand-primary hover:bg-brand-primary/5 transition-all duration-200 text-xs md:text-sm">
                            Contact Us
                        </a>
                        <a href="{{ route('services') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border-2 border-border-default text-text-primary font-medium hover:border-brand-primary hover:text-brand-primary hover:bg-brand-primary/5 transition-all duration-200 text-xs md:text-sm">
                            Our Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

    <!-- Animation Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
    <script>
        window.addEventListener('load', () => {
            if (!window.gsap || !window.ScrollTrigger) return;

            gsap.registerPlugin(ScrollTrigger);

            // Fade up animations
            gsap.utils.toArray('[data-animate="fade-up"]').forEach((el) => {
                const delay = parseFloat(el.dataset.delay || '0');
                gsap.from(el, {
                    duration: 0.8,
                    opacity: 0,
                    y: 30,
                    ease: 'power3.out',
                    delay,
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 85%',
                        once: true
                    }
                });
            });

        });
    </script>

    <!-- Structured Data for SEO -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Techbuds',
        'description' => 'Technology consulting and development partner providing complete digital solutions including web development, SEO, branding, and scalable infrastructure for growing businesses.',
        'url' => url('/'),
        'logo' => asset('images/techbuds-light.png'),
        'sameAs' => [],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'email' => 'techbuds57@gmail.com',
            'telephone' => '+917092936243',
            'contactType' => 'Customer Service',
            'availableLanguage' => ['English']
        ],
        'areaServed' => 'Worldwide',
        'knowsAbout' => [
            'Complete Digital Solutions',
            'Web Development',
            'Search Engine Optimization',
            'SEO Services',
            'Branding and Content Marketing',
            'UI/UX Design',
            'Cloud Infrastructure',
            'DevOps',
            'Technology Consulting',
            'Digital Strategy',
            'Business Growth'
        ],
        'serviceType' => [
            'Technology Consulting',
            'Web Development',
            'SEO Services',
            'Digital Marketing',
            'Branding Services',
            'Cloud Solutions'
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    
    @include('components.whatsapp-float')
    
    <!-- Enhanced About Page Schema -->
    @php
        $aboutPageSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'AboutPage',
            'name' => 'About Techbuds - Complete Digital Solutions',
            'description' => 'Learn about Techbuds, a technology consulting partner delivering complete digital solutions including web development, SEO, branding, and scalable infrastructure for growing businesses.',
            'url' => url('/about'),
            'mainEntity' => [
                '@type' => 'Organization',
                'name' => 'Techbuds',
                'description' => 'Technology consulting and development partner helping businesses build high-performance digital systems that generate leads, build trust, and support long-term growth.',
                'url' => url('/'),
                'founder' => [
                    '@type' => 'Person',
                    'jobTitle' => 'Founder'
                ],
                'foundingDate' => '2025',
                'slogan' => 'Complete Digital Solutions for Growing Businesses'
            ],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Home',
                        'item' => url('/')
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'About',
                        'item' => url('/about')
                    ]
                ]
            ]
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($aboutPageSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
    </script>
    @include('components.schema.organization')
    @include('components.schema.breadcrumb', [
        'items' => [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'About', 'url' => url('/about')],
        ]
    ])
    </body>
</html>

