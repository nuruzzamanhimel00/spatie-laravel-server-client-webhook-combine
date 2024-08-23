<?php

namespace App\Jobs;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class ProductWebhookJob extends  ProcessWebhookJob
{



    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('############Product ###############');
        logger($this->webhookCall);
    }
}
