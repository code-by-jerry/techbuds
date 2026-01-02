<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Mobile App Development Services | Android & iOS Apps – Techbuds';
            $metaDescription = 'Professional mobile app development: Android, iOS, cross-platform apps using Flutter and React Native. Native development, API integration, App Store Optimization. Build high-performance mobile applications.';
            $metaKeywords = 'mobile app development, Android app development, iOS app development, Flutter app development, React Native development, cross-platform apps, mobile application development, app development company, mobile app developers';
        @endphp
        @include('components.meta-tags')
        @include('components.google-analytics')

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
                src="{{ asset('images/banner images/app development.jpg') }}" 
                alt="Mobile App Development Services - Techbuds" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto w-full z-10">
            <div data-animate="fade-up">
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">Mobile App Development</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                High-Performance Android & iOS Apps <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">Built for Growth</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                A successful mobile app is more than functionality — it's <strong class="text-white">experience, performance, and scalability</strong>. At <strong class="text-white">Techbuds</strong>, we design and develop powerful mobile applications that engage users, drive retention, and support long-term business growth.
            </p>
            <p class="mt-4 text-base md:text-lg text-white/85 max-w-3xl leading-relaxed drop-shadow-sm" data-animate="fade-up" data-delay="0.3">
                From startups to growing businesses, we build mobile apps that are reliable, secure, and future-ready.
            </p>
        </div>
    </section>

    <!-- Why Mobile Apps Matter Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why Mobile Apps <span class="text-clip">Matter for Your Business</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card" data-animate="fade-up">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Reach customers directly</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Connect with users on their most personal device.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Improve user engagement</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Keep users coming back with intuitive experiences.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Increase brand loyalty</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Build stronger relationships with your audience.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Automate business processes</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Streamline operations with mobile automation.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Unlock new revenue streams</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Monetize your app with in-app purchases, subscriptions, and more.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center" data-animate="fade-up" data-delay="0.5">
                <p class="text-lg font-semibold text-heading">
                    Our mobile app development services ensure your app is <span class="text-clip">fast, intuitive, and scalable</span> from day one.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Mobile App Development Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Mobile App Development Services</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    Comprehensive mobile solutions for Android, iOS, and cross-platform development
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Android App Development -->
                <div class="service-card" data-animate="fade-up">
                    <div class="service-icon text-2xl mb-4">🤖</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Android App Development</h3>
                    <p class="text-sm text-heading/70 mb-3">Custom Android apps built for performance, stability, and usability.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Native Android development</div>
                        <div class="feature-item">Material Design principles</div>
                        <div class="feature-item">Secure authentication & APIs</div>
                        <div class="feature-item">Optimized performance across devices</div>
                    </div>
                </div>

                <!-- iOS App Development -->
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mb-4">🍎</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">iOS App Development</h3>
                    <p class="text-sm text-heading/70 mb-3">Elegant and reliable iOS applications tailored to Apple ecosystem standards.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Native iOS development</div>
                        <div class="feature-item">Clean UI & smooth animations</div>
                        <div class="feature-item">Secure data handling</div>
                        <div class="feature-item">App Store compliance</div>
                    </div>
                </div>

                <!-- Cross-Platform App Development -->
                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mb-4">🔄</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Cross-Platform App Development</h3>
                    <p class="text-sm text-heading/70 mb-3">One codebase, multiple platforms — faster delivery without compromise.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Shared architecture for Android & iOS</div>
                        <div class="feature-item">Consistent UI/UX</div>
                        <div class="feature-item">Cost-effective development</div>
                        <div class="feature-item">Easy scalability & maintenance</div>
                    </div>
                </div>

                <!-- API Development & Integration -->
                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mb-4">🔌</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">API Development & Integration</h3>
                    <p class="text-sm text-heading/70 mb-3">We build mobile apps that connect seamlessly with your systems.</p>
                    <div class="space-y-2">
                        <div class="feature-item">RESTful API development</div>
                        <div class="feature-item">Third-party service integration</div>
                        <div class="feature-item">Payment gateways</div>
                        <div class="feature-item">Real-time data synchronization</div>
                    </div>
                </div>

                <!-- App Maintenance & Upgrades -->
                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mb-4">🔧</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">App Maintenance & Upgrades</h3>
                    <p class="text-sm text-heading/70 mb-3">We support your app beyond launch.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Performance monitoring</div>
                        <div class="feature-item">Bug fixes & updates</div>
                        <div class="feature-item">Feature enhancements</div>
                        <div class="feature-item">OS compatibility upgrades</div>
                    </div>
                </div>

                <!-- App Store Optimization (ASO) -->
                <div class="service-card" data-animate="fade-up" data-delay="0.5">
                    <div class="service-icon text-2xl mb-4">📈</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">App Store Optimization (ASO)</h3>
                    <p class="text-sm text-heading/70 mb-3">We ensure your app gets discovered.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Keyword optimization</div>
                        <div class="feature-item">App title & description optimization</div>
                        <div class="feature-item">Visual asset guidance</div>
                        <div class="feature-item">Performance & conversion improvement</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies We Use Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Technologies We <span class="text-clip">Use</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    We choose the right tools for stability, performance, and scalability.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="service-card text-center" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-heading mb-2">Mobile Platforms</h3>
                    <p class="text-sm text-heading/70">Android (Kotlin, Java), iOS (Swift, Objective-C), React Native, Flutter, Xamarin</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Backend & APIs</h3>
                    <p class="text-sm text-heading/70">Node.js, Laravel, Python, Firebase, RESTful APIs, GraphQL, WebSockets</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Database & Storage</h3>
                    <p class="text-sm text-heading/70">MySQL, PostgreSQL, MongoDB, Firebase Realtime, SQLite, Cloud Storage</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">Cloud & Services</h3>
                    <p class="text-sm text-heading/70">AWS, GCP, Azure, Firebase, App Store & Play Store publishing</p>
                </div>
            </div>

            <div class="mt-8 text-center" data-animate="fade-up" data-delay="0.4">
                <p class="text-base text-heading/70 max-w-3xl mx-auto">
                    <strong>Not limited to any single stack.</strong> We build mobile apps using native development, cross-platform frameworks, or hybrid solutions — whatever best fits your project requirements and business goals.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Mobile App Development Process Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Process</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Mobile App Development Process</span>
                </h2>
            </div>

            <div class="space-y-6">
                <div class="process-step" data-animate="fade-up">
                    <div class="process-number">1</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Discovery & Planning</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Understanding your idea, users, and business objectives.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.1">
                    <div class="process-number">2</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">UI/UX Design</h3>
                    <p class="text-base text-heading/70 leading-relaxed">User flows, wireframes, and intuitive interface design.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.2">
                    <div class="process-number">3</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Development & Testing</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Clean code, performance testing, and secure implementation.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.3">
                    <div class="process-number">4</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Launch & Support</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Store deployment, monitoring, and continuous improvement.</p>
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
                    Why Choose <span class="text-clip">Techbuds for Mobile App Development</span>?
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card" data-animate="fade-up">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">User-centric design approach</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We prioritize user experience and intuitive interfaces.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Scalable and secure architecture</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Built to grow with your business and protect user data.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Clean, maintainable code</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Well-structured code that's easy to update and extend.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Transparent communication</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Regular updates and clear project timelines.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">End-to-end development support</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">From concept to launch and beyond.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.5">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Business-aligned app solutions</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Apps that drive real business value and growth.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center" data-animate="fade-up" data-delay="0.6">
                <p class="text-lg font-semibold text-heading">
                    We build apps that <span class="text-clip">users love and businesses trust</span>.
                </p>
            </div>
        </div>
    </section>

    <!-- Industries We Serve Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Industries We <span class="text-clip">Serve</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <div class="text-center" data-animate="fade-up">
                    <div class="service-icon text-2xl mx-auto mb-3">🚀</div>
                    <h3 class="text-lg font-semibold text-heading">Startups & SaaS</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mx-auto mb-3">🛒</div>
                    <h3 class="text-lg font-semibold text-heading">E-commerce</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mx-auto mb-3">🔧</div>
                    <h3 class="text-lg font-semibold text-heading">Service-based businesses</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mx-auto mb-3">🏢</div>
                    <h3 class="text-lg font-semibold text-heading">Internal enterprise apps</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mx-auto mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-heading">On-demand platforms</h3>
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
                    <h3 class="text-lg font-semibold text-heading mb-2">How long does it take to build a mobile app?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Most mobile apps take <strong>6–12 weeks</strong>, depending on features and complexity.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you develop both Android and iOS apps?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Yes. We develop <strong>Android, iOS, and cross-platform apps</strong>.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Will my app be scalable?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Absolutely. Our architecture is designed for future growth.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you provide post-launch support?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Yes. We offer maintenance, updates, and feature enhancements.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6" data-animate="fade-up">
                Ready to Build Your <span class="text-white">Mobile App</span>?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Turn your idea into a powerful mobile experience.
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

    @include('components.service-blogs', [
        'serviceKey' => 'mobile-app-development',
        'service' => config('service_pages.mobile-app-development'),
    ])

    <!-- Footer -->
    @include('components.footer')

    @include('components.service-schema', ['serviceKey' => 'mobile-app-development'])

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

