<?php

namespace Fusionpwn\LaravelDatabaseRoutes\ServiceProviders;

use Fusionpwn\LaravelDatabaseRoutes\Contracts;
use Fusionpwn\LaravelDatabaseRoutes\RouteManager\CacheRouteManagerProxy;
use Fusionpwn\LaravelDatabaseRoutes\Routes\NullRoute;
use Fusionpwn\LaravelDatabaseRoutes\Routes\Route;
use Fusionpwn\LaravelDatabaseRoutes\RouteManager\DbRouteManagerProxy;

abstract class BaseServiceProvider extends \Illuminate\Support\ServiceProvider
{
	public function boot()
	{
		$this->loadMigrationsFrom(__DIR__ .
			'resources/database/migrations');
	}

    protected function nullRoute() : void
    {
        Route::$NULL = NullRoute::invoke();
    }
}
