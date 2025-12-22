@php
    // BreadcrumbList Schema Component
    // Usage: @include('components.schema.breadcrumb', ['items' => [['name' => 'Home', 'url' => '/'], ['name' => 'Page', 'url' => '/page']]])
    
    $items = $items ?? [];
    if (empty($items)) {
        // Default breadcrumb: Home -> Current Page
        $items = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => $breadcrumbName ?? 'Page', 'url' => url()->current()],
        ];
    }
    
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array_map(function($item, $index) {
            return [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'],
            ];
        }, $items, array_keys($items)),
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

