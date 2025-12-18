@extends('layouts.app')

@section('content')
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-app-background">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-10" data-animate="fade-up">
            <span class="service-pill w-fit mx-auto">Locations</span>
            <h1 class="mt-4 text-3xl md:text-4xl lg:text-5xl font-heading font-semibold text-heading leading-tight">
                Countries we serve with remote Techbuds teams
            </h1>
            <p class="mt-4 text-base md:text-lg text-text-secondary max-w-3xl mx-auto">
                We deliver web, mobile, data, DevOps, SEO, UI/UX, AI and custom IT projects remotely from India to high-growth markets worldwide.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($locations as $slug => $location)
                <article class="service-card" data-animate="fade-up">
                    <h2 class="text-xl font-semibold text-heading mb-2">
                        {{ $location['name'] }}
                    </h2>
                    <p class="text-sm text-text-secondary mb-4">
                        Remote delivery • Timezone: {{ $location['timezone'] ?? 'N/A' }}
                    </p>
                    <ul class="list-none space-y-1 text-sm text-text-secondary">
                        @foreach($services as $serviceSlug => $service)
                            <li>
                                <a href="{{ route('services.location', ['service' => $serviceSlug, 'location' => $slug]) }}"
                                   class="inline-flex items-center gap-1 text-brand-primary hover:text-brand-hover transition-colors">
                                    <span>{{ $service['serviceType'] }}</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 5l7 7-7 7M5 12h15"></path>
                                    </svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>

@push('styles')
<style>
    .service-card {
        position: relative;
        border-radius: 1.5rem;
        overflow: hidden;
        background: var(--surface);
        border: 1px solid var(--border-default);
        box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
        transition: transform .45s ease, box-shadow .45s ease, border-color .45s ease;
        padding: 1.75rem;
    }
    .service-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 60px rgba(37, 99, 235, 0.12);
        border-color: var(--brand-primary);
    }
    .service-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.45rem 1.1rem;
        border-radius: 999px;
        background: rgba(37, 99, 235, 0.1);
        color: var(--text-primary);
        font-size: 0.65rem;
        letter-spacing: 0.28em;
        text-transform: uppercase;
        font-weight: 600;
    }
</style>
@endpush
@endsection
