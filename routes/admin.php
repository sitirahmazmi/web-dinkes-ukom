<?php
use App\Http\Controllers\AdminController;

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function(){

    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'admin'])->name('admin.dashboard');
});