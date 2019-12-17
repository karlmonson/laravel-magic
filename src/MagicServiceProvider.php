<?php

namespace KarlMonson\Magic;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class MagicServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
	    $this->loadMigrationsFrom(__DIR__.'/database/migrations');

	    $this->loadRoutesFrom(__DIR__.'/routes/web.php');

	    Auth::provider('magic', function ($app, array $config) {
            return new MagicUserProvider($config['model']);
        });
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
        	__DIR__.'/config/auth.php', 'auth'
    	);

		$this->app->singleton('auth.magic', function ($app) {
            return new MagicBrokerManager($app);
        });

        $this->app->bind('auth.magic.broker', function ($app) {
            return $app->make('auth.magic')->broker();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['auth.magic', 'auth.magic.broker'];
	}
}
