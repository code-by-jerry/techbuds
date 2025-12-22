@php
    // LocalBusiness Schema Component
    // Usage: @include('components.schema.local-business')
    
    $localBusinessSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        '@id' => url('/#localbusiness'),
        'name' => 'Techbuds',
        'image' => asset('images/techbuds-light.png'),
        'url' => url('/'),
        'description' => 'Techbuds - Design Develop Deliver. Professional web development, mobile app development, UI/UX design, DevOps, and digital marketing services in Bangalore, India.',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Bangalore',
            'addressRegion' => 'Karnataka',
            'postalCode' => '560001',
            'addressCountry' => 'IN',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => '12.9716',
            'longitude' => '77.5946',
        ],
        'telephone' => '+91-7092936243',
        'email' => 'techbuds57@gmail.com',
        'priceRange' => '$$',
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '09:00',
                'closes' => '18:00',
            ],
        ],
        'areaServed' => [
            [
                '@type' => 'Country',
                'name' => 'India',
            ],
            [
                '@type' => 'Country',
                'name' => 'United States',
            ],
            [
                '@type' => 'Country',
                'name' => 'United Kingdom',
            ],
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Techbuds Services',
            'itemListElement' => array_map(function($slug, $service) {
                return [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => $service['name'] ?? ucfirst(str_replace('-', ' ', $slug)),
                    ],
                ];
            }, array_keys(config('service_pages', [])), config('service_pages', [])),
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($localBusinessSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

