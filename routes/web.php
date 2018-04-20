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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('home/posting', 'PostController@index')->name('forposting');

Route::post('home/posting/createpost', 'PostController@create')->name('createpost');

Route::get('thisuserposts/{username}', 'PostController@show');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::post('/changeprofile', 'HomeController@changeprofile')->name('changeprofile');

Route::get('/myposts', 'HomeController@myposts')->name('myposts');

Route::get('/thispost/{id}', 'HomeController@thispost')->name('thispost');

Route::get('/editmypost/{id}', 'HomeController@editpostpage');

Route::post('/editingpost/{id}', 'HomeController@editpost');

Route::post('/uploadimage', "HomeController@uploadimage")->name('uploadimage');
