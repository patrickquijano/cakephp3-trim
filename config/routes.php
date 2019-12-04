<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin('Trim', ['path' => '/trim'], function (RouteBuilder $routes) {
    $routes->fallbacks(DashedRoute::class);
});
