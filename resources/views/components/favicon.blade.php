{{-- 
    ============================================
    FAVICON COMPONENT (Google Search Optimized)
    ============================================
    Properly configured favicon tags for Google Search results
    
    Google Requirements:
    - Square (1:1 aspect ratio)
    - At least 48×48 px (or multiple: 96, 144, 192)
    - PNG, SVG, or ICO format
    - Must be crawlable (no auth, no blocking)
    - Must visually represent your brand
    
    Files used:
    - /favicon.ico (48×48 or multi-size ICO)
    - /favicon-96x96.png (96×96 PNG)
    - /apple-touch-icon.png (180×180 PNG)
--}}

<!-- Favicon for Google Search & Browser Tabs -->
@php
    $baseUrl = url('/');
@endphp
<link rel="icon" href="{{ $baseUrl }}/favicon.ico" sizes="any">
<link rel="icon" type="image/png" sizes="96x96" href="{{ $baseUrl }}/favicon-96x96.png">
<link rel="apple-touch-icon" href="{{ $baseUrl }}/apple-touch-icon.png">

