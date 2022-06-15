<?php

namespace Fusionpwn\LaravelDatabaseRoutes\ServiceProviders;

use Fusionpwn\LaravelDatabaseRoutes\Contracts;
use Fusionpwn\LaravelDatabaseRoutes\RouteManager\CacheRouteManagerProxy;
use Fusionpwn\LaravelDatabaseRoutes\Routes\NullRoute;
use Fusionpwn\LaravelDatabaseRoutes\Routes\Route;
use Fusionpwn\LaravelDatabaseRoutes\RouteManager\DbRouteManagerProxy;

class DbServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->nullRoute();
        app()->bind(Contracts\RouteManager::class, function() {
            return new CacheRouteManagerProxy(new DbRouteManagerProxy());
        });
    }
}
