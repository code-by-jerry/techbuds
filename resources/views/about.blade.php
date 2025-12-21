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
    <section class="py-24 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-4xl mx-auto">
            <!-- Our Story -->
            <div class="mb-16" data-animate="fade-up">
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-6">
                    Our Story
                </h2>
                <div class="prose prose-invert max-w-none">
                    <p class="text-lg text-text-muted leading-relaxed mb-6">
                        <strong class="text-text-secondary">Thoughtful digital solutions, built by experienced hands</strong>
                    </p>
                    <p class="text-text-muted leading-relaxed mb-4">
                        Techbuds is a freelance-led digital solutions team formed by professionals with 4–5 years of real-world experience in development, design, and problem-solving.
                    </p>
                    <p class="text-text-muted leading-relaxed mb-4">
                        Before becoming Techbuds, we worked individually across websites, applications, and systems that helped businesses operate better and grow smarter. In 2025, we brought that experience together under one focused identity — Techbuds.
                    </p>
                    <p class="text-text-muted leading-relaxed mb-4">
                        Today, we collaborate as a small, hands-on team delivering modern websites, scalable applications, and performance-driven digital solutions. We value clean engineering, clear communication, and reliable delivery — without unnecessary complexity or inflated promises.
                    </p>
                    <p class="text-text-muted leading-relaxed">
                        We are growing with intention, building long-term client partnerships, and laying the groundwork for a formally registered entity in the future.
                    </p>
                </div>
            </div>

            <!-- What We Do -->
            <div class="mb-16" data-animate="fade-up" data-delay="0.1">
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-6">
                    What We Do
                </h2>
                <p class="text-lg text-text-muted leading-relaxed mb-6">
                    Founded by experienced developers and designers with over <strong class="text-text-secondary">4–5 years of hands-on industry experience</strong>, Techbuds focuses on building fast, scalable, and SEO-optimized digital products. Our work spans:
                </p>
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                        <p class="text-text-muted">Modern websites and web applications</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                        <p class="text-text-muted">Mobile applications for iOS and Android</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                        <p class="text-text-muted">Management systems and custom software</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                        <p class="text-text-muted">SEO optimization and digital marketing</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                        <p class="text-text-muted">UI/UX design and branding</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                        <p class="text-text-muted">AI-powered automation solutions</p>
                    </div>
                </div>
                <p class="text-text-muted leading-relaxed">
                    Operating as a freelance collective, we work directly with clients — ensuring transparency, flexibility, and high-quality execution without agency overheads. Our approach combines technical expertise, thoughtful design, and business-focused strategy to deliver measurable results.
                </p>
            </div>

            <!-- Who We Work With -->
            <div class="mb-16" data-animate="fade-up" data-delay="0.2">
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-6">
                    Who We Work With
                </h2>
                <p class="text-lg text-text-muted leading-relaxed mb-6">
                    We work best with clients who value clarity, quality, and long-term outcomes.
                </p>
                <div class="bg-surface-1 rounded-2xl border border-border-default p-8 mb-6">
                    <h3 class="font-semibold text-heading mb-4">Our ideal partners include:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                            <span class="text-text-muted">Startups building MVPs or scaling digital products</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                            <span class="text-text-muted">Small and medium businesses modernizing their online presence</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                            <span class="text-text-muted">Founders and solo entrepreneurs needing reliable tech execution</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                            <span class="text-text-muted">Agencies looking for dependable development partners</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-primary mt-2 flex-shrink-0"></span>
                            <span class="text-text-muted">Businesses seeking SEO-optimized, performance-focused websites</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-surface-1 rounded-2xl border border-border-default p-8">
                    <h3 class="font-semibold text-heading mb-4">We may not be the right fit if:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-text-muted mt-2 flex-shrink-0"></span>
                            <span class="text-text-muted">You're looking for rushed, lowest-cost-only solutions</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-text-muted mt-2 flex-shrink-0"></span>
                            <span class="text-text-muted">You prefer minimal involvement or unclear requirements</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-text-muted mt-2 flex-shrink-0"></span>
                            <span class="text-text-muted">You want shortcuts instead of sustainable engineering</span>
                        </li>
                    </ul>
                </div>
                <p class="text-text-muted leading-relaxed mt-6">
                    When expectations align, we deliver consistently and build lasting partnerships.
                </p>
            </div>

            <!-- Our Approach -->
            <div class="mb-16" data-animate="fade-up" data-delay="0.3">
                <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-6">
                    Our Approach
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-surface-1 rounded-xl border border-border-default p-6 card-hover">
                        <h3 class="font-semibold text-heading mb-3">Clean Engineering</h3>
                        <p class="text-text-muted text-sm leading-relaxed">
                            We prioritize well-structured, maintainable code that scales with your business. Every project is built with performance, security, and SEO readiness in mind from day one.
                        </p>
                    </div>
                    <div class="bg-surface-1 rounded-xl border border-border-default p-6 card-hover">
                        <h3 class="font-semibold text-heading mb-3">Clear Communication</h3>
                        <p class="text-text-muted text-sm leading-relaxed">
                            Direct collaboration without unnecessary layers. We keep you informed throughout the process, explain technical decisions clearly, and ensure transparency at every step.
                        </p>
                    </div>
                    <div class="bg-surface-1 rounded-xl border border-border-default p-6 card-hover">
                        <h3 class="font-semibold text-heading mb-3">Reliable Delivery</h3>
                        <p class="text-text-muted text-sm leading-relaxed">
                            We set realistic timelines and deliver on our commitments. Quality and reliability are non-negotiable, without inflated promises or shortcuts.
                        </p>
                    </div>
                    <div class="bg-surface-1 rounded-xl border border-border-default p-6 card-hover">
                        <h3 class="font-semibold text-heading mb-3">Long-Term Partnerships</h3>
                        <p class="text-text-muted text-sm leading-relaxed">
                            We build relationships, not just projects. Our goal is to grow with you, providing ongoing support and enhancements as your business evolves.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Legal Notice -->
            <div class="bg-surface-1 rounded-xl border border-border-default p-6" data-animate="fade-up" data-delay="0.4">
                <h3 class="font-semibold text-heading mb-3">Legal Status</h3>
                <p class="text-sm text-text-muted leading-relaxed">
                    Techbuds operates as an independent freelance collective and is not currently registered as a separate legal entity. Services are provided by individual professionals collaborating under the Techbuds name.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-heading mb-4">
                Ready to Build Something Together?
            </h2>
            <p class="text-lg text-text-muted mb-8 max-w-2xl mx-auto">
                Let's discuss your project and see how we can help bring your digital vision to life.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/25">
                    Get in Touch
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg border border-border-default text-text-primary font-semibold hover:border-brand-primary hover:text-brand-primary transition-all duration-200">
                    View Our Services
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

