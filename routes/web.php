<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Illuminate\Http\Response;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'e-commerce'], function () use ($router) {

    // Route products
    $router->get('products', 'ProductController@index');
    $router->post('products', 'ProductController@store');
    $router->get('products/{id}', 'ProductController@show');
    $router->put('products/{id}', 'ProductController@update');
    $router->delete('products/{id}', 'ProductController@destroy');

    // Route orders
    $router->get('orders', 'OrderController@index');
    $router->post('orders', 'OrderController@store');
    $router->get('orders/{id}', 'OrderController@show');
    $router->put('orders/{id}', 'OrderController@update');
    $router->delete('orders/{id}', 'OrderController@destroy');

    // Route order_items
    $router->get('order_items', 'OrderItemController@index');
    $router->post('order_items', 'OrderItemController@store');
    $router->get('order_items/{id}', 'OrderItemController@show');
    $router->put('order_items/{id}', 'OrderItemController@update');
    $router->delete('order_items/{id}', 'OrderItemController@destroy');

     // Route categories
    $router->get('categories', 'CategoryController@index');
    $router->post('categories', 'CategoryController@store');
    $router->get('categories/{id}', 'CategoryController@show');
    $router->put('categories/{id}', 'CategoryController@update');
    $router->delete('categories/{id}', 'CategoryController@destroy');

    // Route users
    $router->get('payments', 'PaymentController@index');
    $router->post('payments', 'PaymentController@store');
    $router->get('payments/{id}', 'PaymentController@show');
    $router->put('payments/{id}', 'PaymentController@update');
    $router->delete('payments/{id}', 'PaymentController@destroy');

    // Route untuk registrasi dan login user
    $router->post('register', 'UserController@register');
    $router->post('login', 'UserController@login');

    // Route yang memerlukan middleware auth
    $router->group(['middleware' => 'auth:sanctum'], function () use ($router) {
        $router->post('logout', 'UserController@logout');
        $router->get('me', 'UserController@me');
    });


});