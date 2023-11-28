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
$router->get('/tasks', 'TaskController@list');
$router->get('/tasks/{id}', 'TaskController@show');
$router->post('/tasks', 'TaskController@store');
$router->put('/tasks/{id}', 'TaskController@update');
$router->delete('/tasks/{id}', 'TaskController@destroy');

$router->options('/{any:.*}', function () {
    return response('OK', 200)
        ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
        ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');
});




