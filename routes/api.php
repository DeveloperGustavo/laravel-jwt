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

Route::post('login', 'Api\AuthController@login');

Route::post('refresh', 'Api\AuthController@refresh');

Route::group(['middleware' => 'auth:api'], function (){
    Route::get('users', 'Users\UsersController@lista');
    Route::get('products', 'ProductController@lista');
    Route::post('logout', 'Api\AuthController@logout');
});
