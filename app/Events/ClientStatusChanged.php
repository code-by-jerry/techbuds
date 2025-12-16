<?php

namespace App\Events;

use App\Models\Client;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientStatusChanged
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Client $client,
        public string $oldStatus,
        public string $newStatus
    ) {
        //
    }
}

