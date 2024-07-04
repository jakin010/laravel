<?php

namespace App\Jobs;

use App\Models\Beschikking;
use App\Models\Bewoner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RenewBeschikking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $now = date('Y-m-d H:i:s');
        $yearForward = date_create()->modify('+1 Year')->format('Y-m-d H:i:s');
        $bewoners = Bewoner::query()
            ->where('wmo_vernieuw', '=', true)
            ->whereRelation('beschikking', 'end_date', '<=', $now)
            ->get();

        foreach ($bewoners as $bewoner) {
            $newBeschikking = Beschikking::query()->create([
                'start_date' => $now,
                'end_date' => $yearForward,
                'maximaal_kilometer' => 200
            ]);
            $bewoner->beschikking_id = $newBeschikking->id;
            $bewoner->save();
        }
    }
}
