<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Router;
use Illuminate\Routing\RouteCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Routing\UrlGenerator;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container;
Facade::setFacadeApplication($container);

$events = new Dispatcher($container);
$routeCollection = new RouteCollection();
$router = new Router($events, $container);
$container->instance('router', $router);

$request = Request::capture();
$url = new UrlGenerator($routeCollection, $request);
$container->instance('url', $url);

require_once __DIR__ . '/src/routes/main.php';

$response = $router->dispatch($request);
$response->send();
