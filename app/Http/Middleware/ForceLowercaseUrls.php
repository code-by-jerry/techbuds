<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Force URLs to be lowercase for SEO consistency
 * Redirects uppercase URLs to lowercase versions
 */
class ForceLowercaseUrls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the path from the request
        $path = $request->path();
        
        // Only process if path contains uppercase letters
        if ($path !== strtolower($path)) {
            // Get the query string if it exists
            $query = $request->getQueryString();
            
            // Build the lowercase URL
            $url = strtolower($path);
            
            // Add query string if it exists
            if ($query) {
                $url .= '?' . $query;
            }
            
            // Redirect to lowercase URL with 301 (permanent redirect)
            return redirect($url, 301);
        }
        
        return $next($request);
    }
}

