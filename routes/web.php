<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\ImageGalleryController@index');
Route::get('/gallery', 'App\Http\Controllers\ImageGalleryController@index');
Route::post('/search', 'App\Http\Controllers\ImageGalleryController@search');

Route::fallback(function () {
    return redirect("/");
});
