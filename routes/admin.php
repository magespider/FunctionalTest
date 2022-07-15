<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\TinymceController; 
//use App\Http\Controllers\Admin\CategoriesController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------- 
|
*/  
Route::group([
    'middleware' => ['auth:admin']
], function () { 
    Route::get('/dashboard', ['App\Http\Controllers\Admin\DashboardController', 'index'])->name('dashboard');
    /* Change Password */
    Route::get('change-password', [ChangePasswordController::class, 'edit'])->name('change-password');
	Route::post('change-password', [ChangePasswordController::class, 'update'])->name('change-password.update');   
    
    /* Management Modules */
    Route::resource('admins', AdminsController::class)->except('show');  
    Route::resource('users', UsersController::class)->except('show');    

    /* Settings Modules */ 
    Route::resource('settings', SettingsController::class)->except('show'); 
    Route::post('tinymce/upload', [TinymceController::class, 'store'])->name('tinymce.upload');
});      
require __DIR__.'/auth-admin.php';