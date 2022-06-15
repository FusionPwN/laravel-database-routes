<?php

namespace Fusionpwn\Facades;

use Fusionpwn\Contracts;
use Illuminate\Support\Facades\Facade;

class RouteManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contracts\RouteManager::class;
    }
}
