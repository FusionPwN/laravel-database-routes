<?php

namespace Fusionpwn\LaravelDatabaseRoutes\Facades;

use Fusionpwn\LaravelDatabaseRoutes\Contracts;
use Illuminate\Support\Facades\Facade;

class RouteManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contracts\RouteManager::class;
    }
}
