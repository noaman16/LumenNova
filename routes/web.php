<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

// Remove the existing route
// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

// Add the new welcome route
$router->get('/', function () {
    return 'Welcome to Nova!';
});



$router->get('/tasks', 'TaskController@index');
$router->get('/tasks/{id}', 'TaskController@show');
$router->post('/tasks', 'TaskController@store');
$router->put('/tasks/{id}', 'TaskController@update');
$router->delete('/tasks/{id}', 'TaskController@destroy');



