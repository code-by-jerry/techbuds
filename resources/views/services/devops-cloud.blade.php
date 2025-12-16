<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevOps & Cloud Deployment Services | Secure & Scalable – Techbuds</title>
        <meta name="description" content="DevOps and cloud deployment services: CI/CD pipelines, cloud infrastructure, monitoring, security, backups. Build secure, scalable, high-performance systems.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Styles -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <style>
            .text-clip {
                background: linear-gradient(135deg, #088395 0%, #37B7C3 50%, #7E30E1 100%);
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
                background: rgba(8,131,149,0.08);
                color: #11224E;
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
                background: linear-gradient(135deg, #11224E 0%, #088395 100%);
                color: #FFFDF6;
                align-items: center;
                justify-content: center;
                box-shadow: 0 15px 35px rgba(8,131,149,0.25);
            }

            .service-card {
                position: relative;
                border-radius: 1.5rem;
                overflow: hidden;
                background: rgba(255,255,255,0.95);
                border: 1px solid rgba(8,131,149,0.1);
                box-shadow: 0 16px 45px rgba(8,131,149,0.12);
                transition: transform .45s ease, box-shadow .45s ease;
                padding: 2rem;
            }

            .service-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 24px 70px rgba(8,131,149,0.16);
            }

            .feature-item {
                position: relative;
                padding-left: 1.4rem;
                font-size: 0.9rem;
                color: rgba(8,131,149,0.78);
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
                background: linear-gradient(135deg, #11224E 0%, #088395 100%);
                box-shadow: 0 6px 12px rgba(8,131,149,0.25);
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
                background: linear-gradient(180deg, #088395 0%, rgba(8,131,149,0.2) 100%);
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
                background: linear-gradient(135deg, #11224E 0%, #088395 100%);
                color: #FFFDF6;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 0.75rem;
                box-shadow: 0 6px 12px rgba(8,131,149,0.25);
            }

            .faq-item {
                background: rgba(255,255,255,0.9);
                border-radius: 1rem;
                padding: 1.5rem;
                border: 1px solid rgba(8,131,149,0.1);
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
<body class="bg-[#FFFDF6] text-gray-900 antialiased">
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-7xl mx-auto">
            <div data-animate="fade-up">
                <span class="service-pill">DevOps & Cloud Deployment</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-bold text-[#11224E] leading-tight" data-animate="fade-up" data-delay="0.1">
                Secure, Scalable & <span class="text-clip">High-Performance Infrastructure</span> for Modern Applications
            </h1>
            <p class="mt-6 text-lg md:text-xl text-[#11224E]/80 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.2">
                A great product fails without reliable infrastructure. At <strong>Techbuds</strong>, we provide DevOps and cloud deployment services that ensure your applications run fast, stay secure, and scale seamlessly — without downtime or operational chaos.
            </p>
            <p class="mt-4 text-base md:text-lg text-[#11224E]/70 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.3">
                We help businesses automate, monitor, and optimize their infrastructure for long-term stability and growth.
            </p>
        </div>
    </section>

    <!-- Why DevOps & Cloud Matter Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Why <span class="text-clip">DevOps & Cloud Infrastructure</span> Matter
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">Modern applications require:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Fast deployments</div>
                        <div class="feature-item">Zero-downtime updates</div>
                        <div class="feature-item">High availability</div>
                        <div class="feature-item">Scalability under load</div>
                        <div class="feature-item">Continuous monitoring</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">Our DevOps solutions help you:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Eliminate manual deployment errors</div>
                        <div class="feature-item">Create stable and automated pipelines</div>
                        <div class="feature-item">Improve uptime and reliability</div>
                        <div class="feature-item">Scale infrastructure with confidence</div>
                    </div>
                    <p class="mt-4 text-sm text-[#11224E]/70 leading-relaxed">
                        We build <strong>stable, automated, and resilient systems</strong> that support your product growth.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our DevOps & Cloud Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Our <span class="text-clip">DevOps & Cloud</span> Services
                </h2>
                <p class="mt-4 text-base md:text-lg text-[#11224E]/80 max-w-3xl mx-auto">
                    End-to-end DevOps and cloud services — from infrastructure design to monitoring and security.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Cloud Infrastructure Setup -->
                <div class="service-card" data-animate="fade-up">
                    <div class="service-icon text-2xl mb-4">☁️</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">Cloud Infrastructure Setup</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Design and deploy scalable, secure cloud environments.</p>
                    <div class="space-y-2">
                        <div class="feature-item">AWS, GCP & DigitalOcean deployment</div>
                        <div class="feature-item">Server provisioning & configuration</div>
                        <div class="feature-item">Secure network architecture</div>
                        <div class="feature-item">Cost-optimized cloud setup</div>
                    </div>
                </div>

                <!-- CI/CD Pipeline Implementation -->
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mb-4">🔁</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">CI/CD Pipeline Implementation</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Automate build, test, and deployment workflows.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Continuous integration pipelines</div>
                        <div class="feature-item">Automated testing & deployments</div>
                        <div class="feature-item">Version control integration</div>
                        <div class="feature-item">Zero-downtime releases</div>
                    </div>
                </div>

                <!-- Server Optimization & Performance -->
                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mb-4">⚙️</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">Server Optimization & Performance</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Ensure your applications stay fast and reliable.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Load balancing & auto-scaling</div>
                        <div class="feature-item">Performance tuning</div>
                        <div class="feature-item">Resource optimization</div>
                        <div class="feature-item">High availability setup</div>
                    </div>
                </div>

                <!-- Monitoring, Logging & Alerts -->
                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">Monitoring, Logging & Alerts</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Gain full visibility into your systems and applications.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Real-time performance monitoring</div>
                        <div class="feature-item">Error tracking & centralized logging</div>
                        <div class="feature-item">Downtime alerts</div>
                        <div class="feature-item">Proactive issue resolution</div>
                    </div>
                </div>

                <!-- Security & Backup Management -->
                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mb-4">🔐</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">Security & Backup Management</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Protect your infrastructure and data.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Server hardening & access control</div>
                        <div class="feature-item">SSL & firewall setup</div>
                        <div class="feature-item">Automated backups</div>
                        <div class="feature-item">Disaster recovery planning</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies & Platforms Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Technologies & <span class="text-clip">Platforms We Use</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-[#11224E]/80 max-w-3xl mx-auto">
                    We use proven tools and cloud platforms to build secure, scalable systems.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="service-card text-center" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Cloud Providers</h3>
                    <p class="text-sm text-[#11224E]/70">AWS, Google Cloud, DigitalOcean</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">CI/CD & Version Control</h3>
                    <p class="text-sm text-[#11224E]/70">Git-based pipelines, automated builds & deployments</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Containers & Orchestration</h3>
                    <p class="text-sm text-[#11224E]/70">Docker (where applicable), containerized services</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Monitoring & Security</h3>
                    <p class="text-sm text-[#11224E]/70">Performance monitoring, logging, SSL, firewalls, access policies</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our DevOps Process Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Process</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Our <span class="text-clip">DevOps & Cloud</span> Process
                </h2>
            </div>

            <div class="space-y-6">
                <div class="process-step" data-animate="fade-up">
                    <div class="process-number">1</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-2">Infrastructure Assessment</h3>
                    <p class="text-base text-[#11224E]/70 leading-relaxed">Review current setup, risks, performance gaps, and opportunities.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.1">
                    <div class="process-number">2</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-2">Architecture & Planning</h3>
                    <p class="text-base text-[#11224E]/70 leading-relaxed">Design secure, scalable, and cost-efficient infrastructure and pipelines.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.2">
                    <div class="process-number">3</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-2">Automation & Deployment</h3>
                    <p class="text-base text-[#11224E]/70 leading-relaxed">Implement CI/CD pipelines, infrastructure-as-code, and cloud environments.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.3">
                    <div class="process-number">4</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-2">Monitoring & Optimization</h3>
                    <p class="text-base text-[#11224E]/70 leading-relaxed">Continuous monitoring, scaling, and improvements to keep systems healthy.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Techbuds Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Why Choose Us</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Why Choose <span class="text-clip">Techbuds for DevOps & Cloud</span>?
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card" data-animate="fade-up">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Reliable and secure infrastructure</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We design systems that are stable, secure, and production-ready.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Automated deployment pipelines</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">Ship faster and safer with automated CI/CD workflows.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Reduced downtime & faster releases</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">Zero-downtime deployments and quicker iteration cycles.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Cost-efficient cloud setups</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We optimize resources so you only pay for what you actually need.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Long-term operational support</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We stay with you post-deployment for monitoring and improvements.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.5">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Infrastructure as a competitive advantage</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We turn infrastructure into a growth enabler, not a bottleneck.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who This Service Is For Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Who This <span class="text-clip">Service Is For</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <div class="text-center" data-animate="fade-up">
                    <div class="service-icon text-2xl mx-auto mb-3">🚀</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">Startups & SaaS products</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mx-auto mb-3">📱</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">Growing web & mobile apps</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mx-auto mb-3">🧩</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">Agencies & dev teams</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mx-auto mb-3">📈</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">Businesses scaling traffic</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mx-auto mb-3">🏢</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">Teams needing reliability</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">FAQs</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Frequently Asked <span class="text-clip">Questions</span>
                </h2>
            </div>

            <div class="space-y-4">
                <div class="faq-item" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Which cloud platforms do you support?</h3>
                    <p class="text-sm text-[#11224E]/70 leading-relaxed">We work with <strong>AWS, Google Cloud, and DigitalOcean</strong> for most deployments.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Do you provide ongoing DevOps support?</h3>
                    <p class="text-sm text-[#11224E]/70 leading-relaxed">Yes. We offer monitoring, maintenance, optimization, and support packages.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Can you migrate existing systems to the cloud?</h3>
                    <p class="text-sm text-[#11224E]/70 leading-relaxed">Absolutely. We handle secure cloud migrations, platform upgrades, and re-architecture where needed.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Is DevOps suitable for small teams?</h3>
                    <p class="text-sm text-[#11224E]/70 leading-relaxed">Yes. DevOps reduces manual work, improves reliability, and lowers long-term costs — even for small teams.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-[#088395] to-[#37B7C3] text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6" data-animate="fade-up">
                Ready to Build <span class="text-white">Reliable Infrastructure</span>?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Let’s create a secure, scalable, and automated cloud environment for your applications.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="/#contact" class="bg-white text-[#11224E] px-8 py-3 rounded-lg font-semibold hover:bg-[#FFFDF6] transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Get a Free DevOps Consultation
                </a>
                <a href="/#contact" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white/10 transition-all transform hover:scale-105">
                    Discuss Your Infrastructure
                </a>
            </div>
        </div>
    </section>

    @include('components.service-blogs', [
        'serviceKey' => 'devops-cloud',
        'service' => config('service_pages.devops-cloud'),
    ])

    <!-- Footer -->
    @include('components.footer')

    @include('components.service-schema', ['serviceKey' => 'devops-cloud'])

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


