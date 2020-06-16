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
Route::middleware('auth:api')->post('/commande', 'CommandeController@commander');
Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['middleware' => 'roles:Admin|Producteur'], function () {
                Route::post('/', 'ConfituresController@addOrUpdateProduct');
                Route::get('/producteurs', 'ConfituresController@indexProd');
                Route::get('/producteurs/{id}', 'ConfituresController@addConfituresProducteur')->where('id', "[0-9]+");
                Route::get('/producteurs/{id}/name', 'ConfituresController@addConfituresProducteurName')->where('id', "[0-9]+");
        });
});

Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['middleware' => 'roles:Producteur'], function () {
                Route::get('/producteurs/confitures', 'ConfituresController@getOfProdcteur');
                Route::post('/producteurs/confitures', 'ConfituresController@addOrUpdateOfProducteur');
        });
});

Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['middleware' => 'roles:Client'], function () {
                Route::get('/{id}/producteurs', 'ClientsController@index')->where('id', "[0-9]+");
        });
});
Route::get('/', 'ConfituresController@index');
Route::get('/acfruits', 'ConfituresController@autoComplete');


Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
