<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php
            $serviceName = $service['name'] ?? 'Services';
            $locationName = $location['name'] ?? '';
            $titleBase = $serviceName . ' in ' . $locationName . ' | Remote IT Services – Techbuds';
            $descriptionBase = 'Remote ' . $serviceName . ' for businesses in ' . $locationName . '. End-to-end delivery from India, optimized for performance, SEO, UX, and growth.';
        @endphp

        <title>{{ $titleBase }}</title>
        <meta name="description" content="{{ $descriptionBase }}">
        @include('components.google-analytics')

        @if($noindex ?? false)
            <meta name="robots" content="noindex,follow">
        @endif

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
        </style>
    </head>
<body class="bg-app-background text-text-primary font-sans antialiased">
    @include('components.navbar')

    <!-- Hero -->
    <section class="relative overflow-hidden pt-32 pb-20 px-4 sm:px-6 lg:px-8 min-h-[500px] md:min-h-[600px] flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/location-page-banner.jpg') }}" 
                alt="{{ $serviceName }} in {{ $locationName }} - Remote Services" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto w-full z-10">
            <div data-animate="fade-up">
                <span class="service-pill bg-brand-primary/20 border-brand-primary/30 backdrop-blur-sm text-white">
                    Remote {{ $serviceName }} • {{ $locationName }}
                </span>
            </div>
            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-heading font-semibold text-white leading-tight drop-shadow-lg" data-animate="fade-up" data-delay="0.1">
                {{ $serviceName }} for Businesses in <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">{{ $locationName }}</span>
            </h1>
            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-3xl leading-relaxed drop-shadow-md" data-animate="fade-up" data-delay="0.2">
                Techbuds provides <strong class="text-white">remote, end-to-end {{ strtolower($service['serviceType'] ?? 'IT') }} services</strong> to companies in {{ $locationName }}.
                We work fully online, aligning to your timezone ({{ $location['timezone'] ?? '' }}), delivering high-quality code, UX, and SEO without needing a local office.
            </p>
            <p class="mt-4 text-base md:text-lg text-white/85 max-w-3xl leading-relaxed drop-shadow-sm" data-animate="fade-up" data-delay="0.3">
                From discovery to deployment, our India-based team collaborates with founders, product teams, and marketing leaders across {{ $locationName }}
                via async communication, structured project management, and transparent reporting.
            </p>
        </div>
    </section>

    <!-- Why remote works -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-1">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            <div data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    Why work with a <span class="text-clip">remote Techbuds team</span> from India?
                </h2>
                <p class="mt-4 text-base md:text-lg text-heading/80 leading-relaxed">
                    We combine <strong>engineering quality, design thinking, and SEO performance</strong> with predictable communication and delivery for clients in {{ $locationName }}.
                </p>
            </div>
            <div class="space-y-3" data-animate="fade-up" data-delay="0.05">
                <div class="feature-item">Time-zone overlap with your team for standups, reviews, and strategy calls.</div>
                <div class="feature-item">Transparent project management with clear milestones, demos, and releases.</div>
                <div class="feature-item">Cost-effective delivery without compromising on engineering or UX quality.</div>
                <div class="feature-item">Experience working with startups, SaaS, agencies, and enterprises across multiple regions.</div>
            </div>
        </div>
    </section>

    <!-- Service highlights (reusing generic bullets) -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-heading font-semibold text-heading leading-tight">
                    How we support {{ $serviceName }} for {{ $locationName }} clients
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="service-card" data-animate="fade-up">
                    <h3 class="text-xl font-semibold text-heading mb-4">Discovery & Planning</h3>
                    <p class="text-heading/75 text-sm md:text-base">
                        We start with your product, market, and constraints. Clear scope, realistic timelines, and a roadmap tailored to {{ $locationName }}’s audience and expectations.
                    </p>
                </div>
                <div class="service-card" data-animate="fade-up" data-delay="0.05">
                    <h3 class="text-xl font-semibold text-heading mb-4">Execution & Delivery</h3>
                    <p class="text-heading/75 text-sm md:text-base">
                        Design, development, SEO, or DevOps – executed in sprints, with async updates and recorded demos so stakeholders in {{ $locationName }} stay aligned.
                    </p>
                </div>
                <div class="service-card" data-animate="fade-up" data-delay="0.1">
                    <h3 class="text-xl font-semibold text-heading mb-4">Ongoing Support</h3>
                    <p class="text-heading/75 text-sm md:text-base">
                        Post-launch maintenance, optimization, and feature iterations with an engineering team that understands both your domain and local user behaviour.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-[var(--heading)]">
        <div class="max-w-4xl mx-auto text-center text-heading" data-animate="fade-up">
            <span class="service-pill bg-surface-1/10 text-xs tracking-[0.25em] text-heading">
                Work with Techbuds from India
            </span>
            <h2 class="mt-6 text-3xl md:text-4xl font-bold leading-tight">
                Ready to start a {{ strtolower($service['serviceType'] ?? 'digital') }} project in {{ $locationName }}?
            </h2>
            <p class="mt-4 text-base md:text-lg text-heading/80 max-w-2xl mx-auto">
                Share your idea, current stack, and timelines. We’ll respond with a clear, no-jargon roadmap and how we can support you remotely from India.
            </p>
            <div class="mt-8">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-app-background text-heading font-semibold text-sm hover:bg-surface-1 transition-colors">
                    Talk to Techbuds about {{ $serviceName }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h15"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    @include('components.footer')
    @include('components.service-schema', ['serviceKey' => $serviceKey, 'areaName' => $locationName])
</body>
</html>


