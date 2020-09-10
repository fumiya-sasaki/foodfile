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
Route::group(['prefix' =>'admin',  'middleware' => 'auth'], function() {
    Route::get('shop/create', 'Admin\Shopscontroller@add');
    Route::post('shop/create', 'Admin\Shopscontroller@create');
    Route::get('/', 'Admin\Shopscontroller@index');
    Route::post('shop/delete/{id}', 'Admin\Shopscontroller@delete');
    Route::get('shop/edit/{id}', 'Admin\Shopscontroller@edit');
    Route::post('shop/edit', 'Admin\Shopscontroller@update');
    Route::get('shop/map', 'Admin\Shopscontroller@map');
    Route::POST('shop/mapmarker', 'Admin\Shopscontroller@mapmarker');
    Route::get('shop/api', 'Admin\Shopscontroller@api');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
