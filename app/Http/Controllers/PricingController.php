<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricingData = config('pricing', []);
        $services = array_keys($pricingData);
        $defaultService = $services[0] ?? 'web-development';
        
        return view('pricing.index', compact('pricingData', 'services', 'defaultService'));
    }

    public function show(string $slug)
    {
        $pricingData = config('pricing', []);
        
        if (!isset($pricingData[$slug])) {
            abort(404);
        }

        $servicePricing = $pricingData[$slug];
        $serviceConfig = config("service_pages.{$slug}", []);
        
        return view('pricing.show', compact('servicePricing', 'serviceConfig', 'slug'));
    }
}

