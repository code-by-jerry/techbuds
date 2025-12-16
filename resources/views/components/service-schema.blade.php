@php
    /** @var string $serviceKey */
    $config = config("service_pages.$serviceKey");
    $areaName = $areaName ?? 'India';

    if ($config) {
        $serviceSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            '@id' => url("/services/{$serviceKey}#service"),
            'name' => $config['name'],
            'description' => $config['description'],
            'serviceType' => $config['serviceType'],
            'provider' => [
                '@type' => 'Organization',
                'name' => 'Techbuds',
                'url' => url('/'),
            ],
            'areaServed' => [
                '@type' => 'Country',
                'name' => $areaName,
            ],
            'url' => url()->current(),
        ];

        $faqEntities = [];
        foreach ($config['faqs'] as $faq) {
            $faqEntities[] = [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['a'],
                ],
            ];
        }

        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqEntities,
        ];

        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Services',
                    'item' => route('services'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $config['name'],
                    'item' => url()->current(),
                ],
            ],
        ];
    }
@endphp

@if (!empty($serviceSchema ?? null))
    <script type="application/ld+json">
        {!! json_encode($serviceSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>
@endif


