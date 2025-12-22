<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Web Development Services | Fast, Scalable & SEO-Optimized Websites – Techbuds';
            $metaDescription = 'Professional web development services: custom websites, full-stack applications, Laravel development, React development, SEO-optimized sites. Build fast, scalable, performance-focused web solutions.';
            $metaKeywords = 'web development services, custom website development, Laravel development, React development, full-stack development, responsive web design, SEO-optimized websites, web application development, website development company';
        @endphp
        @include('components.meta-tags')

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Fonts -->
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
                box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
                transition: transform .45s ease, box-shadow .45s ease;
                padding: 2rem;
            }

            .service-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 24px 70px rgba(37, 99, 235, 0.15);
            }

            .feature-item {
                position: relative;
                padding-left: 1.4rem;
                font-size: 0.9rem;
                color: var(--text-secondary);
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
                background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-soft) 100%);
                box-shadow: 0 6px 12px rgba(37, 99, 235, 0.25);
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

            .faq-item {
                background: var(--surface);
                border-radius: 1rem;
                padding: 1.5rem;
                border: 1px solid var(--border-default);
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
<body class="bg-app-background text-text-primary font-sans antialiased">
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 min-h-[500px] md:min-h-[600px] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/web developement 2.jpg') }}" 
                alt="Web Development Services - Fast, Scalable & SEO-Optimized Websites by Techbuds" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto w-full z-10">
            <div data-animate="fade-up">
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">Web Development</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                Fast, Scalable & <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">SEO-Optimized Websites</span> That Drive Growth
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                Your website is not just an online presence — it is your <strong class="text-white">sales engine, brand authority, and first impression</strong>. At <strong class="text-white">Techbuds</strong>, we build high-performance, secure, and scalable web solutions that help businesses attract users, convert leads, and grow sustainably.
            </p>
            <p class="mt-4 text-base md:text-lg text-white/85 max-w-3xl leading-relaxed drop-shadow-sm" data-animate="fade-up" data-delay="0.3">
                We specialize in <strong>modern web development</strong> using any tech stack — MERN, full-stack JavaScript, Python, PHP, or custom solutions. We choose the right tools for your project, ensuring clean architecture, optimized performance, and SEO-ready foundations.
            </p>
        </div>
    </section>

    <!-- Why Web Development Matters Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why Web Development <span class="text-clip">Matters for Business Growth</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-heading mb-4">A slow, poorly structured website costs you:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Search engine rankings</div>
                        <div class="feature-item">User trust</div>
                        <div class="feature-item">Leads and conversions</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-heading mb-4">Our web development services ensure:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Faster load times</div>
                        <div class="feature-item">Better SEO visibility</div>
                        <div class="feature-item">Higher engagement</div>
                        <div class="feature-item">Long-term scalability</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Web Development Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Web Development Services</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    Comprehensive web solutions tailored to your business needs
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Custom Website Development -->
                <div class="service-card" data-animate="fade-up">
                    <div class="service-icon text-2xl mb-4">🌐</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Custom Website Development</h3>
                    <p class="text-sm text-heading/70 mb-3">We build fully custom websites tailored to your business goals — not templates.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Business & corporate websites</div>
                        <div class="feature-item">Startup & SaaS platforms</div>
                        <div class="feature-item">Portfolio & service websites</div>
                        <div class="feature-item">Admin panels & dashboards</div>
                    </div>
                </div>

                <!-- Full-Stack Web Applications -->
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Full-Stack Web Applications</h3>
                    <p class="text-sm text-heading/70 mb-3">Robust web applications engineered for performance and scalability using any modern stack.</p>
                    <div class="space-y-2">
                        <div class="feature-item">MERN, MEAN, LAMP, or custom stacks</div>
                        <div class="feature-item">REST & API-driven systems</div>
                        <div class="feature-item">Authentication & role management</div>
                        <div class="feature-item">Secure database integrations</div>
                    </div>
                </div>

                <!-- Performance & SEO-Optimized Development -->
                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mb-4">🚀</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Performance & SEO-Optimized Development</h3>
                    <p class="text-sm text-heading/70 mb-3">Every website we build follows SEO and performance best practices from day one.</p>
                    <div class="space-y-2">
                        <div class="feature-item">SEO-friendly URL structure</div>
                        <div class="feature-item">Clean HTML & semantic markup</div>
                        <div class="feature-item">Core Web Vitals optimization</div>
                        <div class="feature-item">Mobile-first responsive design</div>
                    </div>
                </div>

                <!-- CMS & Custom Dashboards -->
                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">CMS & Custom Dashboards</h3>
                    <p class="text-sm text-heading/70 mb-3">We develop easy-to-manage systems that give you full control.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Custom CMS solutions</div>
                        <div class="feature-item">Admin dashboards & analytics</div>
                        <div class="feature-item">Role-based access control</div>
                        <div class="feature-item">Scalable backend architecture</div>
                    </div>
                </div>

                <!-- Website Redesign & Optimization -->
                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mb-4">🔄</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Website Redesign & Optimization</h3>
                    <p class="text-sm text-heading/70 mb-3">Already have a website? We improve it.</p>
                    <div class="space-y-2">
                        <div class="feature-item">UI/UX redesign</div>
                        <div class="feature-item">Performance & speed optimization</div>
                        <div class="feature-item">SEO & structure fixes</div>
                        <div class="feature-item">Security improvements</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies We Work With Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Technologies We <span class="text-clip">Work With</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    We work with any tech stack — from MERN to full-stack frameworks. We choose the right tools for your project.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="service-card text-center" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-heading mb-2">Frontend</h3>
                    <p class="text-sm text-heading/70">React, Vue, Angular, Next.js, HTML, Tailwind CSS, JavaScript, TypeScript</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Backend</h3>
                    <p class="text-sm text-heading/70">Node.js, Express, Laravel, PHP, Python, Django, FastAPI, .NET</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Database</h3>
                    <p class="text-sm text-heading/70">MySQL, PostgreSQL, MongoDB, Firebase, Redis, DynamoDB</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">Full-Stack</h3>
                    <p class="text-sm text-heading/70">MERN Stack, MEAN Stack, LAMP Stack, Serverless, Microservices</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.4">
                    <h3 class="text-lg font-semibold text-heading mb-2">Cloud & DevOps</h3>
                    <p class="text-sm text-heading/70">AWS, GCP, Azure, Firebase, Vercel, Docker, Kubernetes, CI/CD</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.5">
                    <h3 class="text-lg font-semibold text-heading mb-2">APIs & Integrations</h3>
                    <p class="text-sm text-heading/70">RESTful APIs, GraphQL, WebSockets, Third-party integrations</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.6">
                    <h3 class="text-lg font-semibold text-heading mb-2">Mobile Web</h3>
                    <p class="text-sm text-heading/70">PWA, Responsive Design, Mobile-first Development</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.7">
                    <h3 class="text-lg font-semibold text-heading mb-2">Real-time & Services</h3>
                    <p class="text-sm text-heading/70">WebSockets, Firebase Realtime, Server-Sent Events, Microservices</p>
                </div>
            </div>

            <div class="mt-8 text-center" data-animate="fade-up" data-delay="0.8">
                <p class="text-base text-heading/70 max-w-3xl mx-auto">
                    <strong>Not limited to any single stack.</strong> We build web applications using the technology that best fits your project requirements, whether it's MERN, full-stack JavaScript, Python, PHP, or any other modern framework.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Web Development Process Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Process</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Web Development Process</span>
                </h2>
            </div>

            <div class="space-y-6">
                <div class="process-step" data-animate="fade-up">
                    <div class="process-number">1</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Discovery & Requirement Analysis</h3>
                    <p class="text-base text-heading/70 leading-relaxed">We understand your business, goals, users, and technical needs.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.1">
                    <div class="process-number">2</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Planning & Architecture</h3>
                    <p class="text-base text-heading/70 leading-relaxed">We define site structure, tech stack, SEO strategy, and timelines.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.2">
                    <div class="process-number">3</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Design & Development</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Clean UI, robust backend, optimized performance, and testing.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.3">
                    <div class="process-number">4</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Launch & Support</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Deployment, monitoring, maintenance, and future scalability support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Techbuds Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Why Choose Us</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why Choose <span class="text-clip">Techbuds for Web Development</span>?
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card" data-animate="fade-up">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Modern, clean & scalable codebase</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We write maintainable code that grows with your business.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">SEO-first development approach</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Every website is built with SEO best practices from the start.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Performance-optimized websites</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Fast load times and smooth user experiences.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Clear communication & transparency</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">You'll always know what's happening and why.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Long-term technical support</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We're here for maintenance, updates, and scaling.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.5">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Business-focused solutions</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Not just code — we build digital foundations for growth.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center" data-animate="fade-up" data-delay="0.6">
                <p class="text-lg font-semibold text-heading">
                    We don't just build websites — <span class="text-clip">we build digital foundations for growth</span>.
                </p>
            </div>
        </div>
    </section>

    <!-- Who We Work With Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Who We <span class="text-clip">Work With</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <div class="text-center" data-animate="fade-up">
                    <div class="service-icon text-2xl mx-auto mb-3">🚀</div>
                    <h3 class="text-lg font-semibold text-heading">Startups & founders</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mx-auto mb-3">🏢</div>
                    <h3 class="text-lg font-semibold text-heading">Small & medium businesses</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mx-auto mb-3">💼</div>
                    <h3 class="text-lg font-semibold text-heading">Agencies & consultants</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mx-auto mb-3">🔧</div>
                    <h3 class="text-lg font-semibold text-heading">Service-based companies</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mx-auto mb-3">👥</div>
                    <h3 class="text-lg font-semibold text-heading">Growing tech teams</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">FAQs</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Frequently Asked <span class="text-clip">Questions</span>
                </h2>
            </div>

            <div class="space-y-4">
                <div class="faq-item" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-heading mb-2">How long does web development take?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Project timelines vary, but most websites take <strong>2–6 weeks</strong> depending on complexity.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you build SEO-ready websites?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Yes. Every website is built with <strong>technical SEO, performance, and clean structure</strong>.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Can you work with existing websites?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Absolutely. We handle redesigns, optimizations, and feature upgrades.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you provide maintenance?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Yes. We offer ongoing support, updates, and performance monitoring.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6" data-animate="fade-up">
                Ready to Build a <span class="text-white">High-Performance Website</span>?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Let's turn your idea into a fast, scalable, and conversion-focused website.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="{{ route('contact') }}" class="bg-surface-1 text-heading px-8 py-3 rounded-lg font-semibold hover:bg-app-background transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Get a Free Consultation
                </a>
                <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-surface-1/10 transition-all transform hover:scale-105">
                    Get a Custom Quote
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('components.service-blogs', [
        'serviceKey' => 'web-development',
        'service' => config('service_pages.web-development'),
    ])

    @include('components.footer')

    @include('components.service-schema', ['serviceKey' => 'web-development'])
    
    <!-- Additional Breadcrumb Schema (service-schema already includes breadcrumb, but this ensures it's present) -->
    @php
        $serviceConfig = config('service_pages.web-development');
    @endphp

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

