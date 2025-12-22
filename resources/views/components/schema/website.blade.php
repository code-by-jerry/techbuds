@php
    // WebSite Schema Component
    // Usage: @include('components.schema.website')
    
    $websiteSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => url('/#website'),
        'name' => 'Techbuds',
        'url' => url('/'),
        'description' => 'Techbuds - Design Develop Deliver. Professional web development, mobile app development, UI/UX design, DevOps, and digital marketing services.',
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Techbuds',
        ],
        'potentialAction' => [
            [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => url('/blog?search={search_term_string}'),
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

