@php
    // Blog Schema Component (for blog index page)
    // Usage: @include('components.schema.blog', ['blogs' => $blogs])
    
    $blogSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Blog',
        '@id' => route('blog.index') . '#blog',
        'name' => 'Techbuds Blog',
        'description' => 'SEO blogs, technical guides, and insights on web development, mobile apps, UI/UX design, DevOps, and digital marketing.',
        'url' => route('blog.index'),
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Techbuds',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/techbuds-light.png'),
            ],
        ],
    ];
    
    // Add blog posts if available
    if (isset($blogs) && $blogs->count() > 0) {
        $blogSchema['blogPost'] = $blogs->take(10)->map(function($blog) {
            return [
                '@type' => 'BlogPosting',
                'headline' => $blog->title,
                'url' => route('blog.show', $blog->slug),
                'datePublished' => $blog->published_date?->toIso8601String() ?? $blog->created_at->toIso8601String(),
                'image' => $blog->featured_image ?? asset('images/og-default.jpg'),
            ];
        })->values()->toArray();
    }
@endphp

<script type="application/ld+json">
{!! json_encode($blogSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

