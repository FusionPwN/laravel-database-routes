<?php

namespace Fusionpwn\LaravelDatabaseRoutes\Middleware;

use Closure;
use Fusionpwn\LaravelDatabaseRoutes\RouteManager\DbRouteManagerProxy;
use Fusionpwn\LaravelDatabaseRoutes\Contracts\RouteManager;
use Illuminate\Support\Facades\Route;

class RouteMiddleware
{
    private $routeManager;

    public function __construct(RouteManager $routeManager)
    {
        $this->routeManager = $routeManager;
    }

    public function handle($request, Closure $next)
    {
        if ($route = $this->routeManager->routeByUrl($request->getPathInfo())) {
            Route::any($route->url(), [$route->controller(), $route->action()])
                ->middleware($route->middleware());
        }
        foreach ($this->routeManager->routesWithPattern() as $route) {
            Route::any($route->url(), [$route->controller(), $route->action()])
                ->middleware($route->middleware());
        }

        return $next($request);
    }
}
