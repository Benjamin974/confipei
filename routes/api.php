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


Route::get('/confitures', 'ConfituresController@index');
Route::post('/confitures', 'ConfituresController@addProduct');
Route::get('/fruits', 'ConfituresController@viewFruits');
Route::get('/acfruits', 'ConfituresController@autoComplete');

Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');