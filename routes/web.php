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

use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('index');
});

Route::post('thanks', function () {
    return view('thanks');
});

Route::post('data', 'DataController@getData')->name('data');

