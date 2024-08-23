<?php

namespace App\Jobs;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class PostWebhookJob extends  ProcessWebhookJob
{



    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('################# POST ##################');
        logger($this->webhookCall);
    }
}
