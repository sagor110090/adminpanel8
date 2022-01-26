<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;



include_once 'routes/crud.php';


Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::view('/', 'dashboard');
    Route::view('/dashboard', 'dashboard');
    Route::view('/admin/profile', 'admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'profileUpdate']);
});




Route::resource('admin/student', 'Admin\\StudentController');
