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

Route::get('/', 'Site\HomeController@index');

// Grupo de rotas para o painel administrativo
Route::prefix('painel')->group(function() {
    Route::get('/', 'Admin\HomeController@index')->name('admin');

    Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@authenticate');

    Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
    Route::post('register', 'Admin\Auth\RegisterController@register');

    Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::resource('users', 'Admin\UserController');

    Route::get('profile', 'Admin\ProfileController@index')->name('profile');
    Route::put('profilesave', 'Admin\ProfileController@save')->name('profile.save');
});


// Grupo de rotas para a parte do site, usuario comum
Route::prefix('/')->group(function() {
    Route::get('/', 'Site\HomeController@index')->name('site');

    Route::get('login', 'Site\Auth\LoginController@index')->name('login');
    Route::post('login', 'Site\Auth\LoginController@authenticate');

    Route::get('register', 'Site\Auth\RegisterController@index')->name('register');
    Route::post('register', 'Site\Auth\RegisterController@register');

    Route::resource('users', 'Site\UserController');

    Route::get('profile', 'Site\ProfileController@index')->name('profile');
    Route::put('profilesave', 'Site\ProfileController@save')->name('profile.save');

});

Route::fallback('Site\PageController@index');