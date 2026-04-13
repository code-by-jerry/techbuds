<?php

namespace App\Providers;

use App\Events\ClientStatusChanged;
use App\Events\InvoiceSent;
use App\Events\PaymentReceived;
use App\Events\ProjectStatusChanged;
use App\Events\TaskAssigned;
use App\Listeners\SendClientStatusNotification;
use App\Listeners\SendInvoiceNotification;
use App\Listeners\SendPaymentNotification;
use App\Listeners\SendProjectStatusNotification;
use App\Listeners\SendTaskAssignmentNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        Event::listen(ClientStatusChanged::class, SendClientStatusNotification::class);
        Event::listen(ProjectStatusChanged::class, SendProjectStatusNotification::class);
        Event::listen(InvoiceSent::class, SendInvoiceNotification::class);
        Event::listen(PaymentReceived::class, SendPaymentNotification::class);
        Event::listen(TaskAssigned::class, SendTaskAssignmentNotification::class);
    }
}
