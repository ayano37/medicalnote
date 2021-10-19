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
Route::group(['prefix' => 'admin'], function() {
    Route::get('medical/create', 'Admin\MedicalController@add')->middleware('auth');
    Route::post('medical/create', 'Admin\MedicalController@create')->middleware('auth');
    Route::get('medical', 'Admin\MedicalController@index')->middleware('auth');
    Route::get('medical/edit', 'Admin\MedicalController@edit')->middleware('auth');
    Route::post('medical/edit', 'Admin\MedicalController@update')->middleware('auth');
    Route::get('medical/delete', 'Admin\MedicalController@delete')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'MedicalController@index');
