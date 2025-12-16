<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(string $slug)
    {
        $services = array_keys(config('service_pages', []));

        if (!in_array($slug, $services, true)) {
            abort(404);
        }

        return view("services.{$slug}", compact('slug'));
    }

    public function location(string $service, string $location)
    {
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

