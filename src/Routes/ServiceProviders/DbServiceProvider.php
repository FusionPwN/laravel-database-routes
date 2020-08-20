<?php

namespace Douma\Routes\ServiceProviders;

use Douma\Routes\Contracts;
use Douma\Routes\RouteManager\CacheRouteManagerProxy;
use Douma\Routes\Routes\NullRoute;
use Douma\Routes\Routes\Route;
use Douma\Routes\RouteManager\DbRouteManagerProxy;

class DbServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->nullRoute();
        $this->migrations();
        app()->bind(Contracts\RouteManager::class, function() {
            return new CacheRouteManagerProxy(new DbRouteManagerProxy());
        });
    }
}
