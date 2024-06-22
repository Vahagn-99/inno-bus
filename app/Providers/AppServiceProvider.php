<?php

namespace App\Providers;

use App\Services\Location\SyncFromGPSMicroControllerService;
use App\Services\Location\SyncServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SyncServiceInterface::class, SyncFromGPSMicroControllerService::class);
    }

}
