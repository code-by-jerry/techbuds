<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Generate optimized image attributes for lazy loading and performance
     *
     * @param string $src Image source URL
     * @param string $alt Alt text
     * @param int|null $width Image width
     * @param int|null $height Image height
     * @param bool $lazy Whether to lazy load (default: true)
     * @param string $loading Loading strategy ('lazy' or 'eager')
     * @return array Array of attributes
     */
    public static function attributes(
        string $src,
        string $alt = '',
        ?int $width = null,
        ?int $height = null,
        bool $lazy = true,
        string $loading = 'lazy'
    ): array {
        $attributes = [
            'src' => $src,
            'alt' => $alt,
            'loading' => $lazy ? $loading : 'eager',
            'decoding' => 'async',
            'fetchpriority' => $lazy ? 'low' : 'high',
        ];

        // Add width/height to prevent layout shift
        if ($width) {
            $attributes['width'] = $width;
        }
        if ($height) {
            $attributes['height'] = $height;
        }

        // Add referrerpolicy for external images
        if (str_starts_with($src, 'http')) {
            $attributes['referrerpolicy'] = 'no-referrer-when-downgrade';
        }

        return $attributes;
    }

    /**
     * Generate responsive image srcset for different screen sizes
     *
     * @param string $baseUrl Base image URL
     * @param array $sizes Array of sizes ['w' => width, 'h' => height]
     * @return string Srcset string
     */
    public static function srcset(string $baseUrl, array $sizes): string
    {
        $srcset = [];
        foreach ($sizes as $size) {
            $width = $size['w'] ?? $size['width'] ?? null;
            if ($width) {
                // For Unsplash, add w parameter
                $url = str_contains($baseUrl, 'unsplash.com') 
                    ? $baseUrl . (str_contains($baseUrl, '?') ? '&' : '?') . "w={$width}&q=80"
                    : $baseUrl;
                $srcset[] = "{$url} {$width}w";
            }
        }
        return implode(', ', $srcset);
    }

    /**
     * Generate sizes attribute for responsive images
     *
     * @param array $breakpoints Breakpoints and their sizes
     * @return string Sizes attribute
     */
    public static function sizes(array $breakpoints): string
    {
        $sizes = [];
        foreach ($breakpoints as $breakpoint => $size) {
            $sizes[] = "(max-width: {$breakpoint}px) {$size}";
        }
        $sizes[] = '100vw'; // Default size
        return implode(', ', $sizes);
    }
}

