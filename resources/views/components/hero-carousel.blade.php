<!-- Hero Carousel Section -->
<section 
    class="hero-carousel-section relative h-[500px] md:h-screen overflow-hidden mobile-landscape-hero"
    aria-label="Services Hero Carousel" 
         x-data="{
             currentSlide: 0,
             slides: [
                 {
                     id: 1,
                     image: '{{ asset('images/banner images/web developement 2.jpg') }}',
                     title: 'Web Development',
                     subtitle: 'Modern Web Solutions',
                     heading: 'Build Fast, Scalable Web Applications',
                     description: 'Transform your digital presence with cutting-edge web development. We create high-performance, SEO-optimized websites and web applications that drive conversions and scale with your business growth.',
                     features: ['React & Laravel Stack', 'SEO Optimized', '99.9% Uptime'],
                     ctaText: 'Explore Web Development',
                     ctaLink: '{{ route('services.show', 'web-development') }}',
                     badge: 'Full-Stack Development'
                 },
                 {
                     id: 2,
                     image: '{{ asset('images/banner images/app development.jpg') }}',
                     title: 'Mobile App Development',
                     subtitle: 'Native & Cross-Platform',
                     heading: 'Create Powerful Mobile Experiences',
                     description: 'Launch stunning mobile applications for iOS and Android. Our Flutter-based solutions deliver native performance with faster development cycles, ensuring your app stands out in competitive markets.',
                     features: ['iOS & Android', 'Flutter Framework', 'App Store Optimization'],
                     ctaText: 'Explore Mobile Apps',
                     ctaLink: '{{ route('services.show', 'mobile-app-development') }}',
                     badge: 'Mobile First'
                 },
                 {
                     id: 3,
                     image: '{{ asset('images/banner images/seo.jpg') }}',
                     title: 'SEO & Digital Marketing',
                     subtitle: 'Growth & Visibility',
                     heading: 'Dominate Search Rankings',
                     description: 'Drive organic traffic and generate qualified leads with our comprehensive SEO and digital marketing strategies. We optimize every touchpoint to maximize your ROI and accelerate business growth.',
                     features: ['Technical SEO', 'Content Strategy', 'Performance Marketing'],
                     ctaText: 'Explore SEO Services',
                     ctaLink: '{{ route('services.show', 'seo-digital-marketing') }}',
                     badge: 'Data-Driven Growth'
                 },
                 {
                     id: 4,
                     image: '{{ asset('images/banner images/UI UX.jpg') }}',
                     title: 'UI/UX Design',
                     subtitle: 'User-Centered Design',
                     heading: 'Design That Converts',
                     description: 'Craft intuitive, beautiful user experiences that engage users and drive conversions. Our design process combines user research, modern aesthetics, and conversion optimization to create memorable brand experiences.',
                     features: ['User Research', 'Design Systems', 'Prototyping'],
                     ctaText: 'Explore UI/UX Design',
                     ctaLink: '{{ route('services.show', 'ui-ux-design') }}',
                     badge: 'Conversion Focused'
                 },
                 {
                     id: 5,
                     image: '{{ asset('images/banner images/Digital  Product.jpg') }}',
                     title: 'Digital Product Development',
                     subtitle: 'End-to-End Solutions',
                     heading: 'From Concept to Launch',
                     description: 'Turn your vision into reality with our complete digital product development services. We handle everything from strategy and design to development, deployment, and ongoing optimization.',
                     features: ['Product Strategy', 'Agile Development', 'Continuous Delivery'],
                     ctaText: 'Start Your Project',
                     ctaLink: '#contact',
                     badge: 'Full Product Lifecycle'
                 },
                 {
                     id: 6,
                     image: '{{ asset('images/banner images/IT Solutions.jpg') }}',
                     title: 'Custom IT Solutions',
                     subtitle: 'Tailored Technology',
                     heading: 'Enterprise-Grade Solutions',
                     description: 'Build custom software systems designed specifically for your business needs. We create scalable, secure, and maintainable solutions that integrate seamlessly with your existing infrastructure.',
                     features: ['Custom Architecture', 'Enterprise Integration', 'Scalable Systems'],
                     ctaText: 'Explore IT Solutions',
                     ctaLink: '{{ route('services.show', 'custom-it-solutions') }}',
                     badge: 'Enterprise Ready'
                 },
                 {
                     id: 7,
                     image: '{{ asset('images/banner images/Graphic.jpg') }}',
                     title: 'Brand & Graphic Design',
                     subtitle: 'Visual Identity',
                     heading: 'Build Unforgettable Brands',
                     description: 'Create a cohesive visual identity that resonates with your audience. From logo design to complete brand systems, we craft graphics that communicate your values and differentiate your business.',
                     features: ['Brand Identity', 'Visual Systems', 'Marketing Materials'],
                     ctaText: 'Explore Design Services',
                     ctaLink: '{{ route('services.show', 'ui-ux-design') }}',
                     badge: 'Brand Excellence'
                 }
             ],
             autoplayInterval: null,
             isTransitioning: false,
             init() {
                 // Start autoplay after initial load
                 setTimeout(() => {
                     this.startAutoplay();
                 }, 5000);
             },
             startAutoplay() {
                 // Clear any existing interval first
                 this.stopAutoplay();
                 this.autoplayInterval = setInterval(() => {
                     if (!this.isTransitioning) {
                         this.nextSlide();
                     }
                 }, 5000);
             },
             stopAutoplay() {
                 if (this.autoplayInterval) {
                     clearInterval(this.autoplayInterval);
                     this.autoplayInterval = null;
                 }
             },
             nextSlide() {
                 if (this.isTransitioning) return;
                 this.isTransitioning = true;
                 this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                 // Reset transition flag after animation completes
                 setTimeout(() => {
                     this.isTransitioning = false;
                 }, 600);
             },
             prevSlide() {
                 if (this.isTransitioning) return;
                 this.isTransitioning = true;
                 this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                 // Reset transition flag after animation completes
                 setTimeout(() => {
                     this.isTransitioning = false;
                 }, 600);
             },
             goToSlide(index) {
                 if (this.isTransitioning) return;
                 this.isTransitioning = true;
                 this.currentSlide = index;
                 this.stopAutoplay();
                 setTimeout(() => {
                     this.isTransitioning = false;
                     this.startAutoplay();
                 }, 600);
             }
         }"
         @mouseenter="stopAutoplay()"
         @mouseleave="startAutoplay()"
         @keydown.arrow-left.prevent="prevSlide(); stopAutoplay(); setTimeout(() => startAutoplay(), 700);"
         @keydown.arrow-right.prevent="nextSlide(); stopAutoplay(); setTimeout(() => startAutoplay(), 700);"
         tabindex="0">
    
    <!-- Carousel Container -->
    <div class="relative w-full h-full mobile-hero-container">
        <!-- Slides -->
        <div class="relative w-full h-full mobile-hero-slides">
            <template x-for="(slide, index) in slides" :key="slide.id">
                <div 
                    x-show="currentSlide === index"
                    x-transition:enter="transition ease-in-out duration-700"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in-out duration-700"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 mobile-hero-slide"
                    style="transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);">
                    
                    <!-- Background Image with Overlay -->
                    <div class="absolute inset-0 w-full h-full mobile-hero-image-container">
                        <img 
                            :src="slide.image" 
                            :alt="slide.title + ' Services by Techbuds - ' + slide.description.substring(0, 100)"
                            :title="slide.title + ' - Techbuds Digital Solutions'"
                            class="w-full h-full object-cover mobile-hero-image"
                            :loading="index === 0 ? 'eager' : 'lazy'"
                            :fetchpriority="index === 0 ? 'high' : 'low'">
                        <!-- Gradient Overlay for better text readability -->
                        <div class="absolute inset-0 bg-gradient-to-r from-app-background/90 via-app-background/75 to-app-background/60 md:from-app-background/85 md:via-app-background/70 md:to-app-background/50"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-app-background/80 via-transparent to-transparent"></div>
                    </div>
                    
                    <!-- Content Overlay -->
                    <div class="hero-content absolute inset-0 h-full flex items-center justify-center md:justify-start">
                        <div class="max-w-7xl w-full px-4 sm:px-8 md:px-16 lg:px-20 xl:px-24 2xl:px-32 space-y-2 sm:space-y-3 md:space-y-5 lg:space-y-6 xl:space-y-8" data-animate="fade-up">
                            <!-- Badge -->
                            <div class="inline-flex items-center gap-1.5 sm:gap-2 px-2.5 sm:px-3 md:px-4 py-1 sm:py-1.5 md:py-2 rounded-full bg-brand-primary/20 border border-brand-primary/30 backdrop-blur-md shadow-lg">
                                <span class="w-1 h-1 sm:w-1.5 sm:h-1.5 md:w-2 md:h-2 rounded-full bg-green-500 animate-pulse"></span>
                                <span class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-white uppercase tracking-wider" x-text="slide.badge"></span>
                            </div>
                            
                            <!-- Subtitle -->
                            <div class="text-[10px] sm:text-xs md:text-sm lg:text-base font-semibold text-brand-primary uppercase tracking-wider" x-text="slide.subtitle"></div>
                            
                            <!-- Heading -->
                            <h1 class="font-display text-xl sm:text-2xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-bold text-white leading-[1.1] sm:leading-[1.15] md:leading-[1.1] drop-shadow-lg">
                                <span class="text-gradient bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent" x-text="slide.heading" :aria-label="slide.heading"></span>
                            </h1>
                            
                            <!-- Description -->
                            <p class="text-[11px] sm:text-xs md:text-sm lg:text-base xl:text-lg text-white/90 max-w-2xl leading-relaxed drop-shadow-md line-clamp-2 sm:line-clamp-2 md:line-clamp-3 lg:line-clamp-none" x-text="slide.description"></p>
                            
                            <!-- Features -->
                            <div class="flex flex-wrap gap-1.5 sm:gap-2 md:gap-3">
                                <template x-for="feature in slide.features" :key="feature">
                                    <span class="px-2 sm:px-2.5 md:px-3 lg:px-4 py-1 sm:py-1.5 md:py-2 rounded-full bg-white/10 backdrop-blur-md text-white text-[10px] sm:text-xs md:text-sm font-medium border border-white/20 shadow-lg">
                                        <span x-text="feature"></span>
                                    </span>
                                </template>
                            </div>
                            
                            <!-- CTA Buttons -->
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 md:gap-4 pt-1 sm:pt-2 md:pt-4">
                                <a 
                                    :href="slide.ctaLink" 
                                    class="inline-flex items-center justify-center gap-1.5 sm:gap-2 px-4 sm:px-6 md:px-8 py-2 sm:py-2.5 md:py-3 rounded-lg bg-brand-primary text-white text-xs sm:text-sm md:text-base font-semibold hover:bg-brand-hover transition-all duration-300 shadow-xl shadow-brand-primary/40 hover:shadow-2xl hover:shadow-brand-primary/50 hover:scale-105 backdrop-blur-sm">
                                    <span x-text="slide.ctaText"></span>
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                                <a 
                                    href="#contact" 
                                    class="inline-flex items-center justify-center gap-1.5 sm:gap-2 px-4 sm:px-6 md:px-8 py-2 sm:py-2.5 md:py-3 rounded-lg border-2 border-white/30 text-white text-xs sm:text-sm md:text-base font-semibold hover:border-white hover:bg-white/10 transition-all duration-300 backdrop-blur-md shadow-lg hover:scale-105">
                                    Start a Project
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        
        <!-- Navigation Arrows -->
        <button 
            @click="prevSlide(); stopAutoplay(); setTimeout(() => startAutoplay(), 700);"
            class="hidden md:flex absolute left-4 sm:left-6 md:left-8 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-white/10 backdrop-blur-md border-2 border-white/30 text-white hover:text-brand-primary hover:bg-white/20 hover:border-white transition-all duration-300 items-center justify-center shadow-xl hover:scale-110 z-20"
            aria-label="Previous slide">
            <svg class="w-4 h-4 sm:w-4 sm:h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        
        <button 
            @click="nextSlide(); stopAutoplay(); setTimeout(() => startAutoplay(), 700);"
            class="hidden md:flex absolute right-4 sm:right-6 md:right-8 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-full bg-white/10 backdrop-blur-md border-2 border-white/30 text-white hover:text-brand-primary hover:bg-white/20 hover:border-white transition-all duration-300 items-center justify-center shadow-xl hover:scale-110 z-20"
            aria-label="Next slide">
            <svg class="w-4 h-4 sm:w-4 sm:h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
        
        <!-- Dots Indicator -->
        <div class="absolute bottom-6 sm:bottom-8 md:bottom-10 left-1/2 -translate-x-1/2 flex justify-center gap-2 sm:gap-2.5" role="tablist" aria-label="Carousel slides">
            <template x-for="(slide, index) in slides" :key="slide.id">
                <button 
                    @click="goToSlide(index)"
                    :class="currentSlide === index ? 'bg-white w-8 sm:w-10 shadow-lg' : 'bg-white/40 w-2 sm:w-2.5 hover:bg-white/60'"
                    class="h-2 sm:h-2.5 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-transparent"
                    :aria-label="'Go to ' + slide.title + ' slide'"
                    :aria-selected="currentSlide === index"
                    role="tab">
                </button>
            </template>
        </div>
        
        <!-- Slide Counter -->
        <div class="absolute bottom-6 sm:bottom-8 md:bottom-10 right-4 sm:right-6 md:right-8">
            <span class="text-xs sm:text-sm text-white/80 backdrop-blur-md bg-black/20 px-3 py-1.5 rounded-full border border-white/20 font-medium">
                <span class="font-bold text-white" x-text="currentSlide + 1"></span>
                <span class="text-white/60"> / </span>
                <span x-text="slides.length"></span>
            </span>
        </div>
    </div>
