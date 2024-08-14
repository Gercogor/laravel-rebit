<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogApplicationJob implements ShouldQueue
{
    use Queueable;

    protected $application;
    /**
     * Create a new job instance.
     */

    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $application = $this->application;
        $data = [
            'id' => $application->id,
            'text' => $application->text,
            'ip_address' => $application->ip_address,
            'contact' => [
                'id' => $application->contact->id,
                'first_name' => $application->contact->first_name,
                'last_name' => $application->contact->last_name,
                'middle_name' => $application->contact->middle_name,
            ],
            'created_at' => $application->created_at,
            'updated_at' => $application->updated_at,
        ];
        Log::info(json_encode($data));
    }
}
