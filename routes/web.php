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

//Route::get('/', function () {
  //  return redirect()->route('movies.index');
//});

Auth::routes();

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('about', 'PageController@about')->name('about');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');
Route::get('/critic/home', 'Critic\HomeController@index')->name('critic.home');

Route::get('/admin/movies','Admin\MovieController@index')->name('admin.movies.index');
Route::get('/admin/movies/create','Admin\MovieController@create')->name('admin.movies.create');
Route::get('/admin/movies{id}','Admin\MovieController@show')->name('admin.movies.show');
Route::post('/admin/movies/store','Admin\MovieController@store')->name('admin.movies.store');
Route::get('/admin/movies/{id}/edit','Admin\MovieController@edit')->name('admin.movies.edit');
Route::put('/admin/movies/{id}/update','Admin\MovieController@update')->name('admin.movies.update');
Route::delete('/admin/movies/{id}','Admin\MovieController@destroy')->name('admin.movies.destroy');



Route::get('/movies','MovieController@index')->name('movies.index');
Route::get('/movies/create','MovieController@create')->name('movies.create');
Route::post('/movies','MovieController@store')->name('movies.store');
Route::get('/movies/{id}','MovieController@show')->name('movies.show');
Route::get('/movies/{id}/edit','MovieController@edit')->name('movies.edit');
Route::put('/movies/{id}','MovieController@update')->name('movies.update');
Route::delete('movies/{id}','MovieController@destroy')->name('movies.destroy');

Auth::routes(['verify'=> true]);
//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/home', 'HomeController@index')->name('home')->middleware();
Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
