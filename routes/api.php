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

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'isAdmin'], function () {
        Route::get('/confitures', 'ConfituresController@index');
        Route::post('/confitures', 'ConfituresController@addOrUpdateProduct');
        Route::post('/confitures/image/', 'ConfituresController@AddImage')->where('id', "[0-9]+");
        Route::get('/producteurs/{id}', 'ConfituresController@addConfituresProducteur')->where('id', "[0-9]+");
        Route::get('/producteurs/{id}/name', 'ConfituresController@addConfituresProducteurName')->where('id', "[0-9]+");
    });
});

Route::get('/acfruits', 'ConfituresController@autoComplete');


Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
