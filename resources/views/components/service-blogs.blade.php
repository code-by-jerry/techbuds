@php
    use App\Models\Blog;

    /** @var string $serviceKey */

    $serviceToCategories = [
        'seo-digital-marketing' => ['Technical SEO', 'Content'],
        'web-development' => ['Performance'],
        'mobile-app-development' => ['Mobile'],
        'ui-ux-design' => ['Analytics', 'Content'],
        'devops-cloud' => ['DevOps', 'Performance'],
        'database-data-warehousing' => ['Analytics'],
        'ai-automation' => ['Content'],
        'custom-it-solutions' => ['Content', 'Performance'],
    ];

    $categories = $serviceToCategories[$serviceKey] ?? [];
    $primaryCategory = $categories[0] ?? null;

    $articles = collect();
    if (!empty($categories)) {
        $articles = Blog::where('is_published', true)
            ->whereIn('category', $categories)
            ->orderBy('published_date', 'desc')
            ->limit(3)
            ->get();
    }
@endphp

@if($articles->count() > 0)
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white border-t border-[#11224E]/5">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-8" data-animate="fade-up">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-[#11224E] leading-tight">
                        Latest articles about {{ $serviceKey === 'seo-digital-marketing' ? 'SEO & Digital Marketing' : ($service['name'] ?? 'this service') }}
                    </h2>
                    <p class="mt-2 text-sm md:text-base text-[#11224E]/75 max-w-xl">
                        Deep dives, checklists, and case studies from our blog that expand on the strategies we use for this service.
                    </p>
                </div>
                <a href="{{ $primaryCategory ? route('blog.index', ['category' => $primaryCategory]) : route('blog.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-[#088395] hover:text-[#11224E]">
                    View all {{ $primaryCategory ?? 'SEO' }} articles
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h15"></path>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($articles as $blog)
                    <article
                        class="flex flex-col bg-white border border-[#11224E]/10 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300"
                        data-animate="fade-up"
                        data-delay="{{ ($loop->index % 3) * 0.06 }}">
                        <a href="{{ route('blog.show', $blog->slug) }}" class="block overflow-hidden">
                            <img
                                src="{{ $blog->featured_image ?? 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=1600&q=60' }}"
                                alt="{{ $blog->title }}"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                                class="w-full h-44 object-cover transform hover:scale-105 transition-transform duration-500"
                            >
                        </a>
                        <div class="flex-1 flex flex-col gap-3 px-5 py-5">
                            <div class="flex items-center justify-between text-xs text-[#11224E]/60">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-[#088395]/5 font-semibold tracking-[0.18em] uppercase">
                                    {{ $blog->category }}
                                </span>
                                <span class="text-[0.7rem] font-semibold tracking-[0.18em] uppercase">
                                    {{ $blog->reading_time ?? '5 min' }} read
                                </span>
                            </div>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="group">
                                <h3 class="text-base font-semibold text-[#11224E] leading-snug group-hover:text-[#088395] transition-colors">
                                    {{ $blog->title }}
                                </h3>
                            </a>
                            <p class="text-sm text-[#11224E]/75 leading-relaxed line-clamp-3">
                                {{ $blog->excerpt }}
                            </p>
                            @if($blog->signals)
                                <div class="flex flex-wrap gap-2 mt-1">
                                    @foreach(array_slice($blog->signals, 0, 2) as $signal)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full bg-[#088395]/5 text-[0.65rem] font-semibold tracking-[0.18em] uppercase text-[#11224E]">
                                            {{ $signal }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="mt-auto pt-1">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#088395] hover:text-[#11224E]">
                                    Read article
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h15"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif