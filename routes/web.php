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
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/owner', 'ItemController@home');
Route::get('/owner/items', 'ItemController@index');
Route::post('/items', 'ItemController@store');
Route::put('/items/{item}','ItemController@update');
Route::get('/owner/items/create', 'ItemController@create');
Route::get('/owner/items/{item}', 'ItemController@show');
Route::delete('/owner/items/{item}', 'ItemController@delete');
Route::get('/owner/items/{item}/edit', 'ItemController@edit');