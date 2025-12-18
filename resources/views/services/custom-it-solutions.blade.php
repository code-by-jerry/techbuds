<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Custom IT Solutions | Tailor-Made Business Software – Techbuds</title>
        <meta name="description" content="Custom IT solutions and software development tailored to your workflows: CRMs, ERPs, internal systems, dashboards, and integrations built for growth.">

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
                <span class="service-pill">Custom IT Solutions</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-heading leading-tight" data-animate="fade-up" data-delay="0.1">
                Tailor-Made Software <span class="text-clip">Built Around Your Business Needs</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-heading/80 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.2">
                Every business operates differently — your software should too. At <strong>Techbuds</strong>, we deliver custom IT solutions designed specifically for your workflows, challenges, and growth goals. No templates. No unnecessary features. Only systems that solve real problems.
            </p>
            <p class="mt-4 text-base md:text-lg text-heading/70 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.3">
                We build scalable, secure, and future-ready software that evolves with your business.
            </p>
        </div>
    </section>

    <!-- Why Custom IT Solutions Matter Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why <span class="text-clip">Custom IT Solutions</span> Matter
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-heading mb-4">Off-the-shelf software often leads to:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Unused features</div>
                        <div class="feature-item">Workflow mismatches</div>
                        <div class="feature-item">Scalability limitations</div>
                        <div class="feature-item">Integration challenges</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-heading mb-4">Custom IT solutions give you:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Full control over features and workflows</div>
                        <div class="feature-item">Perfect fit for your operations</div>
                        <div class="feature-item">Better scalability and performance</div>
                        <div class="feature-item">Easier integrations with existing systems</div>
                    </div>
                    <p class="mt-4 text-sm text-heading/70 leading-relaxed">
                        Custom systems deliver <strong>full control, flexibility, and efficiency</strong>.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Custom IT Solutions Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Custom IT Solutions</span> Services
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 max-w-3xl mx-auto">
                    From core business applications to dashboards and integrations — we build systems that match how you work.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Custom Software Development -->
                <div class="service-card" data-animate="fade-up">
                    <div class="service-icon text-2xl mb-4">🛠️</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Custom Software Development</h3>
                    <p class="text-sm text-heading/70 mb-3">Software built exactly to your requirements.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Business-specific applications</div>
                        <div class="feature-item">Web-based software solutions</div>
                        <div class="feature-item">Scalable backend systems</div>
                        <div class="feature-item">Secure user authentication</div>
                    </div>
                </div>

                <!-- CRM & ERP Systems -->
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mb-4">📂</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">CRM & ERP Systems</h3>
                    <p class="text-sm text-heading/70 mb-3">Centralize operations and improve efficiency.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Custom CRM solutions</div>
                        <div class="feature-item">ERP & management systems</div>
                        <div class="feature-item">Sales, operations & reporting automation</div>
                        <div class="feature-item">Role-based access control</div>
                    </div>
                </div>

                <!-- Internal Management Systems -->
                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mb-4">🏢</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Internal Management Systems</h3>
                    <p class="text-sm text-heading/70 mb-3">Streamline internal workflows across teams.</p>
                    <div class="space-y-2">
                        <div class="feature-item">HR & employee management systems</div>
                        <div class="feature-item">Task & project management tools</div>
                        <div class="feature-item">Inventory & asset tracking</div>
                        <div class="feature-item">Approval & workflow systems</div>
                    </div>
                </div>

                <!-- Custom Dashboards & Admin Panels -->
                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">Custom Dashboards & Admin Panels</h3>
                    <p class="text-sm text-heading/70 mb-3">Real-time visibility into your business data.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Data dashboards & reports</div>
                        <div class="feature-item">Admin panels</div>
                        <div class="feature-item">KPI tracking</div>
                        <div class="feature-item">Analytics integration</div>
                    </div>
                </div>

                <!-- System Integration & Automation -->
                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mb-4">🔗</div>
                    <h3 class="text-xl font-semibold text-heading mb-3">System Integration & Automation</h3>
                    <p class="text-sm text-heading/70 mb-3">Make your systems work together smoothly.</p>
                    <div class="space-y-2">
                        <div class="feature-item">API development & integration</div>
                        <div class="feature-item">Third-party system integration</div>
                        <div class="feature-item">Process automation</div>
                        <div class="feature-item">Data synchronization</div>
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
                    We choose reliable and scalable tech stacks that fit your project and growth plans.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="service-card text-center" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-heading mb-2">Frontend</h3>
                    <p class="text-sm text-heading/70">HTML, Tailwind CSS, JavaScript</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Backend</h3>
                    <p class="text-sm text-heading/70">Laravel, API-driven architecture</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Database</h3>
                    <p class="text-sm text-heading/70">MySQL and relational data modeling</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">APIs & Deployment</h3>
                    <p class="text-sm text-heading/70">RESTful services, cloud-ready infrastructure</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Development Process Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Process</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Our <span class="text-clip">Development</span> Process
                </h2>
            </div>

            <div class="space-y-6">
                <div class="process-step" data-animate="fade-up">
                    <div class="process-number">1</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Requirement Discovery</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Understanding your workflows, challenges, and business objectives.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.1">
                    <div class="process-number">2</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Solution Architecture</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Designing scalable, secure, and maintainable system architecture.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.2">
                    <div class="process-number">3</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Development & Testing</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Clean code, performance testing, and security checks across features.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.3">
                    <div class="process-number">4</div>
                    <h3 class="text-xl font-semibold text-heading mb-2">Deployment & Support</h3>
                    <p class="text-base text-heading/70 leading-relaxed">Launch, monitoring, support, and continuous improvement.</p>
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
                    Why Choose <span class="text-clip">Techbuds for Custom IT Solutions</span>?
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card" data-animate="fade-up">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Business-first development approach</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We start with your operations and goals, then design software around them.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Fully customized systems</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">No generic tools — every system is tailored to your exact needs.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Scalable and secure architecture</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">Built to handle growth while keeping your data and users safe.</p>
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
                            <p class="text-sm text-heading/70 leading-relaxed">Clear timelines, regular updates, and direct collaboration.</p>
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
                            <p class="text-sm text-heading/70 leading-relaxed">We stay with you after launch to maintain, improve, and extend your systems.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.5">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-brand-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-heading mb-2">Operational advantage</h3>
                            <p class="text-sm text-heading/70 leading-relaxed">We don’t just develop software — <strong>we build operational advantage</strong>.</p>
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
                    <div class="service-icon text-2xl mx-auto mb-3">📈</div>
                    <h3 class="text-lg font-semibold text-heading">Growing businesses</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mx-auto mb-3">🚀</div>
                    <h3 class="text-lg font-semibold text-heading">Startups & founders</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mx-auto mb-3">🏢</div>
                    <h3 class="text-lg font-semibold text-heading">Enterprises with custom workflows</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mx-auto mb-3">🤝</div>
                    <h3 class="text-lg font-semibold text-heading">Agencies & consultants</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mx-auto mb-3">🧩</div>
                    <h3 class="text-lg font-semibold text-heading">Operations-driven teams</h3>
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
                    <h3 class="text-lg font-semibold text-heading mb-2">How is custom software different from ready-made tools?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Custom software is built to match your exact workflows and requirements, improving efficiency, scalability, and user adoption compared to generic tools.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-heading mb-2">Can custom systems scale as my business grows?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Yes. Scalability is a core design principle — we plan for future users, data, and features from the start.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-heading mb-2">Will you maintain and upgrade the system?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Absolutely. We provide ongoing support, maintenance, and enhancements as your needs evolve.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-heading mb-2">Is custom software secure?</h3>
                    <p class="text-sm text-heading/70 leading-relaxed">Security and access control are built into every solution, from authentication to data protection and user roles.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-brand-primary to-brand-hover text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6" data-animate="fade-up">
                Ready to Build Software <span class="text-white">That Fits Your Business</span>?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Let’s create a system designed around how you work, not the other way around.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="/#contact" class="bg-surface-1 text-heading px-8 py-3 rounded-lg font-semibold hover:bg-app-background transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Get a Free Custom IT Consultation
                </a>
                <a href="/#contact" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-surface-1/10 transition-all transform hover:scale-105">
                    Discuss Your Software Needs
                </a>
            </div>
        </div>
    </section>

    @include('components.service-blogs', [
        'serviceKey' => 'custom-it-solutions',
        'service' => config('service_pages.custom-it-solutions'),
    ])

    <!-- Footer -->
    @include('components.footer')

    @include('components.service-schema', ['serviceKey' => 'custom-it-solutions'])

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


