<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Modules\Authentication\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


Route::middleware('api')->prefix('auth')->controller(AuthController::class)->group(function(){
    Route::post('/login' , 'login');
});
