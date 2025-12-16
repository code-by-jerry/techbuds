<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Techbuds - Design Develop Deliver</title>
    <meta name="description" content="Techbuds - Your trusted partner for Web Apps, Mobile Apps, UI/UX Design, DevOps, Database Warehousing, and Digital Marketing solutions.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <style>
            /* Floating blobs */
            @keyframes floatSlow { 0% { transform: translateY(0) } 50% { transform: translateY(-10px) } 100% { transform: translateY(0) } }
            @keyframes floatDelay { 0% { transform: translateY(0) } 50% { transform: translateY(8px) } 100% { transform: translateY(0) } }
            .float-slow { animation: floatSlow 10s ease-in-out infinite; will-change: transform; }
            .float-delay { animation: floatDelay 12s ease-in-out infinite; will-change: transform; }

            /* (removed stroke-dash animation by request) */

            /* Gentle reveal utilities */
            .reveal { opacity: 0; transform: translateY(10px); transition: opacity .9s ease, transform .9s ease; }
            .reveal.show { opacity: 1; transform: translateY(0); }

            /* Keyword emphasis (no sweep background) */
            .highlight { color: #088395; font-weight: 800; }
            .accent-touch { color: #7E30E1; }
            .accent-bg { background: linear-gradient(135deg, rgba(126,48,225,0.1), rgba(126,48,225,0.05)); }

            /* Gradient text clip */
            .text-clip {
                background: linear-gradient(135deg, #088395 0%, #37B7C3 50%, #7E30E1 100%);
                background-size: 200% 200%;
                background-position: 0% 50%;
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            /* Tech marquee banner */
            @keyframes marquee-left {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            @keyframes marquee-right {
                0% { transform: translateX(-50%); }
                100% { transform: translateX(0); }
            }
            .stack-marquee {
                position: relative;
                overflow: hidden;
                background: radial-gradient(circle at top left, rgba(255,255,255,0.12), transparent 45%), linear-gradient(135deg, #088395 0%, #37B7C3 100%);
                color: #FFFDF6;
            }
            .stack-marquee::before,
            .stack-marquee::after {
                content: '';
                position: absolute;
                inset: 0;
                background-image: linear-gradient(90deg, rgba(17, 34, 78, 0.2) 1px, transparent 1px);
                background-size: 60px 100%;
                opacity: 0.12;
                pointer-events: none;
            }
            .stack-marquee::after {
                background-image: linear-gradient(180deg, rgba(17, 34, 78, 0.2) 1px, transparent 1px);
                background-size: 100% 60px;
                opacity: 0.07;
            }
            .stack-marquee__overlay {
                position: absolute;
                inset: 0;
                pointer-events: none;
                background: radial-gradient(circle at center, rgba(255,255,255,0.08), transparent 65%);
                mix-blend-mode: screen;
            }
            .stack-marquee__line {
                display: flex;
                flex-wrap: nowrap;
                align-items: center;
                gap: 4rem;
                min-width: 200%;
                font-size: clamp(2.8rem, 12vw, 8rem);
                font-weight: 700;
                letter-spacing: -0.02em;
                white-space: nowrap;
            }
            .stack-marquee__line span {
                text-transform: uppercase;
            }
            .stack-marquee__line--primary {
                animation: marquee-left 28s linear infinite;
                color: transparent;
                background: linear-gradient(90deg, #ffffff 0%, #c6d4ff 50%, #ffffff 100%);
                -webkit-background-clip: text;
                background-clip: text;
            }
            .stack-marquee__line--secondary {
                animation: marquee-right 32s linear infinite;
                color: transparent;
                -webkit-text-stroke: 2px rgba(255,255,255,0.35);
            }
            .stack-marquee__line--secondary span {
                opacity: 0.9;
            }
            @media (max-width: 768px) {
                .stack-marquee__line {
                    gap: 2rem;
                    font-size: clamp(2.2rem, 18vw, 4.4rem);
                }
                .stack-marquee__line--secondary {
                    -webkit-text-stroke: 1px rgba(255,255,255,0.3);
                }
            }

            /* Hero enhancements */
            .hero-grid {
                display: grid;
                gap: 2.5rem;
                align-items: center;
            }
            @media (min-width: 1024px) {
                .hero-grid {
                    grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
                    gap: 3.5rem;
                }
            }
            .hero-pill {
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                padding: 0.4rem 1rem;
                border-radius: 999px;
                background: rgba(8,131,149,0.09);
                color: #11224E;
                font-size: 0.65rem;
                letter-spacing: 0.32em;
                text-transform: uppercase;
                font-weight: 600;
            }
            .hero-description {
                font-size: clamp(1rem, 1.6vw, 1.125rem);
                color: rgba(8,131,149,0.8);
                line-height: 1.8;
            }
            .hero-highlights {
                display: flex;
                flex-wrap: wrap;
                gap: 0.75rem;
            }
            .hero-highlight {
                padding: 0.55rem 1.1rem;
                border-radius: 999px;
                background: rgba(8,131,149,0.08);
                color: #11224E;
                font-size: 0.8rem;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                font-weight: 600;
            }
            .hero-visual {
                position: relative;
                padding: 1rem;
            }
            .hero-visual-main {
                position: relative;
                border-radius: 2rem;
                overflow: hidden;
                padding: 2.75rem 2.25rem;
                background: linear-gradient(135deg, rgba(8,131,149,0.94) 0%, rgba(55,183,195,0.7) 100%);
                box-shadow: 0 40px 100px rgba(8,131,149,0.25);
                color: #FFFDF6;
            }
            .hero-visual-main::before {
                content: '';
                position: absolute;
                inset: 0;
                background: radial-gradient(circle at top right, rgba(255,253,246,0.35), transparent 55%);
                mix-blend-mode: lighten;
                opacity: 0.9;
            }
            .hero-visual-main h3 {
                font-size: clamp(1.25rem, 2.4vw, 1.75rem);
                font-weight: 700;
                letter-spacing: -0.01em;
            }
            .hero-visual-main p {
                font-size: 0.95rem;
                color: rgba(255,253,246,0.78);
            }
            .hero-metrics {
                display: flex;
                flex-wrap: wrap;
                gap: 1.25rem;
                margin-top: 2rem;
            }
            .hero-metric {
                flex: 1 1 140px;
            }
            .hero-metric strong {
                display: block;
                font-size: clamp(1.6rem, 3vw, 2rem);
                font-weight: 700;
                color: #FFFDF6;
            }
            .hero-metric span {
                font-size: 0.75rem;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                color: rgba(255,253,246,0.6);
            }
            .hero-floating {
                position: absolute;
                display: inline-flex;
                flex-direction: column;
                gap: 0.3rem;
                padding: 1rem 1.2rem;
                border-radius: 1.4rem;
                background: rgba(255,255,255,0.9);
                color: #11224E;
                box-shadow: 0 20px 60px rgba(8,131,149,0.18);
                backdrop-filter: blur(6px);
                max-width: 180px;
            }
            .hero-floating small {
                font-size: 0.65rem;
                letter-spacing: 0.28em;
                text-transform: uppercase;
                color: rgba(8,131,149,0.55);
            }
            .hero-floating strong {
                font-size: 1.05rem;
                font-weight: 700;
                letter-spacing: -0.015em;
            }
            .hero-floating--top {
                top: -3.5rem;
                right: 3rem;
            }
            .hero-floating--bottom {
                bottom: -2.5rem;
                left: 0;
            }
            @media (max-width: 1024px) {
                .hero-floating--top {
                    top: -2.5rem;
                    right: 1.5rem;
                }
                .hero-floating--bottom {
                    bottom: -2rem;
                    left: 1rem;
                }
            }
            @media (max-width: 640px) {
                .hero-visual {
                    padding: 0;
                }
                .hero-visual-main {
                    padding: 2.25rem 1.75rem;
                }
                .hero-floating {
                    display: none;
                }
                .hero-highlights {
                    gap: 0.5rem;
                }
            }

            /* Services narrative panels */
            .service-panel {
                position: relative;
                border-radius: 2rem;
                overflow: hidden;
                background: linear-gradient(135deg, rgba(255,253,246,0.9) 0%, rgba(255,253,246,0.62) 100%);
                border: 1px solid rgba(8,131,149,0.1);
                box-shadow: 0 22px 60px rgba(8,131,149,0.07);
            }
            .service-panel::before {
                content: '';
                position: absolute;
                inset: 0;
                background: radial-gradient(circle at top left, rgba(8,131,149,0.07), transparent 55%);
                mix-blend-mode: multiply;
                pointer-events: none;
            }
            .service-media {
                position: relative;
                border-radius: 1.6rem;
                overflow: hidden;
            }
            .service-media::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, rgba(8,131,149,0.55) 0%, rgba(55,183,195,0.1) 75%);
                opacity: 0.55;
            }
            .service-media img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transform: scale(1.05);
            }
            .service-pill {
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                padding: 0.45rem 1.1rem;
                border-radius: 999px;
                background: rgba(8,131,149,0.08);
                color: #11224E;
                font-size: 0.65rem;
                letter-spacing: 0.28em;
                text-transform: uppercase;
                font-weight: 600;
            }
            .service-icon {
                display: inline-flex;
                width: 2.5rem;
                height: 2.5rem;
                border-radius: 1rem;
                background: linear-gradient(135deg, #11224E 0%, #088395 100%);
                color: #FFFDF6;
                align-items: center;
                justify-content: center;
                box-shadow: 0 15px 35px rgba(8,131,149,0.25);
            }
            .service-highlights {
                display: grid;
                gap: 0.75rem;
            }
            .service-highlight {
                position: relative;
                padding-left: 1.4rem;
                font-size: 0.9rem;
                color: rgba(8,131,149,0.78);
            }
            .service-highlight::before {
                content: '';
                position: absolute;
                left: 0;
                top: 0.4rem;
                width: 0.5rem;
                height: 0.5rem;
                border-radius: 0.3rem;
                background: linear-gradient(135deg, #11224E 0%, #088395 100%);
                box-shadow: 0 6px 12px rgba(8,131,149,0.25);
            }
            .service-meta {
                display: flex;
                flex-wrap: wrap;
                gap: 1rem;
                margin-top: 1.1rem;
            }
            .service-meta span {
                font-size: 0.75rem;
                letter-spacing: 0.22em;
                text-transform: uppercase;
                color: rgba(8,131,149,0.5);
            }
            @media (max-width: 1024px) {
                .service-panel {
                    border-radius: 1.6rem;
                }
                .service-media {
                    border-radius: 1.3rem;
                }
            }

            /* Compact Story Timeline */
            .story-wrapper {
                position: relative;
            }
            .story-intro {
                text-align: center;
                margin-bottom: 3rem;
            }
            .story-timeline {
                position: relative;
                max-width: 800px;
                margin: 0 auto;
            }
            .story-timeline::before {
                content: '';
                position: absolute;
                left: 1.5rem;
                top: 0;
                bottom: 0;
                width: 2px;
                background: linear-gradient(180deg, #11224E 0%, rgba(8,131,149,0.2) 100%);
            }
            .story-item {
                position: relative;
                padding-left: 4rem;
                margin-bottom: 2.5rem;
            }
            .story-item::before {
                content: '';
                position: absolute;
                left: 1rem;
                top: 0.5rem;
                width: 1rem;
                height: 1rem;
                border-radius: 50%;
                background: #11224E;
                border: 3px solid #FFFDF6;
                box-shadow: 0 0 0 4px rgba(8,131,149,0.1);
            }
            .story-item__date {
                font-size: 0.75rem;
                font-weight: 600;
                letter-spacing: 0.15em;
                text-transform: uppercase;
                color: #11224E;
                margin-bottom: 0.5rem;
            }
            .story-item__title {
                font-size: 1.1rem;
                font-weight: 600;
                color: #11224E;
                margin-bottom: 0.5rem;
            }
            .story-item__text {
                font-size: 0.9rem;
                line-height: 1.6;
                color: rgba(8,131,149,0.7);
            }
            .story-mvv {
                margin-top: 4rem;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.5rem;
            }
            .story-mvv-card {
                background: white;
                border-radius: 1rem;
                padding: 1.5rem;
                border: 1px solid rgba(8,131,149,0.08);
                box-shadow: 0 4px 12px rgba(8,131,149,0.06);
            }
            .story-mvv-card h4 {
                font-size: 0.85rem;
                font-weight: 600;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #11224E;
                margin-bottom: 0.75rem;
            }
            .story-mvv-card p {
                font-size: 0.9rem;
                line-height: 1.6;
                color: rgba(8,131,149,0.75);
            }
            .story-values {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
                margin-top: 1rem;
            }
            .story-value {
                padding: 0.75rem;
                background: rgba(8,131,149,0.04);
                border-radius: 0.5rem;
                border-left: 3px solid #11224E;
            }
            .story-value h5 {
                font-size: 0.85rem;
                font-weight: 600;
                color: #11224E;
                margin-bottom: 0.25rem;
            }
            .story-value p {
                font-size: 0.8rem;
                color: rgba(8,131,149,0.65);
                line-height: 1.5;
            }
            @media (max-width: 768px) {
                .story-timeline::before {
                    left: 1rem;
                }
                .story-item {
                    padding-left: 3rem;
                }
                .story-item::before {
                    left: 0.5rem;
                }
                .story-mvv {
                    grid-template-columns: 1fr;
                }
            }

            /* SEO insight lanes */
            .blog-shell {
                position: relative;
                overflow: hidden;
            }
            .blog-shell::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(8,131,149,0.06), rgba(55,183,195,0.02) 60%);
                pointer-events: none;
            }
            .blog-stack {
                display: flex;
                flex-direction: column;
                gap: 1.8rem;
            }
            .blog-filters {
                display: flex;
                flex-direction: row;
                gap: 0.55rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            @media (min-width: 1024px) {
                .blog-filters {
                    justify-content: flex-start;
                }
            }
            .blog-filter {
                display: inline-flex;
                align-items: center;
                gap: 0.45rem;
                padding: 0.35rem 0.85rem;
                border-radius: 999px;
                background: rgba(8,131,149,0.08);
                color: #11224E;
                font-size: 0.62rem;
                letter-spacing: 0.26em;
                text-transform: uppercase;
                font-weight: 600;
                transition: background .3s ease, color .3s ease;
            }
            .blog-filter:hover,
            .blog-filter--active {
                background: #11224E;
                color: #FFFDF6;
            }
            .blog-lanes {
                display: grid;
                gap: 1.7rem;
                position: relative;
                grid-template-columns: minmax(0,1fr);
            }
            @media (min-width: 768px) {
                .blog-lanes {
                    grid-template-columns: repeat(2, minmax(0,1fr));
                    gap: 1.8rem;
                }
            }
            @media (min-width: 1280px) {
                .blog-lanes {
                    grid-template-columns: repeat(3, minmax(0,1fr));
                    gap: 1.9rem;
                }
            }
            .blog-hero {
                grid-column: 1 / -1;
                position: relative;
                border-radius: 2.3rem;
                overflow: hidden;
                background: linear-gradient(120deg, rgba(8,131,149,0.9), rgba(55,183,195,0.55));
                color: #FFFDF6;
                padding: clamp(1.6rem, 5vw, 2.7rem);
                display: grid;
                gap: 1.1rem;
                box-shadow: 0 26px 70px rgba(8,131,149,0.17);
            }
            .blog-hero::before {
                content: 'SERP';
                position: absolute;
                top: -1.7rem;
                left: clamp(1.2rem, 7vw, 2.4rem);
                font-size: clamp(3.4rem, 16vw, 8.5rem);
                font-weight: 800;
                letter-spacing: -0.05em;
                color: rgba(255,253,246,0.08);
            }
            .blog-hero h3 {
                font-size: clamp(1.45rem, 2.3vw, 1.95rem);
                font-weight: 700;
                letter-spacing: -0.01em;
            }
            .blog-hero p {
                color: rgba(255,253,246,0.78);
                line-height: 1.6;
                max-width: 36rem;
            }
            .blog-hero-meta {
                display: flex;
                flex-wrap: wrap;
                gap: 0.7rem;
            }
            .blog-hero-meta span {
                display: inline-flex;
                align-items: center;
                gap: 0.3rem;
                padding: 0.4rem 0.9rem;
                border-radius: 999px;
                background: rgba(255,253,246,0.12);
                font-size: 0.64rem;
                letter-spacing: 0.25em;
                text-transform: uppercase;
            }
            .blog-lane-card {
                position: relative;
                border-radius: 2rem;
                background: rgba(255,255,255,0.9);
                border: 1px solid rgba(8,131,149,0.1);
                box-shadow: 0 16px 45px rgba(8,131,149,0.12);
                overflow: hidden;
                display: flex;
                flex-direction: column;
                transition: transform .45s ease, box-shadow .45s ease;
            }
            .blog-lane-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 24px 70px rgba(8,131,149,0.16);
            }
            .blog-lane-card::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(8,131,149,0.08), rgba(55,183,195,0.02) 55%);
                opacity: 0;
                transition: opacity .45s ease;
                pointer-events: none;
                z-index: 0;
            }
            .blog-lane-card:hover::before {
                opacity: 1;
            }
            .blog-lane-card__media {
                position: relative;
                height: 190px;
                overflow: hidden;
            }
            .blog-lane-card__media img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform .6s ease;
                transform-origin: center center;
            }
            .blog-lane-card:hover .blog-lane-card__media img {
                transform: scale(1.08) rotate(-1deg);
            }
            .blog-lane-card__body {
                padding: 1.65rem;
                display: flex;
                flex-direction: column;
                gap: 0.85rem;
                position: relative;
                z-index: 1;
            }
            .blog-pill {
                display: inline-flex;
                align-items: center;
                gap: 0.45rem;
                padding: 0.3rem 0.75rem;
                border-radius: 999px;
                background: rgba(8,131,149,0.08);
                color: #11224E;
                font-size: 0.6rem;
                letter-spacing: 0.28em;
                text-transform: uppercase;
                font-weight: 600;
            }
            .blog-title-link {
                text-decoration: none;
                display: block;
                position: relative;
                z-index: 2;
                cursor: pointer;
            }
            .blog-title {
                font-size: 1.05rem;
                font-weight: 600;
                color: #11224E;
                line-height: 1.4;
                transition: color .3s ease;
                margin: 0;
            }
            .blog-lane-card:hover .blog-title {
                color: #088395;
            }
            .blog-title-link:hover .blog-title {
                color: #088395;
            }
            .blog-excerpt {
                color: rgba(8,131,149,0.72);
                font-size: 0.9rem;
                line-height: 1.6;
            }
            .blog-signals {
                display: flex;
                flex-wrap: wrap;
                gap: 0.55rem;
                margin-top: 0.2rem;
            }
            .blog-signal {
                display: inline-flex;
                align-items: center;
                gap: 0.3rem;
                padding: 0.35rem 0.75rem;
                border-radius: 999px;
                background: rgba(8,131,149,0.06);
                color: #11224E;
                font-size: 0.6rem;
                letter-spacing: 0.24em;
                text-transform: uppercase;
            }
            .blog-action {
                margin-top: auto;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                font-size: 0.78rem;
                font-weight: 600;
                color: #11224E;
                text-decoration: none;
                position: relative;
                z-index: 2;
                cursor: pointer;
            }
            .blog-action:hover {
                color: #088395;
            }
            .blog-action svg {
                transition: transform .3s ease;
            }
            .blog-lane-card:hover .blog-action svg {
                transform: translateX(4px);
            }
            .blog-time {
                position: absolute;
                top: 1.4rem;
                right: 1.4rem;
                padding: 0.3rem 0.7rem;
                border-radius: 999px;
                background: rgba(255,255,255,0.9);
                color: #11224E;
                font-size: 0.6rem;
                letter-spacing: 0.24em;
                text-transform: uppercase;
            }
            @media (max-width: 768px) {
                .blog-lanes {
                    grid-template-columns: minmax(0,1fr);
                }
                .blog-hero {
                    border-radius: 2rem;
                }
                .blog-filters {
                    justify-content: center;
                }
            }

        /* Simple Testimonials */
        .testimonial-card {
                background: white;
                border: 1px solid rgba(8,131,149,0.08);
                border-radius: 1rem;
                padding: 2rem;
                transition: all .3s ease;
        }
        .testimonial-card:hover {
                border-color: rgba(8,131,149,0.2);
                box-shadow: 0 8px 24px rgba(8,131,149,0.08);
        }
        .testimonial-quote {
                color: rgba(8,131,149,0.85);
                font-size: 0.95rem;
                line-height: 1.7;
                margin-bottom: 1.5rem;
        }
        .testimonial-author {
                display: flex;
                align-items: center;
                gap: 1rem;
        }
        .testimonial-avatar {
                width: 48px;
                height: 48px;
                border-radius: 50%;
                overflow: hidden;
                border: 2px solid rgba(8,131,149,0.1);
        }
        .testimonial-avatar img {
                width: 100%;
                height: 100%;
                object-fit: cover;
        }
        .testimonial-info h4 {
                font-size: 0.95rem;
                font-weight: 600;
                color: #11224E;
                margin-bottom: 0.2rem;
        }
        .testimonial-info p {
                font-size: 0.8rem;
                color: rgba(8,131,149,0.6);
        }

            /* Contact form placeholder text */
            .contact-form input::placeholder,
            .contact-form textarea::placeholder {
                font-size: 0.6rem; /* 8px - smaller than text-[10px] which is 0.625rem */
                line-height: 1.2;
            }

            /* Motion safety */
            @media (prefers-reduced-motion: reduce) {
                .float-slow, .float-delay, .dash-once { animation: none !important; }
                .reveal, .reveal.show { transition: none !important; }
                .marquee-track, .marquee-track-alt { animation: none !important; }
            }
+        .team-shell {
+                background: linear-gradient(135deg, rgba(8,131,149,0.08), rgba(8,131,149,0.02));
+                border-radius: 1.6rem;
+                padding: clamp(1.4rem, 3vw, 2.4rem);
+                border: 1px solid rgba(8,131,149,0.12);
+        }
+        .team-header {
+                text-align: center;
+                display: flex;
+                flex-direction: column;
+                gap: 0.45rem;
+        }
+        .team-strip {
+                display: flex;
+                flex-wrap: wrap;
+                justify-content: center;
+                gap: clamp(1.2rem, 2.8vw, 2.4rem);
+                margin-top: clamp(1.4rem, 3vw, 2.2rem);
+        }
+        .team-person {
+                display: flex;
+                flex-direction: column;
+                align-items: center;
+                text-align: center;
+                gap: 0.4rem;
+                width: clamp(120px, 12vw, 150px);
+        }
+        .team-photo {
+                width: 76px;
+                height: 76px;
+                border-radius: 999px;
+                border: 2px solid rgba(8,131,149,0.2);
+                background: linear-gradient(135deg, rgba(8,131,149,0.12), rgba(8,131,149,0.04));
+                display: flex;
+                align-items: center;
+                justify-content: center;
+                overflow: hidden;
+                position: relative;
+        }
+        .team-photo img {
+                width: 70px;
+                height: 70px;
+                object-fit: contain;
+        }
+        .team-person h3 {
+                font-size: 0.95rem;
+                font-weight: 600;
+                color: #11224E;
+        }
+        .team-role {
+                font-size: 0.65rem;
+                letter-spacing: 0.26em;
+                text-transform: uppercase;
+                color: rgba(8,131,149,0.5);
+        }
+        .team-person p {
+                font-size: 0.74rem;
+                color: rgba(8,131,149,0.6);
+                line-height: 1.45;
+        }
+        .team-person .team-tip {
+                position: absolute;
+                bottom: -1.6rem;
+                left: 50%;
+                transform: translateX(-50%);
+                font-size: 0.63rem;
+                letter-spacing: 0.24em;
+                text-transform: uppercase;
+                color: rgba(8,131,149,0.65);
+        }
+        @media (max-width: 640px) {
+                .team-photo {
+                        width: 64px;
+                        height: 64px;
+                }
+                .team-photo img {
+                        width: 56px;
+                        height: 56px;
+                }
+        }
         @keyframes testimonial-scroll {
                 0% { transform: translateX(0); }
                 100% { transform: translateX(-50%); }
         }
         @media (max-width: 768px) {

        </style>
    </head>
<body class="bg-[#FFFDF6] text-gray-900 antialiased">
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="relative overflow-hidden h-screen pt-32 pb-24 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]" x-data="{ mx:0, my:0, mouseX:-100, mouseY:-100 }" @mousemove="mx = ($event.clientX / window.innerWidth) - 0.5; my = ($event.clientY / window.innerHeight) - 0.5; mouseX = $event.clientX; mouseY = $event.clientY">
        <!-- Decorative SVG background -->
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <svg class="hidden md:block absolute -top-24 -left-24 w-[28rem] h-[28rem] opacity-20 float-slow" viewBox="0 0 600 600" fill="none" :style="`transform: translate3d(${mx*24}px, ${my*18}px, 0)`">
                <defs>
                    <linearGradient id="g1" x1="0" x2="1" y1="0" y2="1">
                        <stop offset="0%" stop-color="#11224E" stop-opacity="0.20"/>
                        <stop offset="100%" stop-color="#11224E" stop-opacity="0.05"/>
                    </linearGradient>
                </defs>
                <path d="M300 40C430 40 560 120 560 250C560 380 450 520 300 560C170 520 40 380 40 250C40 120 170 40 300 40Z" fill="url(#g1)"/>
            </svg>
            <svg class="hidden md:block absolute -bottom-24 -right-24 w-[30rem] h-[30rem] opacity-20 float-delay" viewBox="0 0 600 600" fill="none" :style="`transform: translate3d(${mx*-28}px, ${my*-20}px, 0)`">
                <defs>
                    <linearGradient id="g2" x1="1" x2="0" y1="0" y2="1">
                        <stop offset="0%" stop-color="#11224E" stop-opacity="0.18"/>
                        <stop offset="100%" stop-color="#11224E" stop-opacity="0.05"/>
                    </linearGradient>
                </defs>
                <circle cx="300" cy="300" r="260" fill="url(#g2)"/>
                                    </svg>
            <!-- Laptop with code -->
            <svg class="hidden md:block absolute top-16 right-1/4 w-20 h-20 opacity-30" viewBox="0 0 128 96" fill="none" :style="`transform: translate3d(${mx*10}px, ${my*6}px, 0)`">
                <rect x="16" y="16" width="96" height="56" rx="6" stroke="#11224E" stroke-width="2" fill="transparent"/>
                <path d="M8 80h112" stroke="#11224E" stroke-width="2" stroke-linecap="round"/>
                <path d="M40 36l-10 12 10 12M88 36l10 12-10 12M68 30l-8 36" stroke="#11224E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <!-- Smartphone detailed -->
            <svg class="hidden md:block absolute top-1/3 right-12 w-12 h-12 opacity-25" viewBox="0 0 64 64" fill="none" :style="`transform: translate3d(${mx*-5}px, ${my*5}px, 0)`">
                <rect x="20" y="10" width="24" height="44" rx="4" stroke="#11224E" stroke-width="1.8" fill="transparent"/>
                <rect x="24" y="16" width="16" height="28" rx="2" stroke="#11224E" stroke-width="1.2" fill="transparent"/>
                <circle cx="32" cy="48" r="1.6" fill="#11224E"/>
            </svg>

            <!-- Cloud with arrows -->
            <svg class="hidden md:block absolute bottom-28 right-1/3 w-16 h-12 opacity-25" viewBox="0 0 96 64" fill="none" :style="`transform: translate3d(${mx*7}px, ${my*-4}px, 0)`">
                <path d="M28 48h40a12 12 0 000-24h-2A18 18 0 1028 48z" stroke="#11224E" stroke-width="2" fill="transparent" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M48 30v14M42 36l6-6 6 6M48 34v-14M54 24l-6 6-6-6" stroke="#11224E" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <!-- Server stack -->
            <svg class="hidden md:block absolute top-10 left-10 w-18 h-18 opacity-20" viewBox="0 0 96 96" fill="none" :style="`transform: translate3d(${mx*4}px, ${my*3}px, 0)`">
                <rect x="16" y="18" width="64" height="14" rx="3" stroke="#11224E" stroke-width="1.8" fill="transparent"/>
                <rect x="16" y="41" width="64" height="14" rx="3" stroke="#11224E" stroke-width="1.8" fill="transparent"/>
                <rect x="16" y="64" width="64" height="14" rx="3" stroke="#11224E" stroke-width="1.8" fill="transparent"/>
                <circle cx="24" cy="25" r="2" fill="#11224E"/>
                <circle cx="24" cy="48" r="2" fill="#11224E"/>
                <circle cx="24" cy="71" r="2" fill="#11224E"/>
            </svg>

            <!-- Additional small tech icons -->
            <!-- Database cylinder -->
            <svg class="hidden md:block absolute bottom-16 left-1/4 w-10 h-10 opacity-20" viewBox="0 0 64 64" fill="none" :style="`transform: translate3d(${mx*3}px, ${my*-2}px, 0)`">
                <ellipse cx="32" cy="14" rx="16" ry="6" stroke="#11224E" stroke-width="1.4" fill="transparent"/>
                <path d="M16 14v24c0 3.3 7.2 6 16 6s16-2.7 16-6V14" stroke="#11224E" stroke-width="1.4" fill="transparent"/>
            </svg>

            <!-- Circuit board -->
            <svg class="hidden md:block absolute top-32 left-1/5 w-8 h-8 opacity-25" viewBox="0 0 48 48" fill="none" :style="`transform: translate3d(${mx*-2}px, ${my*3}px, 0)`">
                <rect x="10" y="10" width="28" height="28" rx="3" stroke="#11224E" stroke-width="1.4" fill="transparent"/>
                <circle cx="18" cy="18" r="2" fill="#11224E"/>
                <circle cx="30" cy="18" r="2" fill="#11224E"/>
                <circle cx="24" cy="30" r="2" fill="#11224E"/>
                <path d="M18 20v6l6 4 6-4v-6" stroke="#11224E" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <!-- Cloud sync -->
            <svg class="hidden md:block absolute bottom-32 left-1/3 w-9 h-9 opacity-20" viewBox="0 0 56 56" fill="none" :style="`transform: translate3d(${mx*4}px, ${my*1.5}px, 0)`">
                <path d="M18 38h18a8 8 0 000-16h-1.2A11 11 0 1020 38" stroke="#11224E" stroke-width="1.4" fill="transparent" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M26 24l4-4 4 4M34 32l-4 4-4-4" stroke="#11224E" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M30 20v6M30 32v6" stroke="#11224E" stroke-width="1.2" stroke-linecap="round"/>
            </svg>

            <!-- Data flow -->
            <svg class="hidden md:block absolute top-1/4 right-1/3 w-14 h-14 opacity-20" viewBox="0 0 96 96" fill="none" :style="`transform: translate3d(${mx*6}px, ${my*-6}px, 0)`">
                <rect x="20" y="20" width="56" height="36" rx="4" stroke="#11224E" stroke-width="1.6" fill="transparent"/>
                <path d="M28 32h24M28 44h40" stroke="#11224E" stroke-width="1.6" stroke-linecap="round"/>
                <path d="M48 68l10-10h-6v-8h-8v8h-6l10 10z" fill="#11224E" opacity="0.9"/>
            </svg>

            <!-- Code brackets -->
            <svg class="hidden md:block absolute top-44 right-1/5 w-7 h-7 opacity-25" viewBox="0 0 48 48" fill="none" :style="`transform: translate3d(${mx*-3}px, ${my*-2}px, 0)`">
                <path d="M18 14l-8 10 8 10M30 14l8 10-8 10" stroke="#11224E" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" fill="transparent"/>
                <path d="M22 12l-4 24" stroke="#11224E" stroke-width="1.2" stroke-linecap="round"/>
            </svg>

            <!-- Neural network -->
            <svg class="hidden md:block absolute bottom-20 right-16 w-12 h-12 opacity-25" viewBox="0 0 80 80" fill="none" :style="`transform: translate3d(${mx*-5}px, ${my*4}px, 0)`">
                <circle cx="20" cy="40" r="6" fill="#11224E"/>
                <circle cx="40" cy="20" r="6" fill="#11224E"/>
                <circle cx="60" cy="40" r="6" fill="#11224E"/>
                <circle cx="40" cy="60" r="6" fill="#11224E"/>
                <path d="M24 38l12-14M28 42l8 12M44 26l10 12M40 32v16M36 24l-10 12" stroke="#11224E" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" opacity="0.8"/>
            </svg>

            <!-- Globe -->
            <svg class="hidden md:block absolute top-24 left-1/2 w-10 h-10 opacity-20" viewBox="0 0 64 64" fill="none" :style="`transform: translate3d(${mx*-4}px, ${my*2}px, 0)`">
                <circle cx="32" cy="32" r="14" stroke="#11224E" stroke-width="1.4" fill="transparent"/>
                <path d="M18 32h28M32 18c6 6 6 22 0 28M32 18c-6 6-6 22 0 28" stroke="#11224E" stroke-width="1.2" stroke-linecap="round"/>
            </svg>

            <!-- AI chip -->
            <svg class="hidden md:block absolute bottom-24 left-10 w-10 h-10 opacity-20" viewBox="0 0 64 64" fill="none" :style="`transform: translate3d(${mx*2}px, ${my*2}px, 0)`">
                <rect x="20" y="20" width="24" height="24" rx="2" stroke="#11224E" stroke-width="1.4" fill="transparent"/>
                <path d="M32 8v8M32 48v8M8 32h8M48 32h8M16 16l6 6M48 16l-6 6M16 48l6-6M48 48l-6-6" stroke="#11224E" stroke-width="1.2" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Soft follower dot (hidden on mobile) -->
        <div class="hidden md:block pointer-events-none absolute w-3 h-3 rounded-full bg-[#11224E]/50 blur-[1px]" :style="`left:${mouseX}px; top:${mouseY}px; transform: translate(-50%,-50%); transition: left .08s linear, top .08s linear;`"></div>
        <div class="relative max-w-7xl mx-auto hero-grid">
            <div class="space-y-8 text-center lg:text-left">
                <div data-animate="fade-up">
                    <span class="hero-pill">Digital Transformation Studio</span>
                </div>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-[#11224E]" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 200)" data-hero-title>
                    <span class="transition-all duration-1000 inline-block" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                        Empowering<br>
                        <span class="text-clip">Digital Future</span>
                                </span>
                </h1>
                <p class="hero-description max-w-2xl mx-auto lg:mx-0"
                   x-data="{
                        words: ['web applications','mobile apps','UI/UX experiences','DevOps pipelines','data platforms','digital marketing'],
                        idx: 0,
                        word: 'web applications',
                        show: true,
                        next(){ this.show = false; setTimeout(()=>{ this.idx=(this.idx+1)%this.words.length; this.word=this.words[this.idx]; this.show = true; }, 400); }
                   }"
                   x-init="setInterval(()=>next(), 3800)">
                        We craft exceptional
                        <span class="highlight" x-cloak x-show="show" x-transition.opacity.duration.400 x-text="' ' + word"></span>
                    that drive your business forward with measurable outcomes.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start" data-animate="fade-up" data-delay="0.1">
                    <a href="#services" class="bg-[#11224E] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#088395] transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(17,34,78,0.25)] hover:shadow-[0_14px_30px_rgba(8,131,149,0.35)]">
                        Explore Services
                    </a>
                    <a href="#contact" class="bg-white text-[#11224E] px-8 py-3 rounded-lg font-semibold border-2 border-[#11224E] hover:bg-[#FFFDF6] transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(8,131,149,0.10)]">
                        Start a Project
                    </a>
                </div>
                <div class="hero-highlights justify-center lg:justify-start" data-animate="fade-up" data-delay="0.2">
                    <span class="hero-highlight">Full-stack pods</span>
                    <span class="hero-highlight">Design systems</span>
                    <span class="hero-highlight">Data & analytics</span>
                    <span class="hero-highlight">Growth loops</span>
                    </div>
                    </div>
            <div class="hero-visual" data-animate="slide-left">
                <div class="hero-visual-main">
                    <h3>Launch bold products without the busywork</h3>
                    <p class="mt-4">
                        We plug autonomous squads into your roadmap—handling discovery, build, QA, DevOps, and growth loops so your team can focus on strategy.
                    </p>
                    <div class="hero-metrics">
                        <div class="hero-metric">
                            <strong>6 Weeks</strong>
                            <span>Discovery to Beta</span>
                    </div>
                        <div class="hero-metric">
                            <strong>92%</strong>
                            <span>Client Retention</span>
                    </div>
                        <div class="hero-metric">
                            <strong>A+</strong>
                            <span>Quality Score</span>
                        </div>
                    </div>
                </div>
                <div class="hero-floating hero-floating--top" data-animate="fade-up" data-delay="0.2">
                    <small>Innovation Pod</small>
                    <strong>Sprint Labs</strong>
                    <span class="text-sm text-[#11224E]/70 leading-tight">Prototype a market-ready concept in under 10 days.</span>
                </div>
                <div class="hero-floating hero-floating--bottom" data-animate="fade-up" data-delay="0.3">
                    <small>Core Stack</small>
                    <strong>Laravel · React · Flutter</strong>
                    <span class="text-sm text-[#11224E]/70 leading-tight">Secured pipelines with CI/CD, analytics, and observability.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Metrics Strip -->
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 md:gap-8">
                <div class="text-center" data-animate="fade-up">
                    <div class="text-3xl md:text-4xl font-semibold text-[#11224E]">
                        <span data-count="50" data-suffix="+">0</span>
            </div>
                    <p class="text-xs uppercase tracking-[0.28em] text-[#11224E]/60 mt-2">Projects shipped</p>
                    </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.1">
                    <div class="text-3xl md:text-4xl font-semibold text-[#11224E]">
                        <span data-count="5" data-suffix="+">0</span>
                    </div>
                    <p class="text-xs uppercase tracking-[0.28em] text-[#11224E]/60 mt-2">Years in mission</p>
                    </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.2">
                    <div class="text-3xl md:text-4xl font-semibold text-[#11224E]">
                        <span data-count="20" data-suffix="+">0</span>
                    </div>
                    <p class="text-xs uppercase tracking-[0.28em] text-[#11224E]/60 mt-2">Active partners</p>
                    </div>
                <div class="text-center" data-animate="fade-up" data-delay="0.3">
                    <div class="text-3xl md:text-4xl font-semibold text-[#11224E]">
                        <span data-count="24" data-suffix="/7">0</span>
                    </div>
                    <p class="text-xs uppercase tracking-[0.28em] text-[#11224E]/60 mt-2">Support coverage</p>
            </div>
            </div>
        </div>
    </section>

    <!-- Tech Stack Marquee -->
    <section id="stacks" class="stack-marquee py-24">
        <div class="stack-marquee__overlay"></div>
        @php
            $stack = ['Web Development','React Apps','Laravel','Ecommerce','Mobile','DevOps','Brand','SEO','Data','AI','Automation','Product Design'];
            $lineOne = array_merge($stack, $stack);
            $offset = (int) ceil(count($stack) / 2);
            $lineTwoSeed = array_merge(array_slice($stack, $offset), array_slice($stack, 0, $offset));
            $lineTwo = array_merge($lineTwoSeed, $lineTwoSeed);
        @endphp
        <div class="stack-marquee__line stack-marquee__line--primary">
            @foreach ($lineOne as $item)
                <span>{{ $item }}</span>
            @endforeach
            </div>
        <div class="stack-marquee__line stack-marquee__line--secondary mt-6 md:mt-8">
            @foreach ($lineTwo as $item)
                <span>{{ $item }}</span>
            @endforeach
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill justify-center">Service Blueprint</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Build end-to-end experiences with <span class="text-clip">embedded teams</span>
                </h2>
                <p class="mt-3 text-base md:text-lg text-[#11224E]/80 max-w-3xl mx-auto">
                    We align strategy, design, engineering, and growth into one sprint rhythm so you can launch faster, scale reliably, and own the outcomes.
                </p>
            </div>

            <div class="space-y-10">
                <!-- Product Engineering -->
                <article class="service-panel p-6 md:p-8" data-animate="fade-up">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                        <div class="lg:col-span-5">
                            <div class="service-media h-60 md:h-64" data-animate="slide-right">
                                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1600&q=60" alt="Developers collaborating on product roadmap" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                        </div>
                    </div>
                        <div class="lg:col-span-7 space-y-5">
                            <div class="flex items-center gap-4">
                                <span class="service-icon">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7h18M3 12h10M3 17h6"/></svg>
                                </span>
                                <div>
                                    <p class="service-pill">Product Engineering</p>
                                    <h3 class="mt-2 text-2xl md:text-3xl font-semibold text-[#11224E]">High velocity software squads</h3>
                    </div>
                </div>
                            <p class="text-sm md:text-base text-[#11224E]/78 leading-relaxed">
                                Assemble a pod of architects, engineers, PMs, and QA who operate like an internal team. We craft scalable architectures, atomic design systems, and quality pipelines that de-risk every release.
                            </p>
                            <div class="service-highlights">
                                <div class="service-highlight">Composable tech stacks with Laravel, React, Flutter, and Lightning-fast APIs.</div>
                                <div class="service-highlight">Automated QA + observability baked into each sprint for continuous confidence.</div>
                                <div class="service-highlight">Migration playbooks to modernize legacy systems without downtime.</div>
                        </div>
                            <div class="service-meta">
                                <span>Launch <strong>3x Faster</strong></span>
                                <span>99.9% Uptime</span>
                                <span>Full DevOps</span>
                    </div>
                    </div>
                </div>
                </article>

                <!-- Experience & Brand -->
                <article class="service-panel p-6 md:p-8" data-animate="fade-up" data-delay="0.1">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                        <div class="lg:col-span-7 order-2 lg:order-1 space-y-5">
                            <div class="flex items-center gap-4">
                                <span class="service-icon">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 4h16v9H4z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 17h6M12 13v8"/></svg>
                                </span>
                                <div>
                                    <p class="service-pill">Experience & Brand</p>
                                    <h3 class="mt-2 text-2xl md:text-3xl font-semibold text-[#11224E]">Design that converts and retains</h3>
                        </div>
                    </div>
                            <p class="text-sm md:text-base text-[#11224E]/78 leading-relaxed">
                                Pair UX researchers, product designers, and brand storytellers to choreograph seamless journeys. We prototype rapidly, validate with users, and launch polished frontends that feel unmistakably you.
                            </p>
                            <div class="service-highlights">
                                <div class="service-highlight">Persona-driven flows and service blueprints aligned to business KPIs.</div>
                                <div class="service-highlight">Motion systems and micro-interactions crafted in Figma + Lottie.</div>
                                <div class="service-highlight">Accessible color systems, component libraries, and content voice guidelines.</div>
                    </div>
                            <div class="service-meta">
                                <span>UX Labs</span>
                                <span>Brand Systems</span>
                                <span>Conversion Lift +28%</span>
                </div>
            </div>
                        <div class="lg:col-span-5 order-1 lg:order-2">
                            <div class="service-media h-60 md:h-64" data-animate="slide-left">
                                <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?auto=format&fit=crop&w=1600&q=80" alt="Designers crafting interface prototypes" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                    </div>
                    </div>
                    </div>
                </article>
                
                <!-- Growth & Optimization -->
                <article class="service-panel p-6 md:p-8" data-animate="fade-up" data-delay="0.2">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                        <div class="lg:col-span-5">
                            <div class="service-media h-60 md:h-64" data-animate="slide-right">
                                <img src="https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?auto=format&fit=crop&w=1600&q=60" alt="Marketers reviewing analytics dashboard" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                        </div>
                    </div>
                        <div class="lg:col-span-7 space-y-5">
                            <div class="flex items-center gap-4">
                                <span class="service-icon">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 3v4c0 .552.448 1 1 1h4M19 21v-4c0-.552-.448-1-1-1h-4M4 9l4-4 4 4M20 15l-4 4-4-4"/></svg>
                                </span>
                                <div>
                                    <p class="service-pill">Growth & Optimization</p>
                                    <h3 class="mt-2 text-2xl md:text-3xl font-semibold text-[#11224E]">Full-funnel acquisition & retention</h3>
                    </div>
                </div>
                            <p class="text-sm md:text-base text-[#11224E]/78 leading-relaxed">
                                Blend SEO, content, lifecycle automation, and performance marketing under one playbook. We track every experiment, own campaign setup, and translate analytics into repeatable growth.
                            </p>
                            <div class="service-highlights">
                                <div class="service-highlight">Technical SEO audits, schema, and Core Web Vitals optimization.</div>
                                <div class="service-highlight">Lifecycle journeys across email, push, and in-product messaging.</div>
                                <div class="service-highlight">Revenue dashboards with Looker Studio + GA4 for actionable insights.</div>
                        </div>
                            <div class="service-meta">
                                <span>SEO Suites</span>
                                <span>Marketing Ops</span>
                                <span>Growth Sprints</span>
                    </div>
                    </div>
                </div>
                </article>
                        </div>
                    </div>
    </section>

    <!-- Our Story Section -->
    <section id="story" class="py-16 px-4 sm:px-6 lg:px-8 bg-[#FFFDF6]">
        <div class="story-wrapper max-w-5xl mx-auto">
            <div class="story-intro" data-animate="fade-up">
                <span class="service-pill w-fit mx-auto">Our Story</span>
                <h2 class="mt-4 text-2xl md:text-3xl font-bold text-[#11224E] leading-tight">
                    Building digital solutions with purpose
                </h2>
                    </div>

            <div class="story-timeline mt-8">
                <div class="story-item" data-animate="fade-up">
                    <div class="story-item__date">2019 – 2024</div>
                    <div class="story-item__title">Foundation Years</div>
                    <div class="story-item__text">
                        We spent years building real-world expertise in development, problem-solving, and digital product craftsmanship. These years shaped the foundation of our skills and our understanding of what businesses truly need from technology.
                </div>
            </div>

                <div class="story-item" data-animate="fade-up" data-delay="0.1">
                    <div class="story-item__date">January 2025</div>
                    <div class="story-item__title">The Vision</div>
                    <div class="story-item__text">
                        The idea of Techbuds was born — a vision to create simple, impactful, and human-centric digital solutions. A commitment to building technology that empowers, not complicates.
            </div>
        </div>

                <div class="story-item" data-animate="fade-up" data-delay="0.2">
                    <div class="story-item__date">June 2025</div>
                    <div class="story-item__title">Official Launch</div>
                    <div class="story-item__text">
                        Techbuds officially took form. We began with focused, meaningful projects — management systems, modern websites, single-page applications, optimization solutions, mobile apps, and AI-based improvements. Each project refined our craft and strengthened our mission.
                    </div>
            </div>
            
                <div class="story-item" data-animate="fade-up" data-delay="0.3">
                    <div class="story-item__date">Today</div>
                    <div class="story-item__title">Growing Forward</div>
                    <div class="story-item__text">
                        Techbuds stands as a growing digital solutions team dedicated to clean engineering, thoughtful design, and reliable delivery. We turn ideas into functional, scalable products — with integrity at the core of everything we build.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO Blogs Section -->
    <section id="blogs" class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill w-fit mx-auto">SEO Blogs</span>
                <h2 class="mt-4 text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    Intelligence from our Search & Growth trenches
                </h2>
                <p class="mt-4 text-base md:text-lg text-[#11224E]/80 max-w-3xl mx-auto">
                    Deep dives on technical SEO, growth experiments, and analytics frameworks we deploy for product-led brands shipping at speed.
                </p>
            </div>

            @if($blogs && $blogs->count() > 0)
            <div class="blog-lanes mb-10">
                @foreach($blogs as $index => $blog)
                    <article class="blog-lane-card" data-animate="fade-up" data-delay="{{ ($index % 3) * 0.08 }}">
                        <div class="blog-lane-card__media">
                            <img src="{{ $blog->featured_image ?? 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=1600&q=60' }}" alt="{{ $blog->title }}" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                            <span class="blog-time">{{ $blog->reading_time ?? '5 min' }} read</span>
                        </div>
                        <div class="blog-lane-card__body">
                            <span class="blog-pill">{{ $blog->category }}</span>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-title-link">
                                <h3 class="blog-title">{{ $blog->title }}</h3>
                            </a>
                            <p class="blog-excerpt">{{ $blog->excerpt }}</p>
                            @if($blog->signals && count($blog->signals) > 0)
                            <div class="blog-signals">
                                @foreach(array_slice($blog->signals, 0, 2) as $signal)
                                    <span class="blog-signal">{{ $signal }}</span>
                                @endforeach
                            </div>
                            @endif
                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-action">
                                Read article
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h14"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="text-center" data-animate="fade-up" data-delay="0.2">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 bg-[#11224E] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#088395] transition-all transform hover:scale-105 shadow-[0_10px_25px_rgba(17,34,78,0.25)] hover:shadow-[0_14px_30px_rgba(8,131,149,0.35)]">
                    View All Blogs
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h14"></path>
                    </svg>
                </a>
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-[#11224E]/60">No blog posts available yet. Check back soon!</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Testimonials & Reviews -->
    <section id="testimonials" class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12" data-animate="fade-up">
                <span class="service-pill">Client Feedback</span>
                <h2 class="mt-5 text-3xl md:text-4xl font-bold text-[#11224E] leading-tight">
                    What Our Clients <span class="text-clip">Say</span>
                </h2>
                <p class="mt-4 text-base text-[#11224E]/70 max-w-2xl mx-auto">
                    Real feedback from businesses we've worked with
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @php
                    $testimonials = [
                        ['quote' => 'Techbuds helped us build a scalable e-commerce platform that handles our growing traffic seamlessly. Their team was professional, responsive, and delivered on time.', 'name' => 'Aadhya Raman', 'role' => 'Chief Product Officer', 'company' => 'Finverge', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=400&q=60'],
                        ['quote' => 'Working with Techbuds has been a great experience. They understood our requirements quickly and built exactly what we needed. Highly recommend their services.', 'name' => 'Mohammed Idris', 'role' => 'Growth Lead', 'company' => 'Shopora', 'avatar' => 'https://images.unsplash.com/photo-1511367461989-f85a21fda167?auto=format&fit=crop&w=400&q=60'],
                        ['quote' => 'From concept to launch, Techbuds guided us through every step. The final product exceeded our expectations and our users love it.', 'name' => 'Olivia Martins', 'role' => 'Founder', 'company' => 'HealthSync', 'avatar' => 'https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=400&q=60'],
                        ['quote' => 'Their technical expertise and attention to detail made all the difference. We\'re very satisfied with the quality of work and ongoing support.', 'name' => 'Rahul Menon', 'role' => 'VP Engineering', 'company' => 'DataForge', 'avatar' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=400&q=60'],
                    ];
                @endphp

                @foreach($testimonials as $index => $testimonial)
                <article class="testimonial-card" data-animate="fade-up" data-delay="{{ ($index % 2) * 0.1 }}">
                    <p class="testimonial-quote">"{{ $testimonial['quote'] }}"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">
                            <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                        </div>
                        <div class="testimonial-info">
                            <h4>{{ $testimonial['name'] }}</h4>
                            <p>{{ $testimonial['role'] }} · {{ $testimonial['company'] }}</p>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact/CTA Section -->
    <section id="contact" class="py-14 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-[#088395] to-[#37B7C3] text-white relative overflow-hidden">
        <div class="absolute inset-0" style="background: radial-gradient(circle at top left, rgba(255,255,255,0.12), transparent 45%); pointer-events: none;"></div>
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10 items-start relative z-10">
            <div class="space-y-5" data-animate="fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-white/10 text-white text-xs font-semibold uppercase tracking-widest">Contact</span>
                <h2 class="text-3xl font-bold leading-tight">Let's shape your next release.</h2>
                <p class="text-sm md:text-base text-white/80">
                    Tell us about the product you're dreaming up. We'll assemble a dedicated squad, share a roadmap, and launch a discovery sprint within days.
                </p>
                <div class="grid grid-cols-1 gap-4 text-sm text-white/80">
                    <div class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-[#11224E]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16.72 11.06a2 2 0 010 2.83l-1.13 1.13a2 2 0 01-2.83 0l-6.08-6.08a2 2 0 010-2.83l1.13-1.13a2 2 0 012.83 0l.7.7m1.41 1.41l3.54 3.54"/>
                            </svg>
                        </span>
                        <span>Call us: <a href="tel:+917092936243" class="font-semibold text-white hover:underline">7092936243</a></span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-[#11224E]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14v7m0-19v2"/>
                            </svg>
                        </span>
                        <span>HQ: Bangalore.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-[#11224E]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l9 6 9-6"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 8v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8"/>
                            </svg>
                        </span>
                        <span>Email: <a href="mailto:techbuds57@gmail.com" class="font-semibold text-white hover:underline">techbuds57@gmail.com</a></span>
                    </div>
                </div>
            </div>
            <div class="bg-white text-[#11224E] rounded-2xl shadow-xl p-6 md:p-8 border border-white/10" data-animate="slide-up" x-data="{ submitting: false }">
                <h3 class="text-xl font-semibold mb-4">Project kickoff form</h3>
                
                @if(session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-50 border border-green-200" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-green-600 hover:text-green-800">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-4 p-4 rounded-lg bg-red-50 border border-red-200" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-red-600 hover:text-red-800">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4 contact-form" @submit="submitting = true">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="flex flex-col gap-1.5 text-xs font-medium text-[#11224E] uppercase tracking-[0.25em]">
                            Full name
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Jane Doe" class="w-full rounded-lg border {{ $errors->has('name') ? 'border-red-300' : 'border-[#11224E]/20' }} bg-white px-3 py-2 text-sm text-[#11224E] focus:border-[#11224E] focus:ring-2 focus:ring-[#088395]/20 transition">
                            @error('name')
                                <span class="text-xs text-red-600 mt-0.5">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="flex flex-col gap-1.5 text-xs font-medium text-[#11224E] uppercase tracking-[0.25em]">
                            Work email
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="you@company.com" class="w-full rounded-lg border {{ $errors->has('email') ? 'border-red-300' : 'border-[#11224E]/20' }} bg-white px-3 py-2 text-sm text-[#11224E] focus:border-[#11224E] focus:ring-2 focus:ring-[#088395]/20 transition">
                            @error('email')
                                <span class="text-xs text-red-600 mt-0.5">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="flex flex-col gap-1.5 text-xs font-medium text-[#11224E] uppercase tracking-[0.25em]">
                            Phone
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full rounded-lg border {{ $errors->has('phone') ? 'border-red-300' : 'border-[#11224E]/20' }} bg-white px-3 py-2 text-sm text-[#11224E] focus:border-[#11224E] focus:ring-2 focus:ring-[#088395]/20 transition">
                            @error('phone')
                                <span class="text-xs text-red-600 mt-0.5">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="flex flex-col gap-1.5 text-xs font-medium text-[#11224E] uppercase tracking-[0.25em]">
                            Project type
                            <select name="project_type" class="w-full rounded-lg border {{ $errors->has('project_type') ? 'border-red-300' : 'border-[#11224E]/20' }} bg-white px-3 py-2 text-sm text-[#11224E] focus:border-[#11224E] focus:ring-2 focus:ring-[#088395]/20 transition">
                                <option value="">Select project type</option>
                                <option value="Custom Web App" {{ old('project_type') == 'Custom Web App' ? 'selected' : '' }}>Custom Web App</option>
                                <option value="Mobile App" {{ old('project_type') == 'Mobile App' ? 'selected' : '' }}>Mobile App</option>
                                <option value="UI/UX Redesign" {{ old('project_type') == 'UI/UX Redesign' ? 'selected' : '' }}>UI/UX Redesign</option>
                                <option value="DevOps & Infrastructure" {{ old('project_type') == 'DevOps & Infrastructure' ? 'selected' : '' }}>DevOps & Infrastructure</option>
                                <option value="SEO & Growth" {{ old('project_type') == 'SEO & Growth' ? 'selected' : '' }}>SEO & Growth</option>
                                <option value="Other" {{ old('project_type') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('project_type')
                                <span class="text-xs text-red-600 mt-0.5">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <label class="flex flex-col gap-1.5 text-xs font-medium text-[#11224E] uppercase tracking-[0.25em]">
                        Tell us about your goals
                        <textarea name="message" rows="3" placeholder="Launch timeline, desired outcomes, existing challenges..." class="w-full rounded-lg border {{ $errors->has('message') ? 'border-red-300' : 'border-[#11224E]/20' }} bg-white px-3 py-2 text-sm text-[#11224E] focus:border-[#11224E] focus:ring-2 focus:ring-[#088395]/20 transition">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-xs text-red-600 mt-0.5">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <label class="inline-flex items-center gap-2 text-xs text-[#11224E]/70">
                            <input type="checkbox" name="nda" value="1" {{ old('nda') ? 'checked' : '' }} class="rounded border-[#11224E]/30 text-[#11224E] focus:ring-[#11224E]/40">
                            I'd like to sign a mutual NDA
                        </label>
                        <button type="submit" :disabled="submitting" class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#11224E] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#088395] transition-all transform hover:-translate-y-0.5 shadow-lg shadow-[#11224E]/30 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                            <span x-show="!submitting">Start discovery call</span>
                            <span x-show="submitting" class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Sending...
                            </span>
                            <svg x-show="!submitting" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h14"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#176B87] text-gray-300 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="text-center md:text-left">
                    <img src="{{ asset('images/techbuds!.png') }}" alt="Techbuds Logo" class="h-10 w-auto mx-auto md:mx-0 mb-4 brightness-0 invert">
                    <p class="text-gray-400">Design Develop Deliver</p>
                </div>
                <div class="text-center md:text-left">
                    <h4 class="text-white font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#services" class="hover:text-white transition-colors">Web Development</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">Mobile Apps</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">UI/UX Design</a></li>
                        <li><a href="#services" class="hover:text-white transition-colors">DevOps & Growth</a></li>
                    </ul>
                </div>
                <div class="text-center md:text-left">
                    <h4 class="text-white font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email: techbuds57@gmail.com</li>
                        <li>Phone: <a href="tel:+917092936243" class="hover:text-white transition-colors">7092936243</a></li>
                        <li><a href="/api/login" class="hover:text-white transition-colors">Admin Portal</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Techbuds. All rights reserved.</p>
                </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
    <script>
        window.addEventListener('load', () => {
            if (!window.gsap || !window.ScrollTrigger) {
                return;
            }

            gsap.registerPlugin(ScrollTrigger);

            const animationMap = {
                'fade-up': { y: 40 },
                'fade-in': {},
                'slide-up': { y: 60 },
                'slide-right': { x: -60 },
                'slide-left': { x: 60 },
                'stagger': { scale: 0.95 }
            };

            Object.entries(animationMap).forEach(([key, config]) => {
                gsap.utils.toArray(`[data-animate="${key}"]`).forEach((el) => {
                    const delay = parseFloat(el.dataset.delay || '0');
                    gsap.from(el, {
                        duration: 1.1,
                        opacity: config.opacity ?? 0,
                        ease: 'power3.out',
                        delay,
                        ...config,
                        scrollTrigger: {
                            trigger: el,
                            start: 'top 85%',
                            once: true
                        }
                    });
                });
            });

            const counters = gsap.utils.toArray('[data-count]');
            counters.forEach((counter) => {
                const target = parseFloat(counter.dataset.count || '0');
                const suffix = counter.dataset.suffix || '';
                const prefix = counter.dataset.prefix || '';
                const data = { value: 0 };

                counter.textContent = `${prefix}0${suffix}`;

                gsap.to(data, {
                    value: target,
                    duration: 1.6,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: counter,
                        start: 'top 85%',
                        once: true
                    },
                    onUpdate: () => {
                        const current = Math.floor(data.value);
                        counter.textContent = `${prefix}${current}${suffix}`;
                    }
                });
            });

            const heroTitle = document.querySelector('[data-hero-title]');
            if (heroTitle) {
                gsap.from(heroTitle, {
                    opacity: 0,
                    y: 60,
                    duration: 1.2,
                    ease: 'power3.out',
                    delay: 0.2
                });

                const clipped = heroTitle.querySelector('.text-clip');
                if (clipped) {
                    gsap.to(clipped, {
                        backgroundPosition: '200% 50%',
                        duration: 8,
                        ease: 'sine.inOut',
                        repeat: -1,
                        yoyo: true
                    });
                }
            }
        });
    </script>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll to contact section on form submission success/error
        @if(session('success') || session('error') || $errors->any())
            window.addEventListener('load', () => {
                const contactSection = document.querySelector('#contact');
                if (contactSection) {
                    setTimeout(() => {
                        contactSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 100);
                }
            });
        @endif
    </script>
    </body>
</html>
