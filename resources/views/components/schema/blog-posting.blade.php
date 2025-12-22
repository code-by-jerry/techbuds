@php
    // BlogPosting Schema Component
    // Usage: @include('components.schema.blog-posting', ['blog' => $blog])
    
    if (!isset($blog)) {
        return;
    }
    
    $blogPostingSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        '@id' => url()->current() . '#blogposting',
        'headline' => $blog->title,
        'description' => $blog->excerpt ?? $blog->meta_description ?? strip_tags(Str::limit($blog->formatted_content ?? '', 160)),
        'image' => $blog->featured_image ?? asset('images/og-default.jpg'),
        'datePublished' => $blog->published_date?->toIso8601String() ?? $blog->created_at->toIso8601String(),
        'dateModified' => $blog->updated_at->toIso8601String(),
        'author' => [
            '@type' => 'Organization',
            'name' => 'Techbuds',
            'url' => url('/'),
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Techbuds',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/techbuds-light.png'),
            ],
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => url()->current(),
        ],
        'articleSection' => $blog->category ?? 'General',
        'keywords' => $blog->signals ?? [],
        'wordCount' => str_word_count(strip_tags($blog->formatted_content ?? '')),
        'timeRequired' => 'PT' . ($blog->reading_time ?? 5) . 'M',
    ];
    
    // Add articleBody if content is available
    if (!empty($blog->formatted_content)) {
        $blogPostingSchema['articleBody'] = strip_tags($blog->formatted_content);
    }
@endphp

<script type="application/ld+json">
{!! json_encode($blogPostingSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

