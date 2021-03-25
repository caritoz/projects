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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth:web', 'prefix' => 'projects'], function () {

    Route::get('/', 'ProjectController@index');
    Route::get('/create', ['as' => 'projects.create',     'uses' => 'ProjectController@create']);
    Route::post('/',     ['as' => 'projects.store',     'uses' => 'ProjectController@store']);

    Route::delete('/{id}', ['as' => 'projects.destroy',    'uses' => 'ProjectController@destroy']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
