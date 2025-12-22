@php
    // Organization Schema Component
    // Usage: @include('components.schema.organization')
    
    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => url('/#organization'),
        'name' => 'Techbuds',
        'url' => url('/'),
        'logo' => asset('images/techbuds-light.png'),
        'description' => 'Techbuds - Design Develop Deliver. Professional web development, mobile app development, UI/UX design, DevOps, and digital marketing services.',
        'foundingDate' => '2020',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Bangalore',
            'addressRegion' => 'Karnataka',
            'addressCountry' => 'IN',
        ],
        'contactPoint' => [
            [
                '@type' => 'ContactPoint',
                'telephone' => '+91-7092936243',
                'contactType' => 'Customer Service',
                'email' => 'techbuds57@gmail.com',
                'areaServed' => 'Worldwide',
                'availableLanguage' => ['English', 'Hindi'],
            ],
        ],
        'sameAs' => [
            'https://twitter.com/techbuds',
            'https://linkedin.com/company/techbuds',
            'https://github.com/techbuds',
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

