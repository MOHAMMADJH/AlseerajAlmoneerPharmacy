<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
  route::prefix('test')->groub(function (){
    Route::get('/test1',function (){
        return "مفيش إنترنت" ;
    Route::get('/test2',function (){
    return "2مفيش إنترنت" ;
});
*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


