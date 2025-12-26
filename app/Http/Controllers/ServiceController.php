<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(string $slug)
    {
        // Log every request to see what's being passed
        \Log::info('ServiceController::show called', [
            'slug' => $slug,
            'slug_type' => gettype($slug),
            'slug_length' => strlen($slug)
        ]);
        
        $services = array_keys(config('service_pages', []));
        
        \Log::info('ServiceController::show - Available services', [
            'services' => $services,
            'slug_in_array' => in_array($slug, $services, true)
        ]);

        if (!in_array($slug, $services, true)) {
            \Log::error('ServiceController::show - Slug not found', [
                'slug' => $slug,
                'available_services' => $services
            ]);
            abort(404);
        }

        $viewPath = "services.{$slug}";
        if (!view()->exists($viewPath)) {
            \Log::error('ServiceController::show - View not found', [
                'slug' => $slug,
                'view_path' => $viewPath
            ]);
            abort(404);
        }

        return view($viewPath, compact('slug'));
    }

    public function location(string $service, string $location)
    {
        // Safety check: If this route is hit with a single-segment URL, it's a mistake
        // The location should be a short location name, not a long service slug
        // If location is too long or looks like a service slug, redirect to show method
        $pathSegments = explode('/', trim(request()->path(), '/'));
        if (count($pathSegments) !== 3 || $pathSegments[0] !== 'services') {
            // This shouldn't happen, but if it does, try the show method instead
            \Log::warning('ServiceController::location - Invalid path structure', [
                'path' => request()->path(),
                'segments' => $pathSegments,
                'service' => $service,
                'location' => $location
            ]);
            // Try to handle as a single service slug
            return $this->show($service);
        }
        
        $serviceConfig = config("service_pages.$service");
        $locationConfig = config("locations.$location");

        if (!$serviceConfig || !$locationConfig) {
            abort(404);
        }

        $noindex = !($locationConfig['seo_index'] ?? false);

        return view('services.remote-location', [
            'serviceKey' => $service,
            'service' => $serviceConfig,
            'location' => $locationConfig,
            'locationSlug' => $location,
            'noindex' => $noindex,
        ]);
    }
}

