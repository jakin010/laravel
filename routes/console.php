<?php

use App\Jobs\RenewBeschikking;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::job(new RenewBeschikking)->daily()->appendOutputTo(storage_path('logs/inspire.log'));
