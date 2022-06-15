<?php

namespace Fusionpwn\ServiceProviders;

use Konekt\Concord\BaseModuleServiceProvider;
use Fusionpwn\Contracts;
use Fusionpwn\RouteManager\CacheRouteManagerProxy;
use Fusionpwn\Routes\NullRoute;
use Fusionpwn\Routes\Route;
use Fusionpwn\RouteManager\DbRouteManagerProxy;

abstract class BaseServiceProvider extends BaseModuleServiceProvider
{
	/* public function boot()
	{
		$this->loadMigrationsFrom(__DIR__ .
			'resources/database/migrations');
	} */

    protected function nullRoute() : void
    {
        Route::$NULL = NullRoute::invoke();
    }
}
