<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    //tempat end-point yang akan didefinisikan
});

$api->version('v1',['namespace' => 'App\Http\Controllers'], function ($api){
    $api->get('prodi', 'APIProdiController@index');
});

$api->version('v1',['namespace' => 'App\Http\Controllers'], function ($api){
    $api->get('user', 'APIUserController@index');
    $api->post('user', 'APIUserController@store');
    $api->put('user/{id}','APIUserController@update');
    $api->delete('user/{id}','APIUserController@delete');
});