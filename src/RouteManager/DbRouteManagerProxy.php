<?php

namespace Fusionpwn\LaravelDatabaseRoutes\RouteManager;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;
use Fusionpwn\LaravelDatabaseRoutes\Contracts\RouteManager;
use Fusionpwn\LaravelDatabaseRoutes\Routes\Route;
use Illuminate\Support\Facades\DB;

class DbRouteManagerProxy implements RouteManager
{
    private $routes = [];

    public function addRoute(Route $route)
    {
        DB::statement("REPLACE INTO routes (url, name, is_pattern, controller, action, middleware)
            VALUES(?, ?, ?, ?, ?, ?)",[
            $route->url(),
            $route->name(),
            $route->isPattern(),
            $route->controller(),
            $route->action(),
            implode(",", $route->middleware())
        ]);
    }

    public function routeByUrl(string $url) : Route
    {
        $select = DB::select("SELECT * FROM routes WHERE url = ?", [$url]);
        if(isset($select[0])) {
            return new Route(
                $select[0]->url,
                (bool) $select[0]->is_pattern,
                $select[0]->name,
                $select[0]->controller,
                $select[0]->action,
                array_filter(explode(",", $select[0]->middleware))
            );
        }
        return Route::$NULL;
    }

    public function routeByName(string $name) : Route
    {
        $select = DB::select("SELECT * FROM routes WHERE name = ?", [$name]);
        if(isset($select[0])) {
            return new Route(
                $select[0]->url,
                (bool) $select[0]->is_pattern,
                $select[0]->name,
                $select[0]->controller,
                $select[0]->action,
                array_filter(explode(",", $select[0]->middleware))
            );
        }
        return Route::$NULL;
    }

    public function routesWithPattern() : array
    {
        $return = [];
        $select = DB::select("SELECT * FROM routes WHERE is_pattern = 1");
        foreach($select as $item) {
            $return[] = new Route(
                $select[0]->url,
                (bool) $select[0]->is_pattern,
                $select[0]->name,
                $select[0]->controller,
                $select[0]->action,
                array_filter(explode(",", $select[0]->middleware))
            );
        }
        return $return;
    }
}
