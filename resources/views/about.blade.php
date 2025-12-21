<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About Techbuds - Digital Solutions Team | Web Development, Mobile Apps, SEO</title>
        <meta name="description" content="Techbuds is an independent digital solutions team providing web development, mobile app development, SEO, UI/UX design, and AI-powered solutions. Founded by experienced developers with 4-5 years of industry experience.">
        <meta name="keywords" content="web development services, custom software development, freelance web developers, digital solutions for businesses, SEO-friendly websites, mobile app development services, UI/UX design, freelance developers Bangalore">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/about') }}">
        <meta property="og:title" content="About Techbuds - Digital Solutions Team">
        <meta property="og:description" content="Techbuds is an independent digital solutions team providing web development, mobile app development, SEO, UI/UX design, and AI-powered solutions.">
        
        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url('/about') }}">
        <meta property="twitter:title" content="About Techbuds - Digital Solutions Team">
        <meta property="twitter:description" content="Techbuds is an independent digital solutions team providing web development, mobile app development, SEO, UI/UX design, and AI-powered solutions.">

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
                Digital Solutions Team<br>
                <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">Built on Experience</span>
            </h1>
            <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto leading-relaxed drop-shadow-md">
                Techbuds is an independent digital solutions team providing web development, mobile app development, SEO, UI/UX design, and AI-powered solutions for startups, small businesses, and growing companies.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 bg-app-background gradient-pattern">
        <div class="max-w-6xl mx-auto">
            <!-- Our Story -->
            <div class="mb-24" data-animate="fade-up">
                <div class="text-center mb-16">
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
                    
                    <div class="space-y-12">
                        <div class="relative pl-16 md:pl-20" data-animate="fade-up">
                            <div class="absolute left-4 md:left-6 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-app-background"></div>
                            <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">2019 – 2024</div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Experience Before the Brand</h3>
                            <p class="text-text-muted leading-relaxed">We spent these years working independently across web development, application building, and system design — solving real business problems and sharpening our technical and creative expertise.</p>
                        </div>

                        <div class="relative pl-16 md:pl-20" data-animate="fade-up" data-delay="0.1">
                            <div class="absolute left-4 md:left-6 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-app-background"></div>
                            <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">Early 2025</div>
                            <h3 class="text-lg font-semibold text-heading mb-2">The Techbuds Idea</h3>
                            <p class="text-text-muted leading-relaxed">With shared values around clean engineering, clarity, and reliability, the idea of <strong class="text-text-secondary">Techbuds</strong> took shape — bringing individual experience together under one focused digital identity.</p>
                        </div>

                        <div class="relative pl-16 md:pl-20" data-animate="fade-up" data-delay="0.2">
                            <div class="absolute left-4 md:left-6 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-app-background"></div>
                            <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">Mid 2025</div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Working as Techbuds</h3>
                            <p class="text-text-muted leading-relaxed">We began collaborating as a small, hands-on team delivering modern websites, scalable applications, and performance-driven digital solutions for businesses and founders.</p>
                        </div>
                
                        <div class="relative pl-16 md:pl-20" data-animate="fade-up" data-delay="0.3">
                            <div class="absolute left-4 md:left-6 top-1 w-4 h-4 rounded-full bg-green-500 border-4 border-app-background animate-pulse"></div>
                            <div class="text-xs font-semibold text-green-500 uppercase tracking-wider mb-2">Today</div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Growing With Intention</h3>
                            <p class="text-text-muted leading-relaxed">Techbuds operates as a freelance-led digital solutions team, focused on long-term partnerships, thoughtful execution, and sustainable growth — while laying the foundation for a formally registered entity in the future.</p>
                        </div>
                    </div>
                </div>

                <!-- Final Quote -->
                <div class="mt-16 text-center" data-animate="fade-up" data-delay="0.4">
                    <blockquote class="max-w-2xl mx-auto">
                        <p class="text-xl md:text-2xl font-display font-semibold text-heading italic leading-relaxed">
                            We believe good technology should be simple, reliable, and built to last.
                        </p>
                    </blockquote>
                </div>
            </div>


            <!-- Who We Work With -->
            <div class="mb-24" data-animate="fade-up" data-delay="0.2">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Partnership</span>
                    </div>
                    <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-heading mb-4">
                        Who We <span class="text-gradient">Work With</span>
                    </h2>
                    <p class="text-lg text-text-muted max-w-3xl mx-auto leading-relaxed">
                        We work best with clients who value clarity, quality, and long-term outcomes.
                    </p>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-8 mb-8">
                    <div class="bg-surface-1 rounded-2xl border border-border-default p-8 card-hover relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-brand-primary/5 rounded-full -mr-16 -mt-16"></div>
                        <div class="relative">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="icon-container">
                                    <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-heading text-xl">Our Ideal Partners</h3>
                            </div>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-4">
                                    <div class="w-6 h-6 rounded-full bg-brand-primary/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                    </div>
                                    <span class="text-text-muted">Startups building MVPs or scaling digital products</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <div class="w-6 h-6 rounded-full bg-brand-primary/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                    </div>
                                    <span class="text-text-muted">Small and medium businesses modernizing their online presence</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <div class="w-6 h-6 rounded-full bg-brand-primary/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                    </div>
                                    <span class="text-text-muted">Founders and solo entrepreneurs needing reliable tech execution</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <div class="w-6 h-6 rounded-full bg-brand-primary/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                    </div>
                                    <span class="text-text-muted">Agencies looking for dependable development partners</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <div class="w-6 h-6 rounded-full bg-brand-primary/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                    </div>
                                    <span class="text-text-muted">Businesses seeking SEO-optimized, performance-focused websites</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-surface-1 rounded-2xl border border-border-default p-8 card-hover relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-text-muted/5 rounded-full -mr-16 -mt-16"></div>
                        <div class="relative">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="icon-container">
                                    <svg class="w-6 h-6 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-heading text-xl">Not the Right Fit</h3>
                            </div>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-4">
                                    <div class="w-6 h-6 rounded-full bg-text-muted/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-text-muted"></span>
                                    </div>
                                    <span class="text-text-muted">You're looking for rushed, lowest-cost-only solutions</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <div class="w-6 h-6 rounded-full bg-text-muted/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-text-muted"></span>
                                    </div>
                                    <span class="text-text-muted">You prefer minimal involvement or unclear requirements</span>
                                </li>
                                <li class="flex items-start gap-4">
                                    <div class="w-6 h-6 rounded-full bg-text-muted/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <span class="w-2 h-2 rounded-full bg-text-muted"></span>
                                    </div>
                                    <span class="text-text-muted">You want shortcuts instead of sustainable engineering</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="text-lg text-text-secondary leading-relaxed max-w-2xl mx-auto">
                        When expectations align, we deliver consistently and build lasting partnerships.
                    </p>
                </div>
            </div>

            <div class="section-divider my-24"></div>

            <!-- Our Approach - Step by Step Process -->
            <div class="mb-24" data-animate="fade-up" data-delay="0.3">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Our Process</span>
                    </div>
                    <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-heading mb-4">
                        How We <span class="text-gradient">Work</span>
                    </h2>
                    <p class="text-lg text-text-muted max-w-3xl mx-auto leading-relaxed">
                        A structured, transparent process designed to deliver exceptional results while keeping you informed at every stage.
                    </p>
                </div>
                
                <div class="max-w-5xl mx-auto">
                    <!-- Process Steps -->
                    <div class="space-y-8">
                        <!-- Step 1 -->
                        <div class="relative" data-animate="fade-up" data-delay="0.1">
                            <div class="flex flex-col md:flex-row gap-8 items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center shadow-lg shadow-brand-primary/25">
                                        <span class="text-2xl font-bold text-white">01</span>
                                    </div>
                                </div>
                                <div class="flex-1 bg-surface-1 rounded-2xl border border-border-default p-8 card-hover">
                                    <div class="flex items-center gap-3 mb-4">
                                        <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                        <h3 class="font-semibold text-heading text-xl">Discover & Understand</h3>
                                    </div>
                                    <p class="text-text-muted leading-relaxed mb-4">
                                        We start by diving deep into your business goals, target audience, and challenges. Through detailed consultations and requirements gathering, we ensure we fully understand what success looks like for your project.
                                    </p>
                                    <ul class="space-y-2 text-sm text-text-secondary">
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Requirements analysis and goal setting</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Market research and competitor analysis</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Technical feasibility assessment</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative" data-animate="fade-up" data-delay="0.2">
                            <div class="flex flex-col md:flex-row gap-8 items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center shadow-lg shadow-brand-primary/25">
                                        <span class="text-2xl font-bold text-white">02</span>
                                    </div>
                                </div>
                                <div class="flex-1 bg-surface-1 rounded-2xl border border-border-default p-8 card-hover">
                                    <div class="flex items-center gap-3 mb-4">
                                        <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                        </svg>
                                        <h3 class="font-semibold text-heading text-xl">Plan & Strategize</h3>
                                    </div>
                                    <p class="text-text-muted leading-relaxed mb-4">
                                        We create a comprehensive roadmap tailored to your needs. This includes project architecture, design direction, development milestones, timeline, and success metrics — all aligned with your business objectives.
                                    </p>
                                    <ul class="space-y-2 text-sm text-text-secondary">
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Detailed project roadmap and architecture</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Design mockups and wireframes</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Clear timeline and milestone planning</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="relative" data-animate="fade-up" data-delay="0.3">
                            <div class="flex flex-col md:flex-row gap-8 items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center shadow-lg shadow-brand-primary/25">
                                        <span class="text-2xl font-bold text-white">03</span>
                                    </div>
                                </div>
                                <div class="flex-1 bg-surface-1 rounded-2xl border border-border-default p-8 card-hover">
                                    <div class="flex items-center gap-3 mb-4">
                                        <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                        </svg>
                                        <h3 class="font-semibold text-heading text-xl">Build & Optimize</h3>
                                    </div>
                                    <p class="text-text-muted leading-relaxed mb-4">
                                        With a solid plan in place, we bring your vision to life. We develop clean, scalable code, implement designs, integrate systems, and continuously test and optimize for performance, security, and user experience.
                                    </p>
                                    <ul class="space-y-2 text-sm text-text-secondary">
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Agile development with regular updates</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Rigorous testing and quality assurance</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Performance optimization and SEO implementation</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="relative" data-animate="fade-up" data-delay="0.4">
                            <div class="flex flex-col md:flex-row gap-8 items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center shadow-lg shadow-brand-primary/25">
                                        <span class="text-2xl font-bold text-white">04</span>
                                    </div>
                                </div>
                                <div class="flex-1 bg-surface-1 rounded-2xl border border-border-default p-8 card-hover">
                                    <div class="flex items-center gap-3 mb-4">
                                        <svg class="w-6 h-6 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                        <h3 class="font-semibold text-heading text-xl">Launch & Support</h3>
                                    </div>
                                    <p class="text-text-muted leading-relaxed mb-4">
                                        We handle deployment, monitor performance, and provide ongoing support. Our relationship doesn't end at launch — we're here to help you grow, iterate, and scale as your business evolves.
                                    </p>
                                    <ul class="space-y-2 text-sm text-text-secondary">
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Smooth deployment and go-live support</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Performance monitoring and analytics setup</span>
                                        </li>
                                        <li class="flex items-start gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                                            <span>Ongoing maintenance and feature enhancements</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 bg-surface-1 relative overflow-hidden">
        <div class="absolute inset-0 gradient-pattern opacity-50"></div>
        <div class="relative max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Let's Connect</span>
            </div>
            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-heading mb-6">
                Ready to Build Something <span class="text-gradient">Together?</span>
            </h2>
            <p class="text-lg text-text-muted mb-10 max-w-2xl mx-auto leading-relaxed">
                Let's discuss your project and see how we can help bring your digital vision to life.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/25 hover:shadow-xl hover:shadow-brand-primary/30 hover:scale-105">
                    Get in Touch
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg border border-border-default text-text-primary font-semibold hover:border-brand-primary hover:text-brand-primary hover:bg-brand-primary/5 transition-all duration-200">
                    View Our Services
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
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
        'description' => 'Independent digital solutions team providing web development, mobile app development, SEO, UI/UX design, and AI-powered solutions',
        'url' => url('/'),
        'logo' => asset('images/techbuds-light.png'),
        'sameAs' => [],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'email' => 'techbuds57@gmail.com',
            'telephone' => '+917092936243',
            'contactType' => 'Customer Service'
        ],
        'areaServed' => 'Worldwide',
        'knowsAbout' => [
            'Web Development',
            'Mobile App Development',
            'SEO',
            'UI/UX Design',
            'Digital Marketing',
            'Custom Software Development'
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    
    @include('components.whatsapp-float')
</body>
</html>

