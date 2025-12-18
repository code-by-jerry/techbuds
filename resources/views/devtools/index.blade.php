@extends('layouts.app')

@php
    $title = 'DevTools - Best Websites for Developers & Designers - Techbuds';
    $meta_description = 'Discover 50+ best websites for developers and designers. Resources for learning, CSS/UI tools, colors, SVG backgrounds, icons, AI tools, and more.';
@endphp

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12" data-animate="fade-up">
            <span class="service-pill w-fit mx-auto">DevTools</span>
            <h1 class="mt-4 text-3xl md:text-4xl lg:text-5xl font-heading font-semibold text-heading leading-tight">
                50+ Best Websites for Developers & Designers
            </h1>
            <p class="mt-4 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                Curated collection of essential tools, resources, and websites to supercharge your development and design workflow.
            </p>
        </div>

        @if($categories->count() > 0)
            @foreach($categories as $category)
                <div class="mb-16" data-animate="fade-up" data-delay="{{ $loop->index * 0.1 }}">
                    <div class="mb-8">
                        <h2 class="text-2xl md:text-3xl font-heading font-semibold text-heading mb-2">
                            {{ $category->name }}
                        </h2>
                        @if($category->description)
                            <p class="text-text-secondary text-base">
                                {{ $category->description }}
                            </p>
                        @endif
                    </div>

                    @if($category->links->count() > 0)
                        <div class="devtools-grid">
                            @foreach($category->links as $link)
                                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" class="devtool-card" data-animate="fade-up" data-delay="{{ ($loop->index % 4) * 0.05 }}">
                                    <div class="devtool-card__header">
                                        <h3 class="devtool-title">{{ $link->title }}</h3>
                                        <svg class="w-5 h-5 text-brand-primary opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    </div>
                                    @if($link->description)
                                        <p class="devtool-description">{{ $link->description }}</p>
                                    @endif
                                    <div class="devtool-url">{{ parse_url($link->url, PHP_URL_HOST) }}</div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-text-muted text-sm italic">No tools available in this category yet.</p>
                    @endif
                </div>
            @endforeach
        @else
            <div class="text-center py-16">
                <p class="text-text-secondary text-lg">No dev tools available at the moment. Check back soon!</p>
            </div>
        @endif
    </div>
</section>

@push('styles')
<style>
    /* Service pill */
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

    /* DevTools Grid */
    .devtools-grid {
        display: grid;
        gap: 1.5rem;
        grid-template-columns: minmax(0, 1fr);
    }

    @media (min-width: 640px) {
        .devtools-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.6rem;
        }
    }

    @media (min-width: 1024px) {
        .devtools-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.8rem;
        }
    }

    /* DevTool Card */
    .devtool-card {
        position: relative;
        border-radius: 1.5rem;
        background: var(--surface);
        border: 1px solid var(--border-default);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        transition: transform .4s ease, box-shadow .4s ease, border-color .4s ease;
        text-decoration: none;
        color: inherit;
    }

    .devtool-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 60px rgba(37, 99, 235, 0.12);
        border-color: var(--brand-primary);
    }

    .devtool-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.04), rgba(56, 189, 248, 0.02) 55%);
        opacity: 0;
        transition: opacity .4s ease;
        pointer-events: none;
        border-radius: 1.5rem;
        z-index: 0;
    }

    .devtool-card:hover::before {
        opacity: 1;
    }

    .devtool-card__header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        position: relative;
        z-index: 1;
    }

    .devtool-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--heading);
        line-height: 1.4;
        margin: 0;
        transition: color .3s ease;
        flex: 1;
    }

    .devtool-card:hover .devtool-title {
        color: var(--brand-primary);
    }

    .devtool-card__header svg {
        flex-shrink: 0;
        transition: transform .3s ease, opacity .3s ease;
    }

    .devtool-card:hover .devtool-card__header svg {
        transform: translate(2px, -2px);
        opacity: 1;
    }

    .devtool-description {
        color: var(--text-secondary);
        font-size: 0.875rem;
        line-height: 1.6;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .devtool-url {
        color: var(--brand-primary);
        opacity: 0.7;
        font-size: 0.75rem;
        font-weight: 500;
        margin-top: auto;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .devtool-url::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--brand-primary);
        opacity: 0.5;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
<script>
    window.addEventListener('load', () => {
        if (!window.gsap || !window.ScrollTrigger) return;
        gsap.registerPlugin(ScrollTrigger);
        const animationMap = {
            'fade-up': { y: 40 },
        };
        Object.entries(animationMap).forEach(([key, config]) => {
            gsap.utils.toArray(`[data-animate="${key}"]`).forEach((el) => {
                const delay = parseFloat(el.dataset.delay || '0');
                gsap.from(el, {
                    duration: 1.1,
                    opacity: 0,
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
@endpush
@endsection
