<?php

namespace Fusionpwn\LaravelDatabaseRoutes\Contracts;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use Fusionpwn\LaravelDatabaseRoutes\Routes\Route;

interface RouteManager
{
    public function addRoute(Route $route);
    public function routeByUrl(string $url) : Route;
    public function routeByName(string $name) : Route;
    public function routesWithPattern() : array;
}
