<?php

use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::post('/follow/{user}', 'FollowController@store');

Route::get('/p/create','PostsController@create');
Route::get('/p/{post}','PostsController@show') ;

Route::post('/p', 'PostsController@store');

Route::get('/profile/search', 'UserSearchController@index');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

