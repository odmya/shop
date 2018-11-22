<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->resource('users', UsersController::class);
    $router->resource('products', ProductsController::class);
    $router->resource('currencies', CurrencyController::class);
    $router->resource('orders', OrdersController::class);
    $router->resource('userguides', UserGuideController::class);
    $router->resource('menus', MenuController::class);
    $router->resource('menuitems', MenuItemController::class);
    $router->resource('informations', InformationController::class);
    $router->resource('tips', TipsController::class);
    $router->resource('tipcategories', TipCategoriesController::class);
});
