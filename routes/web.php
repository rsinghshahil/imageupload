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
    return view('imageUpload');
})->name('home');

Route::resource('/upload','FileUploadController');
Route::post('/gns','FileUploadController@generateAndSend')->name('gns');

// Route::get('/gns/{id}','FileUploadController@generateAndSend')->name('gns');
