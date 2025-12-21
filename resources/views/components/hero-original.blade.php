<!-- Original Hero Section -->
<section class="relative min-h-screen pt-32 pb-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Gradient Orbs -->
        <div class="absolute top-20 left-10 w-96 h-96 bg-brand-primary/10 rounded-full blur-3xl float-slow"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-brand-soft/10 rounded-full blur-3xl float-delay"></div>
        <!-- Grid Pattern -->
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(37, 99, 235, 0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(37, 99, 235, 0.03) 1px, transparent 1px); background-size: 60px 60px;"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left Content -->
            <div class="space-y-8 text-center lg:text-left" data-animate="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="text-xs font-medium text-text-secondary uppercase tracking-wider">Digital Transformation Studio</span>
                </div>
                    
                <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-heading leading-tight">
                    Empowering Your<br>
                    <span class="text-gradient">Digital Future</span>
                </h1>
                    
                <p class="text-lg text-text-muted max-w-xl mx-auto lg:mx-0 leading-relaxed"
                   x-data="{
                        words: ['web applications','mobile apps','UI/UX experiences','DevOps pipelines','data platforms','digital marketing'],
                        idx: 0,
                        word: 'web applications',
                        show: true,
                        next(){ this.show = false; setTimeout(()=>{ this.idx=(this.idx+1)%this.words.length; this.word=this.words[this.idx]; this.show = true; }, 400); }
                   }"
                   x-init="setInterval(()=>next(), 3800)">
                    We craft exceptional
                    <span class="text-brand-primary font-semibold" x-cloak x-show="show" x-transition.opacity.duration.400 x-text="' ' + word"></span>
                    that drive your business forward with measurable outcomes.
                </p>
                    
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#services" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-hover transition-all duration-200 shadow-lg shadow-brand-primary/25">
                        Explore Services
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="#contact" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-lg border border-border-default text-text-primary font-semibold hover:border-brand-primary hover:text-brand-primary transition-all duration-200">
                        Start a Project
                    </a>
                </div>
                    
                <div class="flex flex-wrap gap-3 justify-center lg:justify-start pt-4">
                    <span class="px-4 py-2 rounded-full bg-surface-2 text-text-muted text-sm font-medium border border-border-default">Full-stack pods</span>
                    <span class="px-4 py-2 rounded-full bg-surface-2 text-text-muted text-sm font-medium border border-border-default">Design systems</span>
                    <span class="px-4 py-2 rounded-full bg-surface-2 text-text-muted text-sm font-medium border border-border-default">Data & analytics</span>
                </div>
            </div>
                
            <!-- Right Content - Stats Card -->
            <div class="relative" data-animate="slide-left">
                <div class="relative bg-gradient-to-br from-surface-2 to-surface-1 rounded-2xl p-8 border border-border-default glow-brand">
                    <div class="absolute -top-3 -right-3 px-4 py-2 rounded-full bg-brand-primary text-white text-xs font-semibold">
                        Innovation Pod
                    </div>
                    <h3 class="font-display text-2xl font-bold text-heading mb-4">Launch bold products without the busywork</h3>
                    <p class="text-text-muted mb-8 leading-relaxed">
                        We plug autonomous squads into your roadmap—handling discovery, build, QA, DevOps, and growth loops so your team can focus on strategy.
                    </p>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-heading" data-count="6" data-suffix=" Weeks">0</div>
                            <div class="text-xs text-text-disabled uppercase tracking-wider mt-1">Discovery to Beta</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-heading" data-count="92" data-suffix="%">0</div>
                            <div class="text-xs text-text-disabled uppercase tracking-wider mt-1">Client Retention</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-brand-primary">A+</div>
                            <div class="text-xs text-text-disabled uppercase tracking-wider mt-1">Quality Score</div>
                        </div>
                    </div>
                        
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-surface-2 border border-border-default rounded-xl p-4 shadow-xl">
                        <div class="text-xs text-text-disabled uppercase tracking-wider mb-1">Core Stack</div>
                        <div class="text-sm font-semibold text-heading">Laravel · React · Flutter</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

