<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Techbuds - Design Develop Deliver</title>
        <meta name="description" content="Techbuds - Your trusted partner for Web Apps, Mobile Apps, UI/UX Design, DevOps, Database Warehousing, and Digital Marketing solutions.">

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
            
            /* Tech Marquee */
            @keyframes marquee-left {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            @keyframes marquee-right {
                0% { transform: translateX(-50%); }
                100% { transform: translateX(0); }
            }
            .marquee-track {
                animation: marquee-left 30s linear infinite;
            }
            .marquee-track-reverse {
                animation: marquee-right 35s linear infinite;
            }
            
            /* Floating Animation */
            @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }
            .float-slow { animation: float 6s ease-in-out infinite; }
            .float-delay { animation: float 8s ease-in-out infinite 2s; }
            
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
    <section class="relative min-h-screen pt-32 pb-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Gradient Orbs -->
            <div class="absolute top-20 left-10 w-96 h-96 bg-brand-primary/10 rounded-full blur-3xl float-slow"></div>
            <div class="absolute bottom-20 right-10 w-80 h-80 bg-brand-soft/10 rounded-full blur-3xl float-delay"></div>
            <!-- Grid Pattern -->
            <div class="absolute inset-0" style="background-image: linear-gradient(rgba(37, 99, 235, 0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(37, 99, 235, 0.03) 1px, transparent 1px); background-size: 60px 60px;"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-8 text-center lg:text-left" data-animate="fade-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Digital Transformation Studio</span>
                    </div>
                    
                    <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-heading leading-tight">
                        Empowering Your<br>
                        <span class="text-gradient">Digital Future</span>
                    </h1>
                    
                    <p class="text-lg text-text-muted max-w-xl mx-auto lg:mx-0 leading-relaxed"
                       x-data="{
                            words: ['web applications','mobile apps','UI/UX experiences','DevOps pipelines','data platforms','digital marketing'],
                            idx: 0,
                            word: 'web applications',
                            show: true,
                            next(){ this.show = false; setTimeout(()=>{ this.idx=(this.idx+1)%this.words.length; this.word=this.words[this.idx]; this.show = true; }, 400); }
                       }"
                       x-init="setInterval(()=>next(), 3800)">
                        We craft exceptional
                        <span class="text-brand-primary font-semibold" x-cloak x-show="show" x-transition.opacity.duration.400 x-text="' ' + word"></span>
                        that drive your business forward with measurable outcomes.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#services" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/25">
                            Explore Services
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        <a href="#contact" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg border border-border-default text-text-primary font-semibold hover:border-brand-primary hover:text-brand-primary transition-all duration-200">
                            Start a Project
                        </a>
                    </div>
                    
                    <div class="flex flex-wrap gap-3 justify-center lg:justify-start pt-4">
                        <span class="px-4 py-2 rounded-full bg-surface-2 text-text-muted text-sm font-medium border border-border-default">Full-stack pods</span>
                        <span class="px-4 py-2 rounded-full bg-surface-2 text-text-muted text-sm font-medium border border-border-default">Design systems</span>
                        <span class="px-4 py-2 rounded-full bg-surface-2 text-text-muted text-sm font-medium border border-border-default">Data & analytics</span>
                    </div>
                </div>
                
                <!-- Right Content - Stats Card -->
                <div class="relative" data-animate="slide-left">
                    <div class="relative bg-gradient-to-br from-surface-2 to-surface-1 rounded-2xl p-8 border border-border-default glow-brand">
                        <div class="absolute -top-3 -right-3 px-4 py-2 rounded-full bg-brand-primary text-white text-xs font-semibold">
                            Innovation Pod
                        </div>
                        <h3 class="font-display text-2xl font-bold text-heading mb-4">Launch bold products without the busywork</h3>
                        <p class="text-text-muted mb-8 leading-relaxed">
                            We plug autonomous squads into your roadmap—handling discovery, build, QA, DevOps, and growth loops so your team can focus on strategy.
                        </p>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-heading" data-count="6" data-suffix=" Weeks">0</div>
                                <div class="text-xs text-text-disabled uppercase tracking-wider mt-1">Discovery to Beta</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-heading" data-count="92" data-suffix="%">0</div>
                                <div class="text-xs text-text-disabled uppercase tracking-wider mt-1">Client Retention</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-brand-primary">A+</div>
                                <div class="text-xs text-text-disabled uppercase tracking-wider mt-1">Quality Score</div>
                            </div>
                        </div>
                        
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-6 -left-6 bg-surface-2 border border-border-default rounded-xl p-4 shadow-xl">
                            <div class="text-xs text-text-disabled uppercase tracking-wider mb-1">Core Stack</div>
                            <div class="text-sm font-semibold text-heading">Laravel · React · Flutter</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metrics Strip -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1 border-y border-surface-2">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-8">
                <div class="text-center" data-animate="fade-up">
                    <div class="text-4xl font-bold text-heading">
                        <span data-count="50" data-suffix="+">0</span>
                    </div>
                    <p class="text-xs uppercase tracking-wider text-text-disabled mt-2">Projects Shipped</p>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="text-4xl font-bold text-heading">
                        <span data-count="5" data-suffix="+">0</span>
                    </div>
                    <p class="text-xs uppercase tracking-wider text-text-disabled mt-2">Years in Mission</p>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="text-4xl font-bold text-heading">
                        <span data-count="20" data-suffix="+">0</span>
                    </div>
                    <p class="text-xs uppercase tracking-wider text-text-disabled mt-2">Active Partners</p>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="text-4xl font-bold text-heading">
                        <span data-count="24" data-suffix="/7">0</span>
                    </div>
                    <p class="text-xs uppercase tracking-wider text-text-disabled mt-2">Support Coverage</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Stack Marquee -->
    <section class="py-20 overflow-hidden bg-gradient-to-b from-surface-1 to-app-background">
        @php
            $stack = ['Web Development','React Apps','Laravel','Ecommerce','Mobile','DevOps','Brand','SEO','Data','AI','Automation','Product Design'];
            $lineOne = array_merge($stack, $stack);
            $offset = (int) ceil(count($stack) / 2);
            $lineTwoSeed = array_merge(array_slice($stack, $offset), array_slice($stack, 0, $offset));
            $lineTwo = array_merge($lineTwoSeed, $lineTwoSeed);
        @endphp
        <div class="space-y-6">
            <div class="flex marquee-track" style="min-width: 200%;">
                @foreach ($lineOne as $item)
                    <span class="px-8 text-5xl md:text-7xl font-bold text-surface-2 whitespace-nowrap">{{ $item }}</span>
                @endforeach
            </div>
            <div class="flex marquee-track-reverse" style="min-width: 200%;">
                @foreach ($lineTwo as $item)
                    <span class="px-8 text-5xl md:text-7xl font-bold text-transparent whitespace-nowrap" style="-webkit-text-stroke: 1px #334155;">{{ $item }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                    <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Service Blueprint</span>
                </div>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-4">
                    Build end-to-end experiences with <span class="text-gradient">embedded teams</span>
                </h2>
                <p class="text-lg text-text-muted max-w-3xl mx-auto">
                    We align strategy, design, engineering, and growth into one sprint rhythm so you can launch faster, scale reliably, and own the outcomes.
                </p>
            </div>

            <div class="space-y-8">
                <!-- Product Engineering -->
                <article class="bg-surface-1 rounded-2xl border border-border-default overflow-hidden card-hover" data-animate="fade-up">
                    <div class="grid lg:grid-cols-12 gap-0">
                        <div class="lg:col-span-5 relative h-64 lg:h-auto">
                            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1600&q=60" alt="Developers collaborating" class="w-full h-full object-cover" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-r from-surface-1/80 to-transparent lg:bg-gradient-to-l"></div>
                        </div>
                        <div class="lg:col-span-7 p-8 lg:p-10 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </div>
                                <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">Product Engineering</span>
                            </div>
                            <h3 class="font-display text-2xl font-bold text-heading mb-4">High velocity software squads</h3>
                            <p class="text-text-muted mb-6 leading-relaxed">
                                Assemble a pod of architects, engineers, PMs, and QA who operate like an internal team. We craft scalable architectures, atomic design systems, and quality pipelines that de-risk every release.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Composable tech stacks with Laravel, React, Flutter
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Automated QA + observability baked into each sprint
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Migration playbooks to modernize legacy systems
                                </li>
                            </ul>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Launch 3x Faster</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">99.9% Uptime</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Full DevOps</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Experience & Brand -->
                <article class="bg-surface-1 rounded-2xl border border-border-default overflow-hidden card-hover" data-animate="fade-up" data-delay="0.1">
                    <div class="grid lg:grid-cols-12 gap-0">
                        <div class="lg:col-span-7 p-8 lg:p-10 flex flex-col justify-center order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                                </div>
                                <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">Experience & Brand</span>
                            </div>
                            <h3 class="font-display text-2xl font-bold text-heading mb-4">Design that converts and retains</h3>
                            <p class="text-text-muted mb-6 leading-relaxed">
                                Pair UX researchers, product designers, and brand storytellers to choreograph seamless journeys. We prototype rapidly, validate with users, and launch polished frontends that feel unmistakably you.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Persona-driven flows aligned to business KPIs
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Motion systems crafted in Figma + Lottie
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Accessible color systems and component libraries
                                </li>
                            </ul>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">UX Labs</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Brand Systems</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">+28% Conversion</span>
                            </div>
                        </div>
                        <div class="lg:col-span-5 relative h-64 lg:h-auto order-1 lg:order-2">
                            <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?auto=format&fit=crop&w=1600&q=80" alt="Designers crafting interfaces" class="w-full h-full object-cover" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-l from-surface-1/80 to-transparent lg:bg-gradient-to-r"></div>
                        </div>
                    </div>
                </article>

                <!-- Growth & Optimization -->
                <article class="bg-surface-1 rounded-2xl border border-border-default overflow-hidden card-hover" data-animate="fade-up" data-delay="0.2">
                    <div class="grid lg:grid-cols-12 gap-0">
                        <div class="lg:col-span-5 relative h-64 lg:h-auto">
                            <img src="https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?auto=format&fit=crop&w=1600&q=60" alt="Marketing analytics dashboard" class="w-full h-full object-cover" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-r from-surface-1/80 to-transparent lg:bg-gradient-to-l"></div>
                        </div>
                        <div class="lg:col-span-7 p-8 lg:p-10 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                </div>
                                <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">Growth & Optimization</span>
                            </div>
                            <h3 class="font-display text-2xl font-bold text-heading mb-4">Full-funnel acquisition & retention</h3>
                            <p class="text-text-muted mb-6 leading-relaxed">
                                Blend SEO, content, lifecycle automation, and performance marketing under one playbook. We track every experiment, own campaign setup, and translate analytics into repeatable growth.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Technical SEO audits and Core Web Vitals optimization
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Lifecycle journeys across email, push, and in-product
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Revenue dashboards with Looker Studio + GA4
                                </li>
                            </ul>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">SEO Suites</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Marketing Ops</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Growth Sprints</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="story" class="py-24 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                    <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Our Story</span>
                </div>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading">
                    Building digital solutions with purpose
                </h2>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-primary to-border-default"></div>
                
                <div class="space-y-12">
                    <div class="relative pl-16" data-animate="fade-up">
                        <div class="absolute left-4 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-surface-1"></div>
                        <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">2019 – 2024</div>
                        <h3 class="text-lg font-semibold text-heading mb-2">Foundation Years</h3>
                        <p class="text-text-muted leading-relaxed">We spent years building real-world expertise in development, problem-solving, and digital product craftsmanship.</p>
                    </div>
                    
                    <div class="relative pl-16" data-animate="fade-up" data-delay="0.1">
                        <div class="absolute left-4 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-surface-1"></div>
                        <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">January 2025</div>
                        <h3 class="text-lg font-semibold text-heading mb-2">The Vision</h3>
                        <p class="text-text-muted leading-relaxed">The idea of Techbuds was born — a vision to create simple, impactful, and human-centric digital solutions.</p>
                    </div>
                    
                    <div class="relative pl-16" data-animate="fade-up" data-delay="0.2">
                        <div class="absolute left-4 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-surface-1"></div>
                        <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">June 2025</div>
                        <h3 class="text-lg font-semibold text-heading mb-2">Official Launch</h3>
                        <p class="text-text-muted leading-relaxed">Techbuds officially took form with focused, meaningful projects — management systems, modern websites, mobile apps, and AI-based improvements.</p>
                    </div>
                    
                    <div class="relative pl-16" data-animate="fade-up" data-delay="0.3">
                        <div class="absolute left-4 top-1 w-4 h-4 rounded-full bg-green-500 border-4 border-surface-1 animate-pulse"></div>
                        <div class="text-xs font-semibold text-green-500 uppercase tracking-wider mb-2">Today</div>
                        <h3 class="text-lg font-semibold text-heading mb-2">Growing Forward</h3>
                        <p class="text-text-muted leading-relaxed">Techbuds stands as a growing digital solutions team dedicated to clean engineering, thoughtful design, and reliable delivery.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO Blogs Section -->
    <section id="blogs" class="py-24 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                    <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">SEO Blogs</span>
                </div>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-4">
                    Intelligence from our Search & Growth trenches
                </h2>
                <p class="text-lg text-text-muted max-w-3xl mx-auto">
                    Deep dives on technical SEO, growth experiments, and analytics frameworks we deploy for product-led brands.
                </p>
            </div>

            @if($blogs && $blogs->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach($blogs as $index => $blog)
                <article class="bg-surface-1 rounded-xl border border-border-default overflow-hidden card-hover" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.1 }}">
                    <div class="relative h-48">
                        <img src="{{ $blog->featured_image ?? 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=1600&q=60' }}" alt="{{ $blog->title }}" class="w-full h-full object-cover" loading="lazy">
                        <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-app-background/90 text-text-secondary text-xs font-medium">
                            {{ $blog->reading_time ?? '5 min' }} read
                        </div>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">{{ $blog->category }}</span>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="block mt-2">
                            <h3 class="font-semibold text-heading hover:text-brand-primary transition-colors line-clamp-2">{{ $blog->title }}</h3>
                        </a>
                        <p class="text-text-muted text-sm mt-3 line-clamp-2">{{ $blog->excerpt }}</p>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center gap-2 text-sm font-medium text-brand-primary hover:text-brand-soft mt-4 transition-colors">
                            Read article
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="text-center" data-animate="fade-up">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/25">
                    View All Blogs
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-text-disabled">No blog posts available yet. Check back soon!</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-24 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                    <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Client Feedback</span>
                </div>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-4">
                    What Our Clients <span class="text-gradient">Say</span>
                </h2>
                <p class="text-lg text-text-muted">Real feedback from businesses we've worked with</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                @php
                    $testimonials = [
                        ['quote' => 'Techbuds helped us build a scalable e-commerce platform that handles our growing traffic seamlessly. Their team was professional, responsive, and delivered on time.', 'name' => 'Aadhya Raman', 'role' => 'Chief Product Officer', 'company' => 'Finverge'],
                        ['quote' => 'Working with Techbuds has been a great experience. They understood our requirements quickly and built exactly what we needed. Highly recommend their services.', 'name' => 'Mohammed Idris', 'role' => 'Growth Lead', 'company' => 'Shopora'],
                        ['quote' => 'From concept to launch, Techbuds guided us through every step. The final product exceeded our expectations and our users love it.', 'name' => 'Olivia Martins', 'role' => 'Founder', 'company' => 'HealthSync'],
                        ['quote' => 'Their technical expertise and attention to detail made all the difference. We\'re very satisfied with the quality of work and ongoing support.', 'name' => 'Rahul Menon', 'role' => 'VP Engineering', 'company' => 'DataForge'],
                    ];
                @endphp

                @foreach($testimonials as $index => $testimonial)
                <article class="bg-app-background rounded-xl border border-border-default p-6 card-hover" data-animate="fade-up" data-delay="{{ ($index % 2) * 0.1 }}">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-text-secondary leading-relaxed mb-6">"{{ $testimonial['quote'] }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ substr($testimonial['name'], 0, 1) }}</span>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-heading">{{ $testimonial['name'] }}</div>
                            <div class="text-xs text-text-disabled">{{ $testimonial['role'] }} · {{ $testimonial['company'] }}</div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-app-background via-surface-1 to-app-background relative overflow-hidden">
        <!-- Background Glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-brand-primary/10 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="relative max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <!-- Left Content -->
                <div class="space-y-8" data-animate="fade-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20">
                        <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Contact</span>
                    </div>
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-heading">
                        Let's shape your next release.
                    </h2>
                    <p class="text-text-muted leading-relaxed">
                        Tell us about the product you're dreaming up. We'll assemble a dedicated squad, share a roadmap, and launch a discovery sprint within days.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-surface-2 border border-border-default flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs text-text-disabled uppercase tracking-wider">Call us</div>
                                <a href="tel:+917092936243" class="text-heading font-semibold hover:text-brand-primary transition-colors">7092936243</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-surface-2 border border-border-default flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs text-text-disabled uppercase tracking-wider">Email</div>
                                <a href="mailto:techbuds57@gmail.com" class="text-heading font-semibold hover:text-brand-primary transition-colors">techbuds57@gmail.com</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-surface-2 border border-border-default flex items-center justify-center">
                                <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-xs text-text-disabled uppercase tracking-wider">HQ</div>
                                <span class="text-heading font-semibold">Bangalore, India</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="bg-surface-1 rounded-2xl border border-border-default p-8 shadow-xl" data-animate="slide-up" x-data="{ submitting: false }">
                    <h3 class="font-display text-xl font-semibold text-heading mb-6">Project kickoff form</h3>
                    
                    @if(session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-500/10 border border-green-500/20" x-data="{ show: true }" x-show="show" x-transition>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <p class="text-sm font-medium text-green-500">{{ session('success') }}</p>
                            </div>
                            <button @click="show = false" class="text-green-500 hover:text-success">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="mb-6 p-4 rounded-lg bg-error/10 border border-error/20" x-data="{ show: true }" x-show="show" x-transition>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-error" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <p class="text-sm font-medium text-error">{{ session('error') }}</p>
                            </div>
                            <button @click="show = false" class="text-error hover:text-red-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5" @submit="submitting = true">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Full name</label>
                                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Jane Doe" class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('name') ? 'border-error' : 'border-border-default' }} text-text-primary placeholder-text-disabled focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm">
                                @error('name')
                                    <span class="text-xs text-error mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Work email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required placeholder="you@company.com" class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('email') ? 'border-error' : 'border-border-default' }} text-text-primary placeholder-text-disabled focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm">
                                @error('email')
                                    <span class="text-xs text-error mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('phone') ? 'border-error' : 'border-border-default' }} text-text-primary placeholder-text-disabled focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Project type</label>
                                <select name="project_type" class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('project_type') ? 'border-error' : 'border-border-default' }} text-text-primary focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm">
                                    <option value="">Select project type</option>
                                    <option value="Custom Web App" {{ old('project_type') == 'Custom Web App' ? 'selected' : '' }}>Custom Web App</option>
                                    <option value="Mobile App" {{ old('project_type') == 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                                    <option value="UI/UX Redesign" {{ old('project_type') == 'UI/UX Redesign' ? 'selected' : '' }}>UI/UX Redesign</option>
                                    <option value="DevOps & Infrastructure" {{ old('project_type') == 'DevOps & Infrastructure' ? 'selected' : '' }}>DevOps & Infrastructure</option>
                                    <option value="SEO & Growth" {{ old('project_type') == 'SEO & Growth' ? 'selected' : '' }}>SEO & Growth</option>
                                    <option value="Other" {{ old('project_type') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Tell us about your goals</label>
                            <textarea name="message" rows="4" placeholder="Launch timeline, desired outcomes, existing challenges..." class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('message') ? 'border-error' : 'border-border-default' }} text-text-primary placeholder-text-disabled focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm resize-none">{{ old('message') }}</textarea>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <label class="inline-flex items-center gap-2 text-sm text-text-muted cursor-pointer">
                                <input type="checkbox" name="nda" value="1" {{ old('nda') ? 'checked' : '' }} class="w-4 h-4 rounded border-border-default bg-app-background text-brand-primary focus:ring-brand-primary/20">
                                I'd like to sign a mutual NDA
                            </label>
                            <button type="submit" :disabled="submitting" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/25 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!submitting">Start discovery call</span>
                                <span x-show="submitting" class="flex items-center gap-2">
                                    <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Sending...
                                </span>
                                <svg x-show="!submitting" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </button>
                        </div>
                    </form>
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

            // Slide animations
            gsap.utils.toArray('[data-animate="slide-left"]').forEach((el) => {
                gsap.from(el, {
                    duration: 0.8,
                    opacity: 0,
                    x: 50,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 85%',
                        once: true
                    }
                });
            });

            gsap.utils.toArray('[data-animate="slide-up"]').forEach((el) => {
                gsap.from(el, {
                    duration: 0.8,
                    opacity: 0,
                    y: 40,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 85%',
                        once: true
                    }
                });
            });

            // Counter animations
            gsap.utils.toArray('[data-count]').forEach((counter) => {
                const target = parseFloat(counter.dataset.count || '0');
                const suffix = counter.dataset.suffix || '';
                const data = { value: 0 };

                gsap.to(data, {
                    value: target,
                    duration: 1.5,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: counter,
                        start: 'top 85%',
                        once: true
                    },
                    onUpdate: () => {
                        counter.textContent = Math.floor(data.value) + suffix;
                    }
                });
            });
        });
    </script>

    <!-- Smooth Scroll -->
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

        @if(session('success') || session('error') || $errors->any())
            window.addEventListener('load', () => {
                const contactSection = document.querySelector('#contact');
                if (contactSection) {
                    setTimeout(() => {
                        contactSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 100);
                }
            });
        @endif
    </script>
</body>
</html>
