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
    return redirect()->route('movies.index');
});

Route::get('/movies','MovieController@index')->name('movies.index');
Route::get('/movies/create','MovieController@create')->name('movies.create');
Route::post('/movies','MovieController@store')->name('movies.store');
Route::get('/movies/{id}','MovieController@show')->name('movies.show');
Route::get('/movies/{id}/edit','MovieController@edit')->name('movies.edit');
Route::put('/movies/{id}','MovieController@update')->name('movies.update');
Route::delete('movies/{id}','MovieController@destroy')->name('movies.destroy');


//Auth::routes(['verify'=> true]);
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/home', 'HomeController@index')->name('home')->middleware();
Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