</section>

<style>
    /* Smooth carousel transitions */
    [x-cloak] { display: none !important; }
    
    /* Smooth transitions */
    .hero-carousel-section * {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Ensure smooth slide transitions */
    .hero-carousel-section [x-show] {
        will-change: opacity;
    }
    
    /* Prevent height changes during slide transitions on mobile */
    @media (max-width: 767px) {
        .hero-carousel-section [x-show],
        .hero-carousel-section [x-transition] {
            height: 500px !important;
            min-height: 500px !important;
            max-height: 500px !important;
        }
    }
    
    @media (max-width: 768px) and (orientation: landscape) {
        .hero-carousel-section [x-show],
        .hero-carousel-section [x-transition] {
            height: 400px !important;
            min-height: 400px !important;
            max-height: 400px !important;
        }
    }
    
    /* Desktop: images cover full area */
    .hero-carousel-section img {
        object-fit: cover;
        object-position: center;
    }
    
    /* Mobile: fixed height to prevent layout shifts during slide changes */
    @media (max-width: 767px) {
        .hero-carousel-section {
            height: 500px !important;
            min-height: 500px !important;
            max-height: 500px !important;
        }
        
        .mobile-hero-container {
            height: 500px !important;
            min-height: 500px !important;
            max-height: 500px !important;
        }
        
        .mobile-hero-slides {
            height: 500px !important;
            min-height: 500px !important;
            max-height: 500px !important;
            position: relative;
        }
        
        .mobile-hero-slide {
            position: absolute !important;
            height: 500px !important;
            min-height: 500px !important;
            max-height: 500px !important;
            width: 100%;
        }
        
        .mobile-hero-image-container {
            position: absolute !important;
            height: 500px !important;
            min-height: 500px !important;
            max-height: 500px !important;
            width: 100%;
        }
        
        .mobile-hero-image {
            object-fit: contain !important;
            object-position: center;
            width: 100%;
            height: 500px !important;
            min-height: 500px !important;
            max-height: 500px !important;
            display: block;
        }
        
        .hero-content {
            position: absolute;
            inset: 0;
            padding: 1rem;
            z-index: 10;
            height: 500px;
        }
        
        /* Ensure gradient overlays work on mobile */
        .mobile-hero-image-container > div {
            position: absolute;
            inset: 0;
            height: 500px;
        }
    }
    
    /* Mobile landscape optimization - fixed height for landscape */
    @media (max-width: 768px) and (orientation: landscape) {
        .hero-carousel-section.mobile-landscape-hero {
            height: 400px !important;
            min-height: 400px !important;
            max-height: 400px !important;
        }
        
        .mobile-hero-container {
            height: 400px !important;
            min-height: 400px !important;
            max-height: 400px !important;
        }
        
        .mobile-hero-slides {
            height: 400px !important;
            min-height: 400px !important;
            max-height: 400px !important;
        }
        
        .mobile-hero-slide {
            height: 400px !important;
            min-height: 400px !important;
            max-height: 400px !important;
        }
        
        .mobile-hero-image-container {
            height: 400px !important;
            min-height: 400px !important;
            max-height: 400px !important;
        }
        
        .mobile-hero-image {
            object-fit: contain !important;
            object-position: center;
            width: 100%;
            height: 400px !important;
            min-height: 400px !important;
            max-height: 400px !important;
        }
        
        .hero-content {
            position: absolute;
            inset: 0;
            padding: 0.75rem;
            align-items: center;
            height: 400px;
        }
        
        .hero-content > div {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }
        
        /* Reduce spacing in landscape for better fit */
        .hero-content h1 {
            margin-bottom: 0.25rem;
            margin-top: 0.25rem;
        }
        
        .hero-content p {
            margin-bottom: 0.375rem;
            margin-top: 0.25rem;
        }
        
        /* Ensure gradient overlays work on mobile landscape */
        .mobile-hero-image-container > div {
            position: absolute;
            inset: 0;
            height: 400px;
        }
    }
    
    /* Better text visibility and sizing on mobile */
    @media (max-width: 640px) {
        .hero-content h1 {
            line-height: 1.15;
            margin-bottom: 0.5rem;
        }
        
        .hero-content p {
            line-height: 1.4;
            margin-bottom: 0.75rem;
        }
        
        /* Ensure content fits in landscape */
        @media (orientation: landscape) {
            .hero-content h1 {
                font-size: 1.25rem;
                line-height: 1.2;
                margin-bottom: 0.25rem;
            }
            
            .hero-content p {
                font-size: 0.625rem;
                line-height: 1.3;
                margin-bottom: 0.5rem;
            }
            
            .hero-content > div {
                space-y: 0.5rem;
            }
        }
    }
    
    /* Extra small mobile landscape */
    @media (max-width: 480px) and (orientation: landscape) {
        .hero-content h1 {
            font-size: 1rem;
            line-height: 1.15;
        }
        
        .hero-content p {
            font-size: 0.6rem;
            line-height: 1.25;
        }
        
        .hero-content > div {
            padding-left: 1rem;
            padding-right: 1rem;
            space-y: 0.375rem;
        }
    }
</style>

