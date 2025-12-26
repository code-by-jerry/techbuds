<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Techbuds - Web Development, Mobile Apps, SEO, DevOps & API Integration Services';
            $metaDescription = 'Professional web development, mobile app development, SEO services, DevOps & cloud deployment, and API integration. Techbuds delivers scalable, high-performance digital solutions for growing businesses.';
            $metaKeywords = 'web development, mobile app development, SEO services, DevOps services, API development, system integration, Laravel development, React development, Flutter apps, cloud deployment, web development Bangalore, mobile app development India';
        @endphp
        @include('components.meta-tags')

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Optimized Font Loading -->
        @include('components.optimized-fonts')

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

    <!-- Hero Carousel Section -->
    @include('components.hero-carousel')
    
    <!-- Main Page Title (H1) - Hidden visually but present for SEO -->
    <div class="sr-only">
        <h1>Techbuds - Design Develop Deliver | Web & Mobile App Development Services in India</h1>
    </div>

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
    <section class="py-12 md:py-20 overflow-hidden bg-gradient-to-b from-surface-1 to-app-background">
        <div class="overflow-hidden">
            @php
                $stack = ['Web Development','React Apps','Laravel','Ecommerce','Mobile','DevOps','Brand','SEO','Data','API','Integration','Product Design'];
                $lineOne = array_merge($stack, $stack);
                $offset = (int) ceil(count($stack) / 2);
                $lineTwoSeed = array_merge(array_slice($stack, $offset), array_slice($stack, 0, $offset));
                $lineTwo = array_merge($lineTwoSeed, $lineTwoSeed);
            @endphp
            <div class="space-y-4 md:space-y-6">
                <div class="flex marquee-track" style="min-width: 200%;">
                @foreach ($lineOne as $item)
                        <span class="px-4 md:px-8 text-3xl md:text-5xl lg:text-7xl font-bold text-text-muted/70 whitespace-nowrap">{{ $item }}</span>
                @endforeach
                </div>
                <div class="flex marquee-track-reverse" style="min-width: 200%;">
                @foreach ($lineTwo as $item)
                        <span class="px-4 md:px-8 text-3xl md:text-5xl lg:text-7xl font-bold text-transparent whitespace-nowrap" style="-webkit-text-stroke: 1px rgba(148, 163, 184, 0.6);">{{ $item }}</span>
                @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                    <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Our Services</span>
                </div>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-4">
                    Comprehensive digital solutions for <span class="text-gradient">your business</span>
                </h2>
                <p class="text-lg text-text-muted max-w-3xl mx-auto">
                    From web and mobile development to SEO, design, and custom IT solutions — we deliver clean, reliable, and scalable digital products that help your business grow.
                </p>
            </div>

            <div class="space-y-8">
                <!-- Web & Mobile Development -->
                <article class="bg-surface-1 rounded-2xl border border-border-default overflow-hidden card-hover" data-animate="fade-up">
                    <div class="grid lg:grid-cols-12 gap-0">
                        <div class="lg:col-span-5 relative h-64 lg:h-auto">
                            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1600&q=60" alt="Web and Mobile App Development Services - Custom Websites and Applications by Techbuds" class="w-full h-full object-cover" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-r from-surface-1/80 to-transparent lg:bg-gradient-to-l"></div>
                        </div>
                        <div class="lg:col-span-7 p-8 lg:p-10 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </div>
                                <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">Web & Mobile Development</span>
                    </div>
                            <h3 class="font-display text-2xl font-bold text-heading mb-4">Build modern, scalable applications</h3>
                            <p class="text-text-muted mb-6 leading-relaxed">
                                We develop fast, responsive websites and mobile apps using Laravel, React, and Flutter. From custom web applications to cross-platform mobile apps, we focus on clean code, performance, and user experience.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Custom websites and web applications
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Android and iOS mobile app development
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    SEO-optimized and performance-focused builds
                                </li>
                            </ul>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Laravel & React</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Flutter Apps</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Responsive Design</span>
                    </div>
                    </div>
                </div>
                </article>

                <!-- UI/UX Design & Branding -->
                <article class="bg-surface-1 rounded-2xl border border-border-default overflow-hidden card-hover" data-animate="fade-up" data-delay="0.1">
                    <div class="grid lg:grid-cols-12 gap-0">
                        <div class="lg:col-span-7 p-8 lg:p-10 flex flex-col justify-center order-2 lg:order-1">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                        </div>
                                <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">UI/UX Design & Branding</span>
                    </div>
                            <h3 class="font-display text-2xl font-bold text-heading mb-4">User-centered design that builds trust</h3>
                            <p class="text-text-muted mb-6 leading-relaxed">
                                We create intuitive interfaces and cohesive brand identities for web and mobile products. Our design process includes wireframes, prototypes, and developer-ready designs that improve usability and engagement.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Wireframes, prototypes, and visual design
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Brand identity, logos, and visual systems
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    UX research and conversion optimization
                                </li>
                            </ul>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Figma Design</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Brand Identity</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">User Research</span>
                    </div>
                </div>
                        <div class="lg:col-span-5 relative h-64 lg:h-auto order-1 lg:order-2">
                            <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?auto=format&fit=crop&w=1600&q=80" alt="UI/UX Design and Branding Services - User-Centered Design Solutions by Techbuds" class="w-full h-full object-cover" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-l from-surface-1/80 to-transparent lg:bg-gradient-to-r"></div>
                    </div>
                    </div>
                </article>
                
                <!-- SEO & Digital Marketing -->
                <article class="bg-surface-1 rounded-2xl border border-border-default overflow-hidden card-hover" data-animate="fade-up" data-delay="0.2">
                    <div class="grid lg:grid-cols-12 gap-0">
                        <div class="lg:col-span-5 relative h-64 lg:h-auto">
                            <img src="https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?auto=format&fit=crop&w=1600&q=60" alt="SEO and Digital Marketing Services - Grow Traffic and Generate Leads with Techbuds" class="w-full h-full object-cover" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-r from-surface-1/80 to-transparent lg:bg-gradient-to-l"></div>
                        </div>
                        <div class="lg:col-span-7 p-8 lg:p-10 flex flex-col justify-center">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                                <span class="text-xs font-medium text-brand-primary uppercase tracking-wider">SEO Services</span>
                    </div>
                            <h3 class="font-display text-2xl font-bold text-heading mb-4">Improve rankings and grow organic traffic</h3>
                            <p class="text-text-muted mb-6 leading-relaxed">
                                We help businesses improve search rankings, build authority, and drive organic traffic through technical SEO, on-page optimization, local SEO, and content strategy. Our approach focuses on sustainable, long-term growth.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Technical SEO audits and on-page optimization
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Content strategy and keyword research
                                </li>
                                <li class="flex items-center gap-3 text-sm text-text-secondary">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-primary"></span>
                                    Local SEO and performance tracking
                                </li>
                            </ul>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">SEO Audits</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Content Marketing</span>
                                <span class="px-3 py-1 rounded-full bg-surface-2 text-text-disabled text-xs font-medium">Local SEO</span>
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
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-4">
                    Thoughtful digital solutions, built with purpose
                </h2>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-primary to-border-default"></div>
                
                <div class="space-y-12">
                    <div class="relative pl-16" data-animate="fade-up">
                        <div class="absolute left-4 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-surface-1"></div>
                        <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">2019 – 2024</div>
                        <h3 class="text-lg font-semibold text-heading mb-2">Experience Before the Brand</h3>
                        <p class="text-text-muted leading-relaxed">We spent these years working independently across web development, application building, and system design — solving real business problems and sharpening our technical and creative expertise.</p>
                    </div>

                    <div class="relative pl-16" data-animate="fade-up" data-delay="0.1">
                        <div class="absolute left-4 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-surface-1"></div>
                        <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">Early 2025</div>
                        <h3 class="text-lg font-semibold text-heading mb-2">The Techbuds Idea</h3>
                        <p class="text-text-muted leading-relaxed">With shared values around clean engineering, clarity, and reliability, the idea of <strong class="text-text-secondary">Techbuds</strong> took shape — bringing individual experience together under one focused digital identity.</p>
                    </div>

                    <div class="relative pl-16" data-animate="fade-up" data-delay="0.2">
                        <div class="absolute left-4 top-1 w-4 h-4 rounded-full bg-brand-primary border-4 border-surface-1"></div>
                        <div class="text-xs font-semibold text-brand-primary uppercase tracking-wider mb-2">Mid 2025</div>
                        <h3 class="text-lg font-semibold text-heading mb-2">Working as Techbuds</h3>
                        <p class="text-text-muted leading-relaxed">We began collaborating as a small, hands-on team delivering modern websites, scalable applications, and performance-driven digital solutions for businesses and founders.</p>
                    </div>
            
                    <div class="relative pl-16" data-animate="fade-up" data-delay="0.3">
                        <div class="absolute left-4 top-1 w-4 h-4 rounded-full bg-green-500 border-4 border-surface-1 animate-pulse"></div>
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

            <!-- CTA -->
            <div class="mt-12 text-center" data-animate="fade-up" data-delay="0.5">
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg border border-border-default text-text-primary font-semibold hover:border-brand-primary hover:text-brand-primary transition-all duration-200">
                    Learn More About Us
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
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
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 mb-6">
                    <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Client Feedback</span>
                </div>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-4">
                    What Our Clients <span class="text-gradient">Say</span>
                </h2>
                <p class="text-lg text-text-muted">Real feedback from businesses we've worked with</p>
            </div>

            @php
                $testimonials = [
                    ['quote' => 'Built our e-commerce site perfectly. Traffic increased 300% in three months.', 'name' => 'Priya Sharma', 'role' => 'Founder', 'company' => 'Mumbai Retail Co'],
                    ['quote' => 'Mobile app launched on time. Users love the smooth experience and design.', 'name' => 'Arjun Patel', 'role' => 'CEO', 'company' => 'Delhi Tech Solutions'],
                    ['quote' => 'SEO results exceeded expectations. Rankings improved within two months.', 'name' => 'Kavita Reddy', 'role' => 'Marketing Head', 'company' => 'Bangalore Digital'],
                    ['quote' => 'UI/UX design transformed our brand. Conversion rate doubled instantly.', 'name' => 'Rohit Kumar', 'role' => 'Product Manager', 'company' => 'Pune Startups'],
                    ['quote' => 'Custom software streamlined operations. Saved 20 hours weekly on tasks.', 'name' => 'Anjali Mehta', 'role' => 'Operations Director', 'company' => 'Chennai Enterprises'],
                    ['quote' => 'API integration connected all our systems seamlessly. Data flow improved dramatically.', 'name' => 'Vikram Singh', 'role' => 'CTO', 'company' => 'Hyderabad Innovations'],
                    ['quote' => 'Website performance improved dramatically. Page load time reduced to under 2 seconds.', 'name' => 'Sneha Desai', 'role' => 'Founder', 'company' => 'Ahmedabad Commerce'],
                    ['quote' => 'Professional team, clear communication. Delivered exactly what we needed on budget.', 'name' => 'Rajesh Iyer', 'role' => 'Business Owner', 'company' => 'Kolkata Services'],
                ];
            @endphp

            <div x-data="{
                currentSlide: 0,
                testimonialsPerSlide: 3,
                autoplayInterval: null,
                testimonials: @js($testimonials),
                init() {
                    this.updateTestimonialsPerSlide();
                    window.addEventListener('resize', () => this.updateTestimonialsPerSlide());
                    this.startAutoplay();
                },
                updateTestimonialsPerSlide() {
                    if (window.innerWidth < 640) {
                        this.testimonialsPerSlide = 1;
                    } else if (window.innerWidth < 1024) {
                        this.testimonialsPerSlide = 2;
                    } else {
                        this.testimonialsPerSlide = 3;
                    }
                },
                get totalSlides() {
                    return Math.ceil(this.testimonials.length / this.testimonialsPerSlide);
                },
                getSlides() {
                    const slides = [];
                    for (let i = 0; i < this.testimonials.length; i += this.testimonialsPerSlide) {
                        slides.push(this.testimonials.slice(i, i + this.testimonialsPerSlide));
                    }
                    return slides;
                },
                nextSlide() {
                    this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                    this.restartAutoplay();
                },
                prevSlide() {
                    this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
                    this.restartAutoplay();
                },
                goToSlide(index) {
                    this.currentSlide = index;
                    this.restartAutoplay();
                },
                startAutoplay() {
                    this.autoplayInterval = setInterval(() => {
                        this.nextSlide();
                    }, 5000);
                },
                restartAutoplay() {
                    clearInterval(this.autoplayInterval);
                    this.startAutoplay();
                }
            }" 
            @mouseenter="clearInterval(autoplayInterval)" 
            @mouseleave="startAutoplay()"
            class="relative">
                <!-- Testimonials Carousel -->
                <div class="relative overflow-hidden">
                    <div class="flex transition-transform duration-700 ease-in-out" 
                         :style="`transform: translateX(-${currentSlide * 100}%)`">
                        <template x-for="(slide, slideIndex) in getSlides()" :key="slideIndex">
                            <div class="w-full flex-shrink-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-2">
                                <template x-for="testimonial in slide" :key="testimonial.name">
                                    <article class="bg-app-background rounded-xl border border-border-default p-6 card-hover h-full flex flex-col">
                                        <div class="flex items-center gap-1 mb-4">
                                            <template x-for="i in 5" :key="i">
                                                <svg class="w-4 h-4 text-warning" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </template>
                                        </div>
                                        <p class="text-text-secondary leading-relaxed mb-6 flex-grow">"<span x-text="testimonial.quote"></span>"</p>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-primary to-brand-soft flex items-center justify-center flex-shrink-0">
                                                <span class="text-white font-semibold text-sm" x-text="testimonial.name.charAt(0)"></span>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="text-sm font-semibold text-heading" x-text="testimonial.name"></div>
                                                <div class="text-xs text-text-disabled" x-text="`${testimonial.role} · ${testimonial.company}`"></div>
                                            </div>
                                        </div>
                                    </article>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button @click="prevSlide()" 
                        class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-6 z-10 w-10 h-10 md:w-12 md:h-12 rounded-full bg-app-background border border-border-default shadow-lg flex items-center justify-center hover:bg-surface-1 transition-colors group"
                        aria-label="Previous testimonials">
                    <svg class="w-5 h-5 text-heading group-hover:text-brand-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button @click="nextSlide()" 
                        class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-6 z-10 w-10 h-10 md:w-12 md:h-12 rounded-full bg-app-background border border-border-default shadow-lg flex items-center justify-center hover:bg-surface-1 transition-colors group"
                        aria-label="Next testimonials">
                    <svg class="w-5 h-5 text-heading group-hover:text-brand-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Dot Indicators -->
                <div class="flex justify-center items-center gap-2 mt-8">
                    <template x-for="(slide, index) in Array.from({length: totalSlides})" :key="index">
                        <button @click="goToSlide(index)"
                                :class="currentSlide === index ? 'bg-brand-primary w-8' : 'bg-border-default w-2'"
                                class="h-2 rounded-full transition-all duration-300 hover:bg-brand-primary/50"
                                :aria-label="`Go to slide ${index + 1}`">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/contact-page-banner.jpg') }}" 
                alt="Contact Us - Techbuds" 
                class="w-full h-full object-cover"
                loading="lazy">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-6xl mx-auto z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <!-- Left Content -->
                <div class="space-y-8" data-animate="fade-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/20 border border-brand-primary/30 backdrop-blur-sm">
                        <span class="text-xs font-medium text-white/90 uppercase tracking-wider">Contact</span>
                    </div>
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-white leading-tight drop-shadow-lg">
                        Let's shape your next release.
                    </h2>
                    <p class="text-white/90 leading-relaxed drop-shadow-md">
                    Tell us about the product you're dreaming up. We'll assemble a dedicated squad, share a roadmap, and launch a discovery sprint within days.
                </p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                    </div>
                            <div>
                                <div class="text-xs text-white/70 uppercase tracking-wider">Call us</div>
                                <a href="tel:+917092936243" class="text-white font-semibold hover:text-blue-200 transition-colors drop-shadow-sm">7092936243</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                    </div>
                            <div>
                                <div class="text-xs text-white/70 uppercase tracking-wider">Email</div>
                                <a href="mailto:techbuds57@gmail.com" class="text-white font-semibold hover:text-blue-200 transition-colors drop-shadow-sm">techbuds57@gmail.com</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                    </div>
                            <div>
                                <div class="text-xs text-white/70 uppercase tracking-wider">HQ</div>
                                <span class="text-white font-semibold drop-shadow-sm">Bangalore, India</span>
                </div>
            </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="bg-surface-1/95 backdrop-blur-sm rounded-2xl border border-white/20 p-8 shadow-xl" data-animate="slide-up" x-data="{ submitting: false }">
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
    
    @include('components.whatsapp-float')
    
    <!-- Schema Markup -->
    @include('components.schema.website')
    @include('components.schema.organization')
    @include('components.schema.breadcrumb', ['items' => [['name' => 'Home', 'url' => url('/')]]])
    </body>
</html>
