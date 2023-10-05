<?php

namespace App\Providers;
use App\Models\SiteSetting;
use App\Models\Domain;
use App\Models\Estimate;
use Illuminate\Support\ServiceProvider;

class GlobalVariableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $siteSettings = SiteSetting::all();
        $domainlinks = Domain::all();
        $estimates = Estimate::all();
        config([
            'siteSettings' => $siteSettings,
            'domainlinks' => $domainlinks,
            'estimates' => $estimates
        ]);
    }
}
