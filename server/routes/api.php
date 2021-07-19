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

//Declare Todo Api
Route::put('/todos/{todo}', 'TodoController@update');

Route::middleware('auth:api')->get('/todos', 'TodoController@index');

Route::delete('/todos/{todo}', 'TodoController@destroy');

Route::post('/todos','TodoController@store');

//Declare login api
Route::post('/login', 'LoginController@login');

//Declare register api
Route::post('/register','RegisterController@register');
