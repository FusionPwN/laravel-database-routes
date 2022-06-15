<?php

namespace Fusionpwn\ServiceProviders;

use Fusionpwn\Contracts;
use Fusionpwn\RouteManager\CacheRouteManagerProxy;
use Fusionpwn\Routes\NullRoute;
use Fusionpwn\Routes\Route;
use Fusionpwn\RouteManager\DbRouteManagerProxy;

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
