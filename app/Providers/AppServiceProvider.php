<?php

namespace App\Providers;

use App\Models\Url;
use Hidehalo\Nanoid\Client as NanoidClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NanoidClient::class, function (Application $app) {
            return new NanoidClient(Url::UID_LENGTH);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
