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

Route::get('/gpio', 'GPIOManagerExampleController@index')->name('gpio.index');
Route::post('/gpio', 'GPIOManagerExampleController@redled')->name('gpio.redled');

Route::get('/gpio/photosensor', 'GPIOManagerExampleController@photosensor')->name('gpio.photosensor');