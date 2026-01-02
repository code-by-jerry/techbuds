<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php
            $metaTitle = 'Web Hosting, App Deployment & Support Services | Reliable Hosting – Techbuds';
            $metaDescription = 'Reliable web hosting, smooth application deployment, and ongoing technical support services. We manage hosting setup, deployment, monitoring, updates, and long-term maintenance for your websites and applications.';
            $metaKeywords = 'web hosting services, app deployment, hosting support, website hosting, application deployment, hosting management, server support, deployment services, hosting migration, technical support services';
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
                src="{{ asset('images/banner images/service-page-banner.jpg') }}" 
                alt="Web Hosting, App Deployment & Support Services - Techbuds" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto w-full z-10">
            <div data-animate="fade-up">
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">Web Hosting, App Deployment & Support</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                Reliable Hosting, Smooth Deployments & <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">Ongoing Technical Support</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                A website or application is only as good as the infrastructure it runs on. At <strong class="text-white">Techbuds</strong>, we provide web hosting, application deployment, and ongoing support services to ensure your digital products are secure, stable, and always available.
            </p>
            <p class="mt-4 text-base md:text-lg text-white/85 max-w-3xl leading-relaxed drop-shadow-sm" data-animate="fade-up" data-delay="0.3">
                We handle the technical complexity so you can focus on your business.
            </p>
        </div>
    </section>

    <!-- What This Service Covers Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    What This <span class="text-clip">Service Covers</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    This service is ideal for businesses that want <strong>peace of mind</strong>, not infrastructure headaches.
                </p>
                <p class="mt-3 text-lg md:text-xl text-heading/90 max-w-3xl mx-auto font-medium">
                    We manage hosting, deployment, updates, and support — end to end.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Hosting, Deployment & Support Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Hosting, Deployment & Support</span> Services
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Web Hosting Management -->
                <div class="service-card" data-animate="fade-up">
                    <div class="service-icon text-2xl mb-4">🌐</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Web Hosting Management</h3>
                    <p class="text-sm text-heading/70 mb-3">Secure and reliable hosting for websites and web applications.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Hosting setup & configuration</div>
                        <div class="feature-item">Shared, VPS, or cloud hosting support</div>
                        <div class="feature-item">Domain & DNS configuration</div>
                        <div class="feature-item">SSL certificate setup</div>
                        <div class="feature-item">Server hardening & security basics</div>
                    </div>
                </div>

                <!-- Application Deployment -->
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mb-4">🚀</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Application Deployment</h3>
                    <p class="text-sm text-heading/70 mb-3">Smooth, error-free deployments for modern applications.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Web application deployment</div>
                        <div class="feature-item">Mobile backend deployment (APIs)</div>
                        <div class="feature-item">Environment configuration (staging & production)</div>
                        <div class="feature-item">Zero-downtime deployment practices</div>
                        <div class="feature-item">Version-controlled releases</div>
                    </div>
                </div>

                <!-- Cloud & Server Support -->
                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mb-4">⚙️</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Cloud & Server Support</h3>
                    <p class="text-sm text-heading/70 mb-3">We ensure your infrastructure runs reliably.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Server monitoring</div>
                        <div class="feature-item">Performance optimization</div>
                        <div class="feature-item">Resource scaling guidance</div>
                        <div class="feature-item">Error & downtime handling</div>
                        <div class="feature-item">Backup configuration</div>
                    </div>
                </div>

                <!-- Ongoing Maintenance & Support -->
                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mb-4">🔧</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Ongoing Maintenance & Support</h3>
                    <p class="text-sm text-heading/70 mb-3">Long-term technical assistance you can rely on.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Software updates & patches</div>
                        <div class="feature-item">Bug fixes & minor improvements</div>
                        <div class="feature-item">Security updates</div>
                        <div class="feature-item">Backup monitoring & recovery</div>
                        <div class="feature-item">Technical support & issue resolution</div>
                    </div>
                </div>

                <!-- Hosting Migration & Upgrades -->
                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mb-4">📦</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Hosting Migration & Upgrades</h3>
                    <p class="text-sm text-heading/70 mb-3">Move or upgrade without disruption.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Website & app migration</div>
                        <div class="feature-item">Hosting upgrades</div>
                        <div class="feature-item">Server optimization during migration</div>
                        <div class="feature-item">Data integrity checks</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Platforms & Technologies Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Platforms & <span class="text-clip">Technologies We Support</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    Vendor-neutral support — we help you choose what fits your needs.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="service-card text-center" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-heading mb-2">Web Hosting Platforms</h3>
                    <p class="text-sm text-heading/70">Shared, VPS, cloud hosting</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Laravel & PHP</h3>
                    <p class="text-sm text-heading/70">PHP applications & Laravel frameworks</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">MySQL Databases</h3>
                    <p class="text-sm text-heading/70">Database hosting & management</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">API Backends</h3>
                    <p class="text-sm text-heading/70">Mobile backend APIs & integrations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Deployment & Support Process Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Process</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Deployment & Support</span> Process
                </h2>
            </div>

            <div class="space-y-6">
                <div class="process-step" data-animate="fade-up">
                    <div class="process-number">1</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Infrastructure Review</h3>
                    <p class="text-base text-heading/70 leading-relaxed">We review your application and hosting requirements.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.1">
                    <div class="process-number">2</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Setup & Deployment</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Hosting setup, environment configuration, and deployment.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.2">
                    <div class="process-number">3</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Testing & Go-Live</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Final checks, performance validation, and launch.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.3">
                    <div class="process-number">4</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Monitoring & Support</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Ongoing monitoring, updates, and technical assistance.</p>
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
                    Why Choose <span class="text-clip">Techbuds</span>?
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card" data-animate="fade-up">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Clean, reliable deployments</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We deploy correctly, the first time, every time.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Secure and stable hosting setups</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Your applications run on secure, optimized infrastructure.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Fast issue resolution</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We respond quickly and fix problems before they impact your business.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Clear communication & documentation</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">You always know what's happening and why.</p>
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
                            <p class="text-sm text-heading/70 leading-relaxed">We don't just deploy — we stay with you after launch.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who This Service Is For Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Who This <span class="text-clip">Service Is For</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <div class="text-center" data-animate="fade-up">
                    <div class="service-icon text-2xl mx-auto mb-3">🌐</div>
                    <h3 class="text-lg font-semibold text-heading">Business websites</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mx-auto mb-3">🚀</div>
                    <h3 class="text-lg font-semibold text-heading">Startups & SaaS products</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mx-auto mb-3">📱</div>
                    <h3 class="text-lg font-semibold text-heading">Web & mobile applications</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mx-auto mb-3">🏢</div>
                    <h3 class="text-lg font-semibold text-heading">Agencies needing deployment support</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mx-auto mb-3">💼</div>
                    <h3 class="text-lg font-semibold text-heading">Businesses without in-house DevOps teams</h3>
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
                @php
                    $service = config('service_pages.web-hosting-app-deployment-support');
                @endphp
                @if(isset($service['faqs']))
                    @foreach($service['faqs'] as $index => $faq)
                    <div class="faq-item" data-animate="fade-up" data-delay="{{ $index * 0.1 }}">
                        <h3 class="text-lg font-semibold text-heading mb-2">{{ $faq['q'] }}</h3>
                        <p class="text-sm text-heading/70 leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6" data-animate="fade-up">
                Ready for <span class="text-white">Reliable Hosting & Support</span>?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Let's deploy and maintain your website or application the right way.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="{{ route('contact') }}" class="bg-surface-1 text-heading px-8 py-3 rounded-lg font-semibold hover:bg-app-background transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Get Free Hosting Consultation
                </a>
                <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-surface-1/10 transition-all transform hover:scale-105">
                    Discuss Your Deployment Needs
                </a>
            </div>
        </div>
    </section>

    @include('components.service-blogs', [
        'serviceKey' => 'web-hosting-app-deployment-support',
        'service' => config('service_pages.web-hosting-app-deployment-support'),
    ])

    <!-- Footer -->
    @include('components.footer')

    @include('components.service-schema', ['serviceKey' => 'web-hosting-app-deployment-support'])

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

