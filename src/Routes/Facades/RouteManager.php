<?php

namespace Douma\Routes\Facades;

use Douma\Routes\Contracts;
use Illuminate\Support\Facades\Facade;

class RouteManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Contracts\RouteManager::class;
    }
}
