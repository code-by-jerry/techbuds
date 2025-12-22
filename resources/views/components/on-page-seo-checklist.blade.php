{{-- On-Page SEO Checklist Component --}}
{{-- This component helps ensure all on-page SEO elements are properly implemented --}}

@php
    // On-Page SEO Best Practices Checklist
    // This is a reference component - actual implementation is in individual pages
    
    $seoChecklist = [
        'headings' => [
            'H1' => 'Only one H1 per page (page title)',
            'H2' => 'Main sections use H2',
            'H3' => 'Sub-sections use H3',
            'hierarchy' => 'Proper H1 > H2 > H3 hierarchy maintained',
        ],
        'title' => [
            'length' => '50-60 characters (optimal)',
            'uniqueness' => 'Unique for each page',
            'keywords' => 'Primary keyword in first 60 characters',
            'brand' => 'Brand name included',
        ],
        'meta_description' => [
            'length' => '150-160 characters',
            'uniqueness' => 'Unique for each page',
            'compelling' => 'Compelling call-to-action',
            'keywords' => 'Primary keyword included naturally',
        ],
        'images' => [
            'alt_text' => 'All images have descriptive alt text',
            'keywords' => 'Alt text includes relevant keywords',
            'descriptive' => 'Alt text describes image content',
            'no_keyword_stuffing' => 'Natural, not keyword-stuffed',
        ],
        'content' => [
            'length' => 'Minimum 300 words (ideally 1000+)',
            'quality' => 'High-quality, original content',
            'keywords' => 'Keywords used naturally (1-2% density)',
            'readability' => 'Easy to read, well-structured',
            'semantic_html' => 'Proper semantic HTML (article, section, etc.)',
        ],
        'internal_linking' => [
            'anchor_text' => 'Descriptive anchor text',
            'relevance' => 'Links to relevant pages',
            'context' => 'Links in context, not just lists',
            'breadcrumbs' => 'Breadcrumb navigation present',
        ],
        'url_structure' => [
            'readable' => 'Readable, descriptive URLs',
            'keywords' => 'Keywords in URL when appropriate',
            'length' => 'Short, concise URLs',
            'hyphens' => 'Hyphens used, not underscores',
        ],
        'mobile' => [
            'responsive' => 'Fully responsive design',
            'viewport' => 'Proper viewport meta tag',
            'touch_friendly' => 'Touch-friendly elements',
        ],
        'performance' => [
            'page_speed' => 'Fast page load times',
            'images' => 'Optimized images',
            'minification' => 'CSS/JS minified',
        ],
    ];
@endphp

{{-- This component is for reference only --}}
{{-- All on-page SEO elements should be implemented directly in pages --}}

