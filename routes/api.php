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


Route::prefix('categories')->group(function () {
    Route::get('', 'CategoryController@index');
    Route::post('show', 'CategoryController@show');
    Route::post('create', 'CategoryController@create');
    Route::put('update', 'CategoryController@update');
    Route::delete('delete', 'CategoryController@delete');
});
