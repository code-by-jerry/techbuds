<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AI & Automation Solutions | Workflow & Business Automation – Techbuds</title>
        <meta name="description" content="AI and automation solutions to streamline workflows, reduce costs, and scale efficiency. Chatbots, process automation, lead automation, and intelligent data workflows.">

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
                <span class="service-pill">AI & Automation Solutions</span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-bold text-[#11224E] leading-tight" data-animate="fade-up" data-delay="0.1">
                Smart Systems That <span class="text-clip">Automate Workflows, Reduce Costs & Scale Efficiency</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-[#11224E]/80 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.2">
                Businesses that leverage AI move faster, operate smarter, and outperform competitors. At <strong>Techbuds</strong>, we deliver AI and automation solutions that streamline operations, reduce manual effort, and unlock new efficiency across your organization.
            </p>
            <p class="mt-4 text-base md:text-lg text-[#11224E]/70 max-w-3xl leading-relaxed" data-animate="fade-up" data-delay="0.3">
                We design <strong>practical, business-focused AI systems</strong> — not experiments.
            </p>
        </div>
    </section>

    <!-- Why AI & Automation Matter Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Why <span class="text-clip">AI & Automation</span> Matter for Modern Businesses
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">Manual processes slow growth and increase costs:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Time-consuming, repetitive tasks</div>
                        <div class="feature-item">Higher risk of human error</div>
                        <div class="feature-item">Slower response times</div>
                        <div class="feature-item">Limited scalability</div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-[#11224E] mb-4">AI-powered automation helps you:</h3>
                    <div class="space-y-2">
                        <div class="feature-item">Save time and reduce human error</div>
                        <div class="feature-item">Improve customer experience</div>
                        <div class="feature-item">Automate repetitive tasks</div>
                        <div class="feature-item">Scale operations without scaling costs</div>
                        <div class="feature-item">Make data-driven decisions</div>
                    </div>
                    <p class="mt-4 text-sm text-[#11224E]/70 leading-relaxed">
                        Our solutions focus on <strong>real-world impact</strong>, not hype.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our AI & Automation Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Our <span class="text-clip">AI & Automation</span> Services
                </h2>
                <p class="mt-4 text-base md:text-lg text-[#11224E]/80 max-w-3xl mx-auto">
                    From chatbots to workflow automation — we build AI systems that support real business operations.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- AI Chatbots & Virtual Assistants -->
                <div class="service-card" data-animate="fade-up">
                    <div class="service-icon text-2xl mb-4">💬</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">AI Chatbots & Virtual Assistants</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Smart conversational systems that work 24/7.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Customer support chatbots</div>
                        <div class="feature-item">Lead qualification bots</div>
                        <div class="feature-item">Website & app chatbot integration</div>
                        <div class="feature-item">Natural language processing (NLP)</div>
                    </div>
                </div>

                <!-- Business Process Automation -->
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mb-4">⚙️</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">Business Process Automation</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Automate repetitive workflows across teams.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Task & workflow automation</div>
                        <div class="feature-item">Data entry & processing automation</div>
                        <div class="feature-item">Internal system integrations</div>
                        <div class="feature-item">Trigger-based automation logic</div>
                    </div>
                </div>

                <!-- Lead & Marketing Automation -->
                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mb-4">📈</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">Lead & Marketing Automation</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Convert leads faster with automated systems.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Lead capture & qualification</div>
                        <div class="feature-item">CRM automation</div>
                        <div class="feature-item">Email & follow-up automation</div>
                        <div class="feature-item">Sales funnel optimization</div>
                    </div>
                </div>

                <!-- Data Processing & Intelligent Automation -->
                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mb-4">📊</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">Data Processing & Intelligent Automation</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Let AI handle complex data operations.</p>
                    <div class="space-y-2">
                        <div class="feature-item">Automated data extraction</div>
                        <div class="feature-item">Data cleaning & transformation</div>
                        <div class="feature-item">Rule-based & AI-driven workflows</div>
                        <div class="feature-item">Reporting automation</div>
                    </div>
                </div>

                <!-- Custom AI Solutions -->
                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mb-4">🧠</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-3">Custom AI Solutions</h3>
                    <p class="text-sm text-[#11224E]/70 mb-3">Tailored AI systems built around your specific business needs.</p>
                    <div class="space-y-2">
                        <div class="feature-item">AI-powered recommendation systems</div>
                        <div class="feature-item">Predictive analytics</div>
                        <div class="feature-item">Custom AI pipelines</div>
                        <div class="feature-item">Intelligent decision-support systems</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technologies & Tools Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Technologies & <span class="text-clip">Tools We Use</span>
                </h2>
                <p class="mt-4 text-base md:text-lg text-[#11224E]/80 max-w-3xl mx-auto">
                    We choose reliable, scalable AI and automation tools that fit your stack.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="service-card text-center" data-animate="fade-up">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">AI Models & Services</h3>
                    <p class="text-sm text-[#11224E]/70">Business-focused AI integrations, NLP services, and model APIs</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Backend & APIs</h3>
                    <p class="text-sm text-[#11224E]/70">API-driven architectures, microservices, and secure integrations</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Automation Platforms</h3>
                    <p class="text-sm text-[#11224E]/70">Workflow automation tools, schedulers, and orchestration systems</p>
                </div>
                <div class="service-card text-center" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Data & Analytics</h3>
                    <p class="text-sm text-[#11224E]/70">Structured data pipelines, analytics systems, and reporting layers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our AI & Automation Process Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Our Process</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Our <span class="text-clip">AI & Automation</span> Process
                </h2>
            </div>

            <div class="space-y-6">
                <div class="process-step" data-animate="fade-up">
                    <div class="process-number">1</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-2">Use Case Identification</h3>
                    <p class="text-base text-[#11224E]/70 leading-relaxed">We identify where AI delivers the highest ROI and impact.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.1">
                    <div class="process-number">2</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-2">Strategy & Design</h3>
                    <p class="text-base text-[#11224E]/70 leading-relaxed">Define workflows, data requirements, and overall system architecture.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.2">
                    <div class="process-number">3</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-2">Development & Integration</h3>
                    <p class="text-base text-[#11224E]/70 leading-relaxed">Build, test, and integrate AI and automation into your existing systems.</p>
                </div>

                <div class="process-step" data-animate="fade-up" data-delay="0.3">
                    <div class="process-number">4</div>
                    <h3 class="text-xl font-semibold text-[#11224E] mb-2">Monitoring & Optimization</h3>
                    <p class="text-base text-[#11224E]/70 leading-relaxed">Continuous monitoring, optimization, and iteration for better results.</p>
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
                    Why Choose <span class="text-clip">Techbuds for AI & Automation</span>?
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card" data-animate="fade-up">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Practical, ROI-driven AI solutions</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We focus on clear business outcomes, not experimental projects.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Secure and scalable implementation</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We bake in security, compliance, and scalability from day one.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.2">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Seamless integration with existing systems</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We integrate with your current tools, CRMs, and platforms.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.3">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Clear communication & transparency</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">You’ll always know what’s being built, why, and how it's performing.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Long-term optimization and support</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We monitor, refine, and improve your AI systems over time.</p>
                        </div>
                    </div>
                </div>

                <div class="service-card" data-animate="fade-up" data-delay="0.5">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-[#088395] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-[#11224E] mb-2">Helping you work smarter, not harder</h3>
                            <p class="text-sm text-[#11224E]/70 leading-relaxed">We help businesses <strong>work smarter, not harder</strong> through automation.</p>
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
                    <h3 class="text-lg font-semibold text-[#11224E]">Startups & growing businesses</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="service-icon text-2xl mx-auto mb-3">🧩</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">SaaS platforms</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="service-icon text-2xl mx-auto mb-3">🔧</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">Service-based companies</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="service-icon text-2xl mx-auto mb-3">📞</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">Operations & sales teams</h3>
                </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.4">
                    <div class="service-icon text-2xl mx-auto mb-3">📊</div>
                    <h3 class="text-lg font-semibold text-[#11224E]">Data-driven organizations</h3>
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
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Do I need a large business to use AI?</h3>
                    <p class="text-sm text-[#11224E]/70 leading-relaxed">No. AI automation is highly effective for small and mid-sized businesses as well, especially for repetitive and time-consuming workflows.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Can AI integrate with my existing systems?</h3>
                    <p class="text-sm text-[#11224E]/70 leading-relaxed">Yes. We design solutions that integrate seamlessly with your existing tools, CRMs, and internal platforms via secure APIs.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.2">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Is AI secure?</h3>
                    <p class="text-sm text-[#11224E]/70 leading-relaxed">Security and data privacy are built into every solution, with strict access control and secure data handling practices.</p>
                </div>

                <div class="faq-item" data-animate="fade-up" data-delay="0.3">
                    <h3 class="text-lg font-semibold text-[#11224E] mb-2">Do you provide ongoing support?</h3>
                    <p class="text-sm text-[#11224E]/70 leading-relaxed">Yes. We offer monitoring, upgrades, and ongoing optimization to keep your AI systems effective over time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-[#088395] to-[#37B7C3] text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6" data-animate="fade-up">
                Ready to Automate & <span class="text-white">Scale Your Business</span>?
            </h2>
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.1">
                Let’s implement AI solutions that deliver measurable efficiency and real business impact.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-animate="fade-up" data-delay="0.2">
                <a href="/#contact" class="bg-white text-[#11224E] px-8 py-3 rounded-lg font-semibold hover:bg-[#FFFDF6] transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(0,0,0,0.25)]">
                    Get a Free AI & Automation Consultation
                </a>
                <a href="/#contact" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white/10 transition-all transform hover:scale-105">
                    Discuss Your Automation Ideas
                </a>
            </div>
        </div>
    </section>

    @include('components.service-blogs', [
        'serviceKey' => 'ai-automation',
        'service' => config('service_pages.ai-automation'),
    ])

    <!-- Footer -->
    @include('components.footer')

    @include('components.service-schema', ['serviceKey' => 'ai-automation'])

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


