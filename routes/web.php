<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'userController@home')->name('homePage')->middleware('auth');

Route::get('/home', 'userController@home')->name('home')->middleware('auth');


route::resource('user', 'userController')->middleware('auth');
route::get('user/{user}/select', 'userController@select')->name('user.select')->middleware('auth');


route::resource('chip', 'chipController')->middleware('auth');


route::resource('phone', 'phoneController')->middleware('auth');

//route::any('user/{id}', 'userController@update');