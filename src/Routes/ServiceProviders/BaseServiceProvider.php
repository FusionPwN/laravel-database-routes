<?php

namespace Douma\Routes\ServiceProviders;

use Douma\Routes\Contracts;
use Douma\Routes\RouteManager\CacheRouteManagerProxy;
use Douma\Routes\Routes\NullRoute;
use Douma\Routes\Routes\Route;
use Douma\Routes\RouteManager\DbRouteManagerProxy;

abstract class BaseServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected function nullRoute() : void
    {
        Route::$NULL = NullRoute::invoke();
    }

    protected function migrations() : void
    {
        $this->loadMigrationsFrom(__DIR__ . "/../migrations");
    }
}
