<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        UiCommand::macro('nextjs', function (UiCommand $command) {
            // Scaffold your frontend...
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
