<?php

namespace Douma\Routes\ServiceProviders;

use Douma\Routes\Contracts;
use Douma\Routes\NullRoute;
use Douma\Routes\Route;
use Douma\Routes\RouteManager\RouteManager;

class InMemoryServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->nullRoute();
        $this->migrations();
        app()->bind(Contracts\RouteManager::class, RouteManager::class);
    }
}
