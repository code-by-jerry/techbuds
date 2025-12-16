<?php

namespace App\Console\Commands;

use App\Services\ProjectAutomationService;
use Illuminate\Console\Command;

class RunAutomation extends Command
{
    protected $signature = 'automation:run';

    protected $description = 'Run scheduled status change automations';

    public function handle(ProjectAutomationService $automation): int
    {
        $results = $automation->run();

        foreach ($results as $key => $value) {
            $this->info(sprintf('%s: %d', ucfirst(str_replace('_', ' ', $key)), $value));
        }

        return Command::SUCCESS;
    }
}

