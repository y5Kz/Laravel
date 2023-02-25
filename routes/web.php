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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'PostController@index');

    Route::resource('posts', 'PostController');

    Route::resource('tests', 'TestController');

    Route::resource('users', 'UserController')->middleware(['auth', 'admin']);

    Route::resource('reqs', 'ReqController')->middleware(['auth', 'admin']);

    Route::resource('limits', 'LimitController')->middleware(['auth', 'admin']);

    Route::resource('mys', 'MyController');

    Route::get('/admin', 'HomeController@admin')->name('admin.store')->middleware(['auth', 'admin']);

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/contribution', 'AjaxController')->name('ajax.button');

    Route::post('/update/{{$user[id]}}', 'UpController')->name('edit.name');
});
