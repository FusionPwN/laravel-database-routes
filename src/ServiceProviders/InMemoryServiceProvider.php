<?php

namespace Fusionpwn\LaravelDatabaseRoutes\ServiceProviders;

use Fusionpwn\LaravelDatabaseRoutes\Contracts;
use Fusionpwn\LaravelDatabaseRoutes\NullRoute;
use Fusionpwn\LaravelDatabaseRoutes\Routes\Route;
use Fusionpwn\LaravelDatabaseRoutes\RouteManager\RouteManager;

class InMemoryServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->nullRoute();
        app()->bind(Contracts\RouteManager::class, RouteManager::class);
    }
}
