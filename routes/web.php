<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', 'TestController@app')->name('template');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/admin/users','Admin\UsersController', ['except' => ['show', 'create', 'store']]);
