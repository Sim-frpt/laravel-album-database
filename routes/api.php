<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication routes

Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');

Route::post('/logout', 'AuthController@logout');

// API CRUD routes

Route::middleware('auth:api')->get('/albums', 'AlbumController@index')->name('albums.index');

Route::middleware('auth:api')->post('/albums', 'AlbumController@store')->name('albums.store');

Route::middleware('auth:api')->get('/albums/{album}', 'AlbumController@show')->name('albums.show');

Route::middleware('auth:api')->put('/albums/{album}', 'AlbumController@update')->name('albums.update');

Route::middleware('auth:api')->delete('/albums/{album}', 'AlbumController@destroy')->name('albums.destroy');

Route::middleware('auth:api')->get('albums/search/{name?}', 'AlbumController@findName')->name('albums.search');
