<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('api')->group(function(){
    Route::get('users','Api\UsuarioController@index');

    Route::post('users','Api\UsuarioController@store');

    Route::put('users/{usuario}','Api\UsuarioController@update');

    Route::get('users/{usuario}','Api\UsuarioController@show');

    Route::delete('users/{usuario}','Api\UsuarioController@destroy');
});