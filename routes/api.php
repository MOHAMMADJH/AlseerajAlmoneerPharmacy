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
    Route::delete('destroy', 'CategoryController@destroy');
});

Route::prefix('SubCategory')->group(function () {
    Route::get('', 'SubCategoryController@index');
    Route::post('show', 'SubCategoryController@show');
    Route::post('create', 'SubCategoryController@create');
    Route::put('update', 'SubCategoryController@update');
    Route::delete('destroy', 'SubCategoryController@destroy');
});

Route::prefix('products')->group(function () {
    Route::get('', 'ProductController@index');
    Route::post('show', 'ProductController@show');
    Route::post('create', 'ProductController@create');
    Route::put('update', 'ProductController@update');
    Route::delete('destroy', 'ProductController@destroy');
});