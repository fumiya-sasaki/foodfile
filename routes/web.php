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
Route::group(['prefix' =>'admin'], function() {
    Route::get('shop/create', 'Admin\Shopscontroller@add');
    Route::post('shop/create', 'Admin\Shopscontroller@create');
});
Route::get('/', function () {
    return view('welcome');
});
