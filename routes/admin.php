<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware' => 'admin.auth'], function () {
    Route::get('/index', 'IndexController@index')->name('admin.home');
});
