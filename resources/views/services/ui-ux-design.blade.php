<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UI/UX Design & Branding Services | Product Design – Techbuds</title>
        <meta name="description" content="UI/UX design and branding services: product design, web & mobile UX, branding, redesigns. Design experiences that build trust, engagement, and conversions.">

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
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div data-animate="fade-up">
                <span class="service-pill">UI/UX Design & Branding</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-heading leading-tight" data-animate="fade-up" data-delay="0.1">
                Design Experiences That <span class="text-clip">Build Trust, Engagement & Conversions</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-heading/80 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.2">
                Design is not just how your product looks — it is how users <strong>experience, understand, and trust</strong> your brand. At <strong>Techbuds</strong>, we deliver user-centered UI/UX design and strategic branding that helps businesses stand out, connect with users, and convert consistently.
            </p>
            <p class="mt-4 text-base md:text-lg text-heading/70 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.3">
                We blend research, creativity, and business strategy to design digital experiences that work in the real world.
            </p>
        </div>
    </section>

    <!-- Why UI/UX & Branding Matter Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why <span class="text-clip">UI/UX Design & Branding</span> Matter
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-heading mb-4">Strong design directly impacts:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">User engagement & retention</div>
                        <div class="feature-item">Conversion rates</div>
                        <div class="feature-item">Brand credibility</div>
                        <div class="feature-item">Product usability</div>
                        <div class="feature-item">Customer loyalty</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-heading mb-4">Poor design often leads to:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">High bounce rates</div>
                        <div class="feature-item">Confusing user journeys</div>
                        <div class="feature-item">Low trust and credibility</div>
                        <div class="feature-item">Lost leads and revenue</div>
                    </div>
                    <p class="mt-4 text-sm text-heading/70 leading-relaxed">
                        Our design approach ensures <strong>clarity, consistency, and conversion</strong> across every touchpoint.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our UI/UX & Branding Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">UI/UX Design & Branding</span> Services
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    From product interfaces to full brand systems — we design experiences that users remember and trust.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- UI Design -->
                <div class="service-card" data-animate="fade-up">
                    <div class="service-icon text-2xl mb-4">🎨</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">UI Design (User Interface)</h3>
                    <p class="text-sm text-heading/70 mb-3">Visually appealing, modern interfaces that align with your brand.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Web & mobile UI design</div>
                        <div class="feature-item">Design systems & style guides</div>
                        <div class="feature-item">Consistent visual language</div>
                        <div class="feature-item">Pixel-perfect layouts</div>
                    </div>
                </div>

                <!-- UX Design -->
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mb-4">🧭</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">UX Design (User Experience)</h3>
                    <p class="text-sm text-heading/70 mb-3">Design that guides users effortlessly through your product.</p>
                    <div class="space-y-2">
                        <div class="feature-item">User research & personas</div>
                        <div class="feature-item">User flows & journey mapping</div>
                        <div class="feature-item">Wireframes & prototypes</div>
                        <div class="feature-item">Usability optimization</div>
                    </div>
                </div>

                <!-- Branding & Visual Identity -->
                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mb-4">💎</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Branding & Visual Identity</h3>
                    <p class="text-sm text-heading/70 mb-3">Build a brand that users recognize, remember, and trust.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Logo design & refinement</div>
                        <div class="feature-item">Brand colors, typography & guidelines</div>
                        <div class="feature-item">Visual identity systems</div>
                        <div class="feature-item">Brand consistency across platforms</div>
                    </div>
                </div>

                <!-- Web & Mobile App Design -->
                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mb-4">📱</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Web & Mobile App Design</h3>
                    <p class="text-sm text-heading/70 mb-3">Designs optimized for real-world usage and business outcomes.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Website UI/UX design</div>
                        <div class="feature-item">Mobile app interface design</div>
                        <div class="feature-item">Responsive & mobile-first layouts</div>
                        <div class="feature-item">Conversion-focused screens</div>
                    </div>
                </div>

                <!-- Design Optimization & Redesign -->
                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mb-4">♻️</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Design Optimization & Redesign</h3>
                    <p class="text-sm text-heading/70 mb-3">Improve existing products for better performance and engagement.</p>
                    <div class="space-y-2">
                        <div class="feature-item">UX audits & usability analysis</div>
                        <div class="feature-item">UI modernization</div>
                        <div class="feature-item">Conversion & engagement improvements</div>
                        <div class="feature-item">Accessibility enhancements</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Design Process Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Process</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Design Process</span>
                </h2>
            </div>

            <div class="space-y-6">
                <div class="process-step" data-animate="fade-up">
                    <div class="process-number">1</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Research & Discovery</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Understanding users, business goals, and brand direction.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.1">
                    <div class="process-number">2</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Strategy & Planning</h3>
                    <p class="text-base text-heading/70 leading-relaxed">User flows, information architecture, and a clear design roadmap.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.2">
                    <div class="process-number">3</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Design & Prototyping</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Wireframes, high-fidelity designs, and interactive prototypes.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.3">
                    <div class="process-number">4</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Testing & Delivery</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Usability testing, feedback loops, and final handoff to development.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Techbuds Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Why Choose Us</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why Choose <span class="text-clip">Techbuds for UI/UX & Branding</span>?
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card" data-animate="fade-up">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">User-first, business-driven design</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Every design decision is based on user behavior and business outcomes.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Modern, clean, and scalable design systems</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We build reusable components and design systems that scale with your product.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Strong collaboration with development teams</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Developer-ready designs, assets, and documentation for smooth handoff.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Conversion-focused layouts</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We design flows and screens that guide users toward action.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Consistent branding across touchpoints</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">From website to product UI, your brand feels unified everywhere.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.5">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Experiences that convert</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We design not just screens — we design experiences that convert.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industries We Serve Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Industries We <span class="text-clip">Serve</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <div class="text-center" data-animate="fade-up">
                    <div class="service-icon text-2xl mx-auto mb-3">🚀</div>
                    <h3 class="text-lg font-semibold text-heading">Startups & SaaS products</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mx-auto mb-3">🛒</div>
                    <h3 class="text-lg font-semibold text-heading">E-commerce platforms</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mx-auto mb-3">🔧</div>
                    <h3 class="text-lg font-semibold text-heading">Service-based businesses</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mx-auto mb-3">🏢</div>
                    <h3 class="text-lg font-semibold text-heading">Enterprise applications</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mx-auto mb-3">📌</div>
                    <h3 class="text-lg font-semibold text-heading">Digital agencies</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Tools We Use Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Tools We <span class="text-clip">Use</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <div class="text-center" data-animate="fade-up">
                    <h3 class="text-base font-semibold text-heading">Figma</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-base font-semibold text-heading">Adobe XD</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-base font-semibold text-heading">Design systems & libraries</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-base font-semibold text-heading">Prototyping tools</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.4">
                    <h3 class="text-base font-semibold text-heading">UX research & testing tools</h3>
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
                    <h3 class="text-lg font-semibold text-heading mb-2">What is the difference between UI and UX?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">UI focuses on <strong>visual design</strong> — colors, typography, and layout — while UX focuses on <strong>user experience and usability</strong>. Both work together to create a product users love.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Do you redesign existing products?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Yes. We perform UX audits, modernize UI, and improve flows to increase usability, engagement, and conversions.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Will designs be developer-ready?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Absolutely. We provide clean Figma files, components, specs, and exportable assets so development teams can implement quickly.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">Is branding included with UI/UX?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Yes. We offer complete branding and visual identity solutions alongside product UI/UX design.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6" data-animate="fade-up">
                Ready to Design a <span class="text-white">Product Users Love</span>?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Let’s build a design and brand that truly represents your business and delights your users.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="{{ route('contact') }}" class="bg-surface-1 text-heading px-8 py-3 rounded-lg font-semibold hover:bg-app-background transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Get a Free UI/UX Consultation
                </a>
                <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-surface-1/10 transition-all transform hover:scale-105">
                    Discuss Your Product
                </a>
            </div>
        </div>
    </section>

    @include('components.service-blogs', [
        'serviceKey' => 'ui-ux-design',
        'service' => config('service_pages.ui-ux-design'),
    ])

    <!-- Footer -->
    @include('components.footer')

    @include('components.service-schema', ['serviceKey' => 'ui-ux-design'])

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


