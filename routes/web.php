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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'dashboardController@index');
Route::get('/input', 'inputController@index');
Route::post('/input/{id}', 'inputController@update')->name('update');
Route::post('/input/{id}/edit', 'inputController@edit')->name('edit');
Route::post('/submit', 'inputController@selesai')->name('selesai');
Route::post('/delete/{id}', 'dashboardController@destroy');
Route::post('/export', 'dashboardController@export')->name('export');
