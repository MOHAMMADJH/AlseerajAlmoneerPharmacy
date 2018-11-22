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
    Route::get('', 'CategoriesController@index');
    Route::post('show', 'CategoriesController@show');
    Route::post('create', 'CategoriesController@create');
    Route::put('update', 'CategoriesController@update');
    Route::delete('delete', 'CategoriesController@delete');
});
