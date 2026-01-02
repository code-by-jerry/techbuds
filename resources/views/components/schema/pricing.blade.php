@php
    // Pricing Schema Component
    // Usage: @include('components.schema.pricing', ['pricingData' => $pricingData, 'serviceSlug' => $slug])
    
    if (!isset($pricingData)) {
        return;
    }
    
    $serviceSlug = $serviceSlug ?? null;
    $serviceConfig = $serviceConfig ?? null;
    
    // Create Service schema with PriceSpecification
    $serviceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        '@id' => url()->current() . '#service',
        'name' => $pricingData['name'],
        'description' => $serviceConfig['description'] ?? 'Professional ' . strtolower($pricingData['name']) . ' services with transparent pricing.',
        'provider' => [
            '@type' => 'Organization',
            'name' => 'Techbuds',
            'url' => url('/'),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/techbuds-light.png'),
            ],
        ],
        'url' => url()->current(),
        'serviceType' => $serviceConfig['serviceType'] ?? $pricingData['name'],
    ];
    
    // Add offers (PriceSpecification) for each tier
    $offers = [];
    foreach ($pricingData['tiers'] as $tierKey => $tier) {
        // Extract numeric price from string (remove ₹, commas, and "From")
        $priceValue = preg_replace('/[^0-9]/', '', $tier['price']);
        $priceValue = (int) $priceValue;
        
        $offer = [
            '@type' => 'Offer',
            'name' => $tier['name'] . ' - ' . $pricingData['name'],
            'description' => $tier['description'],
            'price' => $priceValue,
            'priceCurrency' => 'INR',
            'availability' => 'https://schema.org/InStock',
            'url' => route('contact'),
            'priceSpecification' => [
                '@type' => 'PriceSpecification',
                'price' => $priceValue,
                'priceCurrency' => 'INR',
                'valueAddedTaxIncluded' => true,
            ],
        ];
        
        // Add validFrom and validThrough for monthly services
        if (isset($pricingData['is_monthly']) && $pricingData['is_monthly']) {
            $offer['priceSpecification']['billingDuration'] = 'P1M';
            $offer['priceSpecification']['unitText'] = 'MONTH';
        }
        
        $offers[] = $offer;
    }
    
    $serviceSchema['offers'] = $offers;
    
    // Add aggregateRating (optional - can be removed if not needed)
    // $serviceSchema['aggregateRating'] = [
    //     '@type' => 'AggregateRating',
    //     'ratingValue' => '4.8',
    //     'reviewCount' => '50',
    //     'bestRating' => '5',
    //     'worstRating' => '1',
    // ];
@endphp

<script type="application/ld+json">
{!! json_encode($serviceSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

