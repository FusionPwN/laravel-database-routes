<?php

namespace Fusionpwn\RouteManager;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use Fusionpwn\Contracts;
use Fusionpwn\Contracts\RouteManager;
use Fusionpwn\Routes\Route;
use Illuminate\Cache\CacheManager;

class CacheRouteManagerProxy implements RouteManager
{
    private $routeManager;

    public function __construct(Contracts\RouteManager $routeManager)
    {
        $this->routeManager = $routeManager;
    }

    public function addRoute(Route $route)
    {
        $this->routeManager->addRoute($route);
    }

    public function routeByUrl(string $url) : Route
    {
        $key = "routeByUrl" . $url;
        if($route = cache()->get($key)) {
            $route = unserialize($route);
        } else {
            $route = $this->routeManager->routeByUrl($url);
            cache()->add($key, serialize($route), env("ROUTE_CACHE_TIME",0));
        }
        return $route;
    }

    public function routeByName(string $name) : Route
    {
        $key = "routeByName" . $name;
        if($route = cache()->get($key)) {
            $route = unserialize($route);
        } else {
            $route = $this->routeManager->routeByName($name);
            cache()->add($key, serialize($route),  env("ROUTE_CACHE_TIME",0));
        }
        return $route;
    }

    public function routesWithPattern() : array
    {
        return $this->routeManager->routesWithPattern();
    }
}
