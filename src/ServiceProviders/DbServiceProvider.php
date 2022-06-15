<?php

namespace Fusionpwn\ServiceProviders;

use Fusionpwn\Contracts;
use Fusionpwn\RouteManager\CacheRouteManagerProxy;
use Fusionpwn\Routes\NullRoute;
use Fusionpwn\Routes\Route;
use Fusionpwn\RouteManager\DbRouteManagerProxy;

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
