<?php

namespace Messerli90\FirstPromoter;

use Illuminate\Support\ServiceProvider;

/**
 * Class FirstPromoterServiceProvider
 *
 * @package \Messerli90\FirstPromoter
 */
class FirstPromoterServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('first_promoter', function () {
            return new FirstPromoter(config('services.first_promoter.key'));
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [FirstPromoter::class];
    }
}