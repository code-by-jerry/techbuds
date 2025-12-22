@php
    // ============================================
    // MODERN SEO META TAGS COMPONENT (2024-2025)
    // ============================================
    // Based on Google's latest guidelines and best practices
    // Removed deprecated tags: keywords, revisit-after
    // Focus: Essential meta tags that actually impact SEO
    
    // Default values (fallbacks)
    $defaultTitle = 'Techbuds - Design Develop Deliver | Web & Mobile App Development Services';
    $defaultDescription = 'Techbuds delivers professional web development, mobile app development, UI/UX design, DevOps, SEO, and digital marketing solutions. Build scalable, SEO-optimized digital products with experienced developers.';
    $defaultImage = asset('images/og-default.jpg'); // Create at 1200x630px for optimal social sharing
    
    // Page-specific overrides (use $metaTitle, $metaDescription, etc. in your Blade files)
    $pageTitle = $metaTitle ?? $title ?? $defaultTitle;
    $pageDescription = $metaDescription ?? $description ?? $defaultDescription;
    $pageImage = $metaImage ?? $ogImage ?? $defaultImage;
    $canonicalUrl = $canonical ?? url()->current();
    $pageType = $ogType ?? 'website';
    
    // Robots meta tag (use $noindex = true for thank-you pages, admin routes, etc.)
    $noindex = $noindex ?? false;
    $nofollow = $nofollow ?? false;
    $robotsContent = $noindex 
        ? ($nofollow ? 'noindex, nofollow' : 'noindex, follow')
        : ($nofollow ? 'index, nofollow' : 'index, follow');
    
    // Hreflang (only include if multilingual site - set $includeHreflang = true)
    $includeHreflang = $includeHreflang ?? false;
    $hreflangCode = $hreflangCode ?? 'en';
@endphp

<!-- Essential Meta Tags (Critical for SEO) -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes, viewport-fit=cover">
<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="robots" content="{{ $robotsContent }}">
<link rel="canonical" href="{{ $canonicalUrl }}">

<!-- Performance: Resource Hints (DNS Prefetch & Preconnect) -->
<link rel="dns-prefetch" href="https://fonts.googleapis.com">
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link rel="dns-prefetch" href="https://api.fontshare.com">
<link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
<link rel="dns-prefetch" href="https://images.unsplash.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://api.fontshare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net">

<!-- Open Graph / Facebook (Essential for Social Sharing) -->
<meta property="og:type" content="{{ $pageType }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:image" content="{{ $pageImage }}">
<meta property="og:site_name" content="Techbuds">
<meta property="og:locale" content="en_US">

<!-- Twitter Card (Essential for Twitter Sharing) -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $canonicalUrl }}">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $pageImage }}">

<!-- Additional Meta Tags (UX & Branding - Low SEO Impact) -->
<meta name="theme-color" content="#2563EB">
@if($includeHreflang)
<link rel="alternate" hreflang="{{ $hreflangCode }}" href="{{ $canonicalUrl }}">
@endif

{{-- 
    ============================================
    NOTES & USAGE EXAMPLES
    ============================================
    
    BASIC USAGE:
    @include('components.meta-tags')
    
    WITH CUSTOM VALUES:
    @php
        $metaTitle = 'Custom Page Title | Techbuds';
        $metaDescription = 'Custom description (150-160 characters recommended)';
        $metaImage = asset('images/custom-og-image.jpg'); // Optional
    @endphp
    @include('components.meta-tags')
    
    FOR NOINDEX PAGES (thank-you, admin, test pages):
    @php
        $noindex = true;
    @endphp
    @include('components.meta-tags')
    
    TITLE LENGTH RECOMMENDATIONS:
    - Desktop: ~580-600px width (~60 characters)
    - Mobile: ~520px width (~55 characters)
    - Google truncates by pixel width, not character count
    
    STRUCTURED DATA:
    - Organization schema: Implemented in footer.blade.php
    - Service schema: Use components/service-schema.blade.php
    - Breadcrumb schema: Included in service-schema component
    - FAQ schema: Included in service-schema component
    
    ============================================
    REMOVED TAGS (Deprecated/No SEO Impact):
    ============================================
    - meta keywords (Google ignores completely)
    - revisit-after (Deprecated, ignored by Google)
    - author (No ranking benefit, kept as optional)
    - hreflang (Only if multilingual site)
--}}
