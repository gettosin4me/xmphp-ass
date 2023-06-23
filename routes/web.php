<?php

use Illuminate\Support\Facades\Route;

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

Route::match(['GET'], '/', [
    'uses' => 'App\Http\Controllers\AppController@index',
    'as' => 'app.index'
]);

Route::match(['POST'], '/', [
    'uses' => 'App\Http\Controllers\AppController@fetchData',
    'as' => 'app.fetch'
]);

Route::match(['GET'], '/histories', [
    'uses' => 'App\Http\Controllers\AppController@histories',
    'as' => 'app.history'
]);