@extends('layouts.app')

@php
    $title = $blog->title . ' - Techbuds';
    $meta_description = $blog->meta_description;
@endphp

@section('content')
<article class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <header class="mb-8">
            <div class="mb-4">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-heading hover:text-brand-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Blogs
                </a>
            </div>
            <span class="blog-pill">{{ $blog->category }}</span>
            <h1 class="mt-4 text-3xl md:text-4xl lg:text-5xl font-heading font-semibold text-heading leading-tight">
                {{ $blog->title }}
            </h1>
            @if($blog->excerpt)
            <p class="mt-4 text-lg text-text-secondary leading-relaxed">
                {{ $blog->excerpt }}
            </p>
            @endif
            <div class="mt-6 flex flex-wrap items-center gap-4 text-sm text-text-muted">
                <span>{{ $blog->published_date?->format('F d, Y') ?? 'Recent' }}</span>
                <span>•</span>
                <span>{{ $blog->reading_time ?? '5 min' }} read</span>
                @if($blog->signals)
                    @foreach($blog->signals as $signal)
                        <span>•</span>
                        <span class="blog-signal">{{ $signal }}</span>
                    @endforeach
                @endif
            </div>
        </header>

        <!-- Featured Image -->
        @if($blog->featured_image)
        <div class="mb-8 rounded-2xl overflow-hidden">
            <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-auto" loading="eager">
        </div>
        @endif

        <!-- Content -->
        <div class="prose prose-lg max-w-none blog-content">
            {!! $blog->formatted_content !!}
        </div>

        @php
            $serviceMap = [
                'Technical SEO' => [
                    ['slug' => 'seo-digital-marketing', 'label' => 'SEO & Digital Marketing Services'],
                    ['slug' => 'web-development', 'label' => 'Web Development Services'],
                ],
                'Mobile' => [
                    ['slug' => 'mobile-app-development', 'label' => 'Mobile App Development Services'],
                    ['slug' => 'seo-digital-marketing', 'label' => 'SEO & Digital Marketing Services'],
                ],
                'Performance' => [
                    ['slug' => 'web-development', 'label' => 'Web Development Services'],
                    ['slug' => 'web-hosting-app-deployment-support', 'label' => 'Web Hosting, App Deployment & Support Services'],
                ],
                'Analytics' => [
                    ['slug' => 'database-data-warehousing', 'label' => 'Database & Data Warehousing Services'],
                    ['slug' => 'ui-ux-design', 'label' => 'UI/UX Design & Branding Services'],
                ],
                'Content' => [
                    ['slug' => 'seo-digital-marketing', 'label' => 'SEO & Digital Marketing Services'],
                    ['slug' => 'custom-it-solutions', 'label' => 'Custom IT Solutions'],
                ],
            ];

            $relatedServices = $serviceMap[$blog->category] ?? null;
        @endphp

        @if($relatedServices)
        <!-- Related Services CTA -->
        <section class="mt-16 pt-12 border-t border-border-default">
            <div class="mb-6">
                <span class="blog-pill">Related services</span>
                <h2 class="mt-4 text-2xl md:text-3xl font-heading font-semibold text-heading">
                    Need help implementing what you just read?
                </h2>
                <p class="mt-3 text-base md:text-lg text-text-secondary max-w-2xl">
                    Turn this strategy into real results with our implementation services.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($relatedServices as $service)
                <a href="{{ route('services.show', ['slug' => $service['slug']]) }}" class="group block rounded-2xl border border-border-default bg-surface-2 px-5 py-4 hover:border-brand-primary hover:shadow-lg hover:shadow-brand-primary/20 transition-all duration-300">
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs font-semibold tracking-[0.24em] uppercase text-text-muted">
                            Techbuds Service
                        </span>
                        <p class="text-base md:text-lg font-semibold text-heading group-hover:text-brand-primary">
                            {{ $service['label'] }}
                        </p>
                        <span class="inline-flex items-center gap-1.5 mt-1 text-xs font-semibold text-brand-primary">
                            View service details
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h15"></path>
                            </svg>
                        </span>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Related Articles -->
        @if($related->count() > 0)
        <div class="mt-16 pt-12 border-t border-border-default">
            <h2 class="text-2xl font-heading font-semibold text-heading mb-6">Related Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($related as $relatedBlog)
                <article class="blog-lane-card">
                    <div class="blog-lane-card__media">
                        <img src="{{ $relatedBlog->featured_image ?? 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=1600&q=60' }}" alt="{{ $relatedBlog->title }}" loading="lazy">
                        <span class="blog-time">{{ $relatedBlog->reading_time ?? '5 min' }} read</span>
                    </div>
                    <div class="blog-lane-card__body">
                        <span class="blog-pill">{{ $relatedBlog->category }}</span>
                        <h3 class="blog-title">{{ $relatedBlog->title }}</h3>
                        <p class="blog-excerpt">{{ Str::limit($relatedBlog->excerpt, 100) }}</p>
                        <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="blog-action">
                            Read article
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h14"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</article>

@push('styles')
<style>
    .blog-content {
        color: var(--text-secondary);
        line-height: 1.8;
    }
    .blog-content h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--heading);
        margin-top: 2.5rem;
        margin-bottom: 1rem;
        line-height: 1.3;
    }
    .blog-content h3 {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--heading);
        margin-top: 2rem;
        margin-bottom: 0.75rem;
    }
    .blog-content p {
        margin-bottom: 1.25rem;
        color: var(--text-secondary);
    }
    .blog-content ul, .blog-content ol {
        margin: 1.5rem 0;
        padding-left: 2rem;
    }
    .blog-content li {
        margin-bottom: 0.75rem;
        color: var(--text-secondary);
    }
    .blog-content strong {
        color: var(--heading);
        font-weight: 600;
    }
    .blog-content code {
        background: rgba(37, 99, 235, 0.1);
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-size: 0.9em;
        color: var(--brand-primary);
    }
    .blog-content blockquote {
        border-left: 4px solid var(--brand-primary);
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: var(--text-muted);
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
        transform: scale(1.08);
    }
    .blog-lane-card__body {
        padding: 1.65rem;
        display: flex;
        flex-direction: column;
        gap: 0.85rem;
    }
    .blog-title {
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--heading);
        line-height: 1.4;
        transition: color .3s ease;
    }
    .blog-lane-card:hover .blog-title {
        color: var(--brand-primary);
    }
    .blog-excerpt {
        color: var(--text-secondary);
        font-size: 0.9rem;
        line-height: 1.6;
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
</style>
@endpush

<!-- Schema Markup -->
@include('components.schema.blog-posting', ['blog' => $blog])
@include('components.schema.breadcrumb', [
    'items' => [
        ['name' => 'Home', 'url' => url('/')],
        ['name' => 'Blog', 'url' => route('blog.index')],
        ['name' => $blog->title, 'url' => url()->current()],
    ]
])
@endsection
