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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::resource('Posts','PostsController');
Route::get('/', 'PostsController@index')->name('post.index');
Route::get('/create', 'PostsController@create')->name('post.create');

Route::get('/edit/{id}','PostsController@edit')->name('post.edit');
Route::post('/store', 'PostsController@store')->name('post.store');
Route::put('/update/{id}','PostsController@update')->name('post.update');
Route::delete('/destroy/{id}', 'PostsController@destroy')->name('post.destroy');

Route::get('/icons', function () {
    return view('icons');
})->name('icons');
Route::get('/map', function () {
    return view('map');
})->name('map');
Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');
Route::get('/tables', function () {
    return view('tables');
})->name('tables');
Route::get('/user', function () {
    return view('user');
})->name('user');
Route::get('/typography', function () {
    return view('typography');
})->name('typography');
Route::get('/dashbroad', function () {
    return view('dashbroad');
})->name('dashbroad');
Route::get('/create', function () {
    return view('create');
})->name('create');
