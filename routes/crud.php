<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


Route::middleware(['auth'])->group(function () {

    Route::get('/crud', [CrudController::class,'crud']); //||
    Route::post('/jsonSave', [CrudController::class,'jsonSave']); //||
    Route::get('/migrate', [CrudController::class,'migrate']); //||
});
