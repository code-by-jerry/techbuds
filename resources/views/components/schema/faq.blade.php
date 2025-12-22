@php
    // FAQPage Schema Component
    // Usage: @include('components.schema.faq', ['faqs' => [['q' => 'Question?', 'a' => 'Answer.']]])
    
    $faqs = $faqs ?? [];
    
    if (empty($faqs)) {
        return;
    }
    
    $faqEntities = array_map(function($faq) {
        return [
            '@type' => 'Question',
            'name' => $faq['q'] ?? $faq['question'] ?? '',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a'] ?? $faq['answer'] ?? '',
            ],
        ];
    }, $faqs);
    
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faqEntities,
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>

