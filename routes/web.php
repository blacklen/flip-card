<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/flip-card', 'App\Http\Controllers\FlipCardController@index');
Route::post('/flip-card/{id}/submit', 'App\Http\Controllers\FlipCardController@submit');
