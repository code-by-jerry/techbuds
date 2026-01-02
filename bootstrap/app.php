<?php

use App\Console\Commands\RunAutomation;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withSchedule(function (Schedule $schedule): void {
        $schedule->command('automation:run')->dailyAt('01:00');
        // Regenerate sitemap daily at 2 AM
        $schedule->command('sitemap:generate')->dailyAt('02:00');
    })
    ->withCommands([
        RunAutomation::class,
        \App\Console\Commands\GenerateSitemap::class,
    ])
    ->withMiddleware(function (Middleware $middleware): void {
        // Force lowercase URLs for SEO consistency
        $middleware->web(append: [
            \App\Http\Middleware\ForceLowercaseUrls::class,
        ]);
        // HTTP caching headers for performance
        $middleware->web(append: [
            \App\Http\Middleware\CacheHeaders::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
