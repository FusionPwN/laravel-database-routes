<?php

namespace Fusionpwn\ServiceProviders;

use Fusionpwn\Contracts;
use Fusionpwn\NullRoute;
use Fusionpwn\Routes\Route;
use Fusionpwn\RouteManager\RouteManager;

class InMemoryServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->nullRoute();
        app()->bind(Contracts\RouteManager::class, RouteManager::class);
    }
}
