@extends('layouts.app')

@php
    $title = 'SEO Blogs - Techbuds';
@endphp

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12" data-animate="fade-up">
            <span class="service-pill w-fit mx-auto">SEO Blogs</span>
            <h1 class="mt-4 text-3xl md:text-4xl lg:text-5xl font-heading font-semibold text-heading leading-tight">
                Intelligence from our Search & Growth trenches
            </h1>
            <p class="mt-4 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                Deep dives on technical SEO, growth experiments, and analytics frameworks we deploy for product-led brands shipping at speed.
            </p>
        </div>

        <div class="blog-filters mb-8" data-animate="fade-up" data-delay="0.05">
            <a href="{{ route('blog.index') }}" class="blog-filter {{ !$category ? 'blog-filter--active' : '' }}">
                All
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('blog.index', ['category' => $cat]) }}" class="blog-filter {{ $category === $cat ? 'blog-filter--active' : '' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        @if($featured)
        <article class="blog-hero mb-12" data-animate="fade-up">
            <div class="flex flex-col gap-4">
                <span class="blog-pill">{{ $featured->category }}</span>
                <h3>{{ $featured->title }}</h3>
                <p>{{ $featured->excerpt }}</p>
                <div class="blog-hero-meta">
                    <span>{{ $featured->published_date?->format('M Y') ?? 'Recent' }}</span>
                    @if($featured->signals)
                        @foreach(array_slice($featured->signals, 0, 2) as $signal)
                            <span>{{ $signal }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap gap-4 mt-4">
                <a href="{{ route('blog.show', $featured->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-white">
                    Read the blueprint
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h14"></path>
                    </svg>
                </a>
                <span class="blog-pill bg-white/15 text-white tracking-[0.3em]">{{ $featured->reading_time ?? '5 min' }} read</span>
            </div>
        </article>
        @endif

        <div class="blog-lanes">
            @foreach($blogs as $blog)
                <article class="blog-lane-card" data-animate="fade-up" data-delay="{{ ($loop->index % 3) * 0.08 }}">
                    <div class="blog-lane-card__media">
                        <img src="{{ $blog->featured_image ?? 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=1600&q=60' }}" alt="{{ $blog->title }}" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                        <span class="blog-time">{{ $blog->reading_time ?? '5 min' }} read</span>
                    </div>
                    <div class="blog-lane-card__body">
                        <span class="blog-pill">{{ $blog->category }}</span>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="blog-title-link">
                            <h3 class="blog-title">{{ $blog->title }}</h3>
                        </a>
                        <p class="blog-excerpt">{{ $blog->excerpt }}</p>
                        @if($blog->signals)
                        <div class="blog-signals">
                            @foreach(array_slice($blog->signals, 0, 2) as $signal)
                                <span class="blog-signal">{{ $signal }}</span>
                            @endforeach
                        </div>
                        @endif
                        <a href="{{ route('blog.show', $blog->slug) }}" class="blog-action">
                            Read article
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h14"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
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
    /* Blog styles */
    .blog-filters {
        display: flex;
        flex-direction: row;
        gap: 0.55rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    @media (min-width: 1024px) {
        .blog-filters {
            justify-content: flex-start;
        }
    }
    .blog-filter {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.35rem 0.85rem;
        border-radius: 999px;
        background: rgba(37, 99, 235, 0.08);
        color: var(--text-primary);
        font-size: 0.62rem;
        letter-spacing: 0.26em;
        text-transform: uppercase;
        font-weight: 600;
        transition: background .3s ease, color .3s ease;
        text-decoration: none;
    }
    .blog-filter:hover,
    .blog-filter--active {
        background: var(--brand-primary);
        color: white;
    }
    .blog-lanes {
        display: grid;
        gap: 1.7rem;
        grid-template-columns: minmax(0,1fr);
    }
    @media (min-width: 768px) {
        .blog-lanes {
            grid-template-columns: repeat(2, minmax(0,1fr));
            gap: 1.8rem;
        }
    }
    @media (min-width: 1280px) {
        .blog-lanes {
            grid-template-columns: repeat(3, minmax(0,1fr));
            gap: 1.9rem;
        }
    }
    .blog-hero {
        grid-column: 1 / -1;
        position: relative;
        border-radius: 2.3rem;
        overflow: hidden;
        background: linear-gradient(120deg, var(--brand-primary), var(--brand-soft));
        color: white;
        padding: clamp(1.6rem, 5vw, 2.7rem);
        display: grid;
        gap: 1.1rem;
        box-shadow: 0 26px 70px rgba(37, 99, 235, 0.2);
    }
    .blog-hero::before {
        content: 'TECHBUDS';
        position: absolute;
        top: -1.7rem;
        left: clamp(1.2rem, 7vw, 2.4rem);
        font-size: clamp(3.4rem, 16vw, 8.5rem);
        font-weight: 800;
        letter-spacing: -0.05em;
        color: rgba(255,255,255,0.08);
    }
    .blog-hero h3 {
        font-size: clamp(1.45rem, 2.3vw, 1.95rem);
        font-weight: 700;
        letter-spacing: -0.01em;
    }
    .blog-hero p {
        color: rgba(255,255,255,0.78);
        line-height: 1.6;
        max-width: 36rem;
    }
    .blog-hero-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.7rem;
    }
    .blog-hero-meta span {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.4rem 0.9rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.12);
        font-size: 0.64rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
    }
    .blog-lane-card {
        position: relative;
        border-radius: 2rem;
        background: var(--surface);
        border: 1px solid var(--border-default);
        box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform .45s ease, box-shadow .45s ease, border-color .45s ease;
    }
    .blog-lane-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 24px 70px rgba(37, 99, 235, 0.15);
        border-color: var(--brand-primary);
    }
    .blog-lane-card__media {
        position: relative;
        height: 190px;
        overflow: hidden;
    }
    .blog-lane-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }
    .blog-lane-card:hover .blog-lane-card__media img {
        transform: scale(1.08) rotate(-1deg);
    }
    .blog-lane-card__body {
        padding: 1.65rem;
        display: flex;
        flex-direction: column;
        gap: 0.85rem;
        position: relative;
        z-index: 1;
    }
    .blog-lane-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05), rgba(56, 189, 248, 0.02) 55%);
        opacity: 0;
        transition: opacity .45s ease;
        pointer-events: none;
        z-index: 0;
    }
    .blog-lane-card:hover::before {
        opacity: 1;
    }
    .blog-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.3rem 0.75rem;
        border-radius: 999px;
        background: rgba(37, 99, 235, 0.1);
        color: var(--text-primary);
        font-size: 0.6rem;
        letter-spacing: 0.28em;
        text-transform: uppercase;
        font-weight: 600;
        width: fit-content;
    }
    .blog-title-link {
        text-decoration: none;
        display: block;
        position: relative;
        z-index: 2;
        cursor: pointer;
    }
    .blog-title {
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--heading);
        line-height: 1.4;
        transition: color .3s ease;
        margin: 0;
    }
    .blog-lane-card:hover .blog-title,
    .blog-title-link:hover .blog-title {
        color: var(--brand-primary);
    }
    .blog-excerpt {
        color: var(--text-secondary);
        font-size: 0.9rem;
        line-height: 1.6;
    }
    .blog-signals {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
        margin-top: 0.2rem;
    }
    .blog-signal {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.35rem 0.75rem;
        border-radius: 999px;
        background: rgba(37, 99, 235, 0.06);
        color: var(--text-primary);
        font-size: 0.6rem;
        letter-spacing: 0.24em;
        text-transform: uppercase;
    }
    .blog-action {
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        font-size: 0.78rem;
        font-weight: 600;
        color: var(--heading);
        text-decoration: none;
        position: relative;
        z-index: 2;
        cursor: pointer;
    }
    .blog-action:hover {
        color: var(--brand-primary);
    }
    .blog-action svg {
        transition: transform .3s ease;
    }
    .blog-lane-card:hover .blog-action svg {
        transform: translateX(4px);
    }
    .blog-time {
        position: absolute;
        top: 1.4rem;
        right: 1.4rem;
        padding: 0.3rem 0.7rem;
        border-radius: 999px;
        background: rgba(255,255,255,0.9);
        color: var(--text-primary);
        font-size: 0.6rem;
        letter-spacing: 0.24em;
        text-transform: uppercase;
    }
    /* Custom Pagination Styles */
    .custom-pagination {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.25rem;
    }
    .custom-pagination .pagination-info {
        font-size: 0.875rem;
        color: var(--text-muted);
        font-weight: 500;
        text-align: center;
    }
    .custom-pagination nav {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .custom-pagination .pagination {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        list-style: none;
        padding: 0.75rem 1rem;
        margin: 0;
        background: var(--surface);
        border-radius: 1rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--border-default);
    }
    .custom-pagination .pagination li {
        margin: 0;
        padding: 0;
    }
    .custom-pagination .pagination a,
    .custom-pagination .pagination span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid transparent;
        background: transparent;
        color: var(--text-primary);
    }
    .custom-pagination .pagination a:hover {
        background: rgba(37, 99, 235, 0.1);
        color: var(--brand-primary);
        border-color: rgba(37, 99, 235, 0.2);
    }
    .custom-pagination .pagination .active span {
        background: var(--brand-primary);
        color: white;
        border-color: var(--brand-primary);
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
    }
    .custom-pagination .pagination .disabled span {
        opacity: 0.35;
        cursor: not-allowed;
        color: var(--text-disabled);
    }
    .custom-pagination .pagination .disabled a {
        opacity: 0.35;
        cursor: not-allowed;
        pointer-events: none;
    }
    .custom-pagination .pagination .disabled:hover {
        background: transparent;
        border-color: transparent;
    }
    @media (max-width: 640px) {
        .custom-pagination {
            gap: 1rem;
        }
        .custom-pagination .pagination {
            padding: 0.5rem 0.75rem;
            gap: 0.375rem;
        }
        .custom-pagination .pagination a,
        .custom-pagination .pagination span {
            min-width: 2.25rem;
            height: 2.25rem;
            padding: 0 0.5rem;
            font-size: 0.8rem;
        }
        .custom-pagination .pagination-info {
            font-size: 0.8rem;
        }
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
