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

Route::group(['middleware' => 'auth:web'], function () {

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', 'ProjectController@index');
        Route::get('/create', ['as' => 'projects.create', 'uses' => 'ProjectController@create']);
        Route::post('/', ['as' => 'projects.store', 'uses' => 'ProjectController@store']);

        Route::delete('/{id}', ['as' => 'projects.destroy', 'uses' => 'ProjectController@destroy']);
    });

    Route::group(['prefix' => 'tables'], function () {
        Route::get('/{project}/', ['as' => 'tables.index', 'uses' => 'TableController@index']);
        Route::get('/{project}/create', ['as' => 'tables.create', 'uses' => 'TableController@create']);
        Route::post('/', ['as' => 'tables.store', 'uses' => 'TableController@store']);

        Route::delete('/{id}', ['as' => 'tables.destroy', 'uses' => 'TableController@destroy']);
    });

    Route::group(['prefix' => 'rows'], function () {
        Route::get('/{table}/', ['as' => 'rows.index', 'uses' => 'RowsController@index']);
        Route::get('/{table}/create', ['as' => 'rows.create', 'uses' => 'RowsController@create']);
        Route::post('/', ['as' => 'rows.store', 'uses' => 'RowsController@store']);

        Route::delete('/{id}', ['as' => 'rows.destroy', 'uses' => 'RowsController@destroy']);
    });

    Route::group(['prefix' => 'columns'], function () {
        Route::get('/{table}/', ['as' => 'columns.index', 'uses' => 'ColumnsController@index']);
        Route::get('/{table}/create', ['as' => 'columns.create', 'uses' => 'ColumnsController@create']);
        Route::post('/', ['as' => 'columns.store', 'uses' => 'ColumnsController@store']);

        Route::delete('/{id}', ['as' => 'rows.destroy', 'uses' => 'ColumnsController@destroy']);
    });

    Route::group(['prefix' => 'cells'], function () {
        Route::get('/{table}/create', ['as' => 'cells.create', 'uses' => 'CellsController@create']);
        Route::post('/', ['as' => 'cells.store', 'uses' => 'CellsController@store']);
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
