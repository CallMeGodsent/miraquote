<?php

namespace YourVendor\Quotes;

use Illuminate\Support\ServiceProvider;

class QuotesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Quotes::class, function ($app) {
            return new Quotes(config('quotes.api_key'));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/quotes.php' => config_path('quotes.php'),
        ]);
    }
}
