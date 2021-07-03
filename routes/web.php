<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/crud2index', 'App\Http\Controllers\HomeController@crud2index'); //||
Route::post('/jsonSave', 'App\Http\Controllers\HomeController@jsonSave'); //||
Route::get('/migrate', 'App\Http\Controllers\HomeController@migrate'); //||
  
