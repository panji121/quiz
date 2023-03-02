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

Route::group(['prefix' => 'teachers'], function () {
    Route::get('/', 'teachersController@index');
    Route::get('/create', 'teachersController@create');
    Route::post('/', 'teachersController@store');
    Route::get('/{id}', 'teachersController@edit');
    Route::put('/{id}', 'teachersController@update');
    Route::delete('/{id}', 'teachersController@destroy');
});

Route::group(['prefix' => 'subjects'], function () {
    Route::get('/', 'subjectsController@index');
    Route::get('/create', 'subjectsController@create');
    Route::post('/', 'subjectsController@store');
    Route::get('/{id}', 'subjectsController@edit');
    Route::put('/{id}', 'subjectsaController@update');
    Route::delete('/{id}', 'subjectsController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
