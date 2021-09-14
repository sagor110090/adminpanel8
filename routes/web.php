<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::view('/', 'dashboard');
    Route::view('/dashboard', 'dashboard');
    Route::get('/crud2index', [CrudController::class,'crud2index']); //||
    Route::post('/jsonSave', [CrudController::class,'jsonSave']); //||
    Route::get('/migrate', [CrudController::class,'migrate']); //||
});

Route::resource('admin/student', 'Admin\\StudentController');