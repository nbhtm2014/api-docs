<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'docs',
], function (Router $router) {
    $router->get('/', \Nbhtm\ApiDocs\Controllers\DocsController::class . '@index');
});
