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

Route::resource('/', 'ShowController');



Route::get('province/{id}','ShowController@province');
Route::get('district/{id}','ShowController@district');

Route::get('detail/{id}','DetailController@show');

Route::get('search','SearchController@Search');

// post home
Route::resource('posthome','PostController');

Route::get('type/{type}','ShowController@ShowType');


