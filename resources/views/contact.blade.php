<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @php
            $metaTitle = 'Contact Us - Get Started with Techbuds | Web & Mobile App Development';
            $metaDescription = 'Start your digital transformation journey with Techbuds. Contact our team for custom web apps, mobile applications, UI/UX design, DevOps, and digital marketing solutions. Get a free consultation today.';
            $metaKeywords = 'contact techbuds, web development company, mobile app development, UI/UX design, DevOps services, digital marketing, custom software development, Bangalore, India, get quote, consultation';
        @endphp
        @include('components.meta-tags')
        @include('components.google-analytics')
        
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
        </style>
        
        <!-- Structured Data (JSON-LD) -->
        @php
            $contactPageSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'ContactPage',
                'name' => 'Contact Techbuds',
                'description' => 'Contact Techbuds for custom web development, mobile app development, UI/UX design, DevOps, and digital marketing services.',
                'url' => url('/contact'),
            ];
        @endphp
        <script type="application/ld+json">
        {!! json_encode($contactPageSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
        </script>
        @include('components.schema.local-business')
        @include('components.schema.breadcrumb', [
            'items' => [
                ['name' => 'Home', 'url' => url('/')],
                ['name' => 'Contact', 'url' => url('/contact')],
            ]
        ])
        
        <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Contact Us - Techbuds',
            'description' => 'Get in touch with Techbuds for your web development, mobile app, UI/UX design, DevOps, and digital marketing needs.',
            'url' => url('/contact'),
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Home',
                        'item' => url('/')
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Contact',
                        'item' => url('/contact')
                    ]
                ]
            ]
        ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
        </script>
    </head>
<body class="bg-app-background text-text-primary antialiased">
    @include('components.navbar')

    <!-- Contact Section -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 relative overflow-hidden min-h-screen flex items-center">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img 
                src="{{ asset('images/banner images/contact-page-banner.jpg') }}" 
                alt="Contact Techbuds - Get Started with Digital Solutions" 
                class="w-full h-full object-cover"
                loading="eager"
                fetchpriority="high">
            <!-- Gradient Overlay for better text readability - lighter overlay to show more image -->
            <div class="absolute inset-0 bg-gradient-to-b from-app-background/75 via-app-background/65 to-app-background/60"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
        </div>
        
        <div class="relative max-w-6xl mx-auto w-full z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <!-- Left Content -->
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/20 border border-brand-primary/30 backdrop-blur-sm">
                        <span class="text-xs font-medium text-white uppercase tracking-wider">Contact</span>
                    </div>
                    <h1 class="font-display text-3xl md:text-4xl font-bold text-white drop-shadow-lg">
                        Let's shape your next release.
                    </h1>
                    <p class="text-white/90 leading-relaxed text-lg drop-shadow-md">
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
                                <a href="tel:+917092936243" class="text-white font-semibold hover:text-brand-soft transition-colors drop-shadow-sm">+91 7092936243</a>
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
                                <a href="mailto:techbuds57@gmail.com" class="text-white font-semibold hover:text-brand-soft transition-colors drop-shadow-sm">techbuds57@gmail.com</a>
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
                <div class="bg-surface-1 rounded-2xl border border-border-default p-8 shadow-xl" x-data="{ submitting: false }">
                    <h2 class="font-display text-xl font-semibold text-heading mb-6">Project kickoff form</h2>
                    
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
                                <label for="name" class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Full name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Jane Doe" class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('name') ? 'border-error' : 'border-border-default' }} text-text-primary placeholder-text-disabled focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm">
                                @error('name')
                                    <span class="text-xs text-error mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Work email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="you@company.com" class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('email') ? 'border-error' : 'border-border-default' }} text-text-primary placeholder-text-disabled focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm">
                                @error('email')
                                    <span class="text-xs text-error mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('phone') ? 'border-error' : 'border-border-default' }} text-text-primary placeholder-text-disabled focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm">
                            </div>
                            <div>
                                <label for="project_type" class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Project type</label>
                                <select id="project_type" name="project_type" class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('project_type') ? 'border-error' : 'border-border-default' }} text-text-primary focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm">
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
                            <label for="message" class="block text-xs font-medium text-text-disabled uppercase tracking-wider mb-2">Tell us about your goals</label>
                            <textarea id="message" name="message" rows="4" placeholder="Launch timeline, desired outcomes, existing challenges..." class="w-full px-4 py-3 rounded-lg bg-app-background border {{ $errors->has('message') ? 'border-error' : 'border-border-default' }} text-text-primary placeholder-text-disabled focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 focus:outline-none transition-all text-sm resize-none">{{ old('message') }}</textarea>
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
    
    <!-- Form Success/Error Auto-scroll (only on contact page) -->
    @if(session('success') || session('error') || $errors->any())
    <script>
        window.addEventListener('load', () => {
            const form = document.querySelector('form[action="{{ route('contact.store') }}"]');
            if (form) {
                setTimeout(() => {
                    form.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }, 100);
            }
        });
    </script>
    @endif
    
    @include('components.whatsapp-float')
</body>
</html>

