<?php
use App\Http\Controllers\UserController;

Route::middleware(['auth','role:peserta'])->prefix('peserta')->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'peserta'])->name('peserta.dashboard');
    // Route::get('/logout', function() {
    //     auth()->logout();

    // // Redirect the user to the home page or wherever you prefer.
    // return redirect('/');
    // })->name('logout');

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // Route::get('/template', function(){
    //     return view('layouts.template');
    // });
    // Route::get('/test', function(){
    //     return view('test');
    // });
    // Route::get('/uploadCoba', [FileController::class, 'index'])->name('home');
    // Route::post('file/upload', [FileController::class,'store'])->name('upload');
    // Route::get('/user/dashboard',[UserController::class, 'dashboardUser']);
    // Route::get('/user/lihatData',[UserController::class, 'lihatData']);
    // Route::get('/user/biodata',[UserController::class, 'input'])->name('biodata');
    // Route::post('/user/biodata/input',[UserController::class, 'store'])->name('biodata.store');
    // Route::post('/user/biodata/{id}',[UserController::class, 'updateBiodata']);
    // Route::get('/user/biodata/{id}',[UserController::class, 'updateBiodata'])->name('biodata.update');
    // Route::get('/user/biodata/edit',[UserController::class, 'editBiodata'])->name('biodata.edit');
    // //Route::get('/uploads', [UserController::class, 'indexFile'])->name('uploads.index');
    // Route::get('/uploads/create', [UserController::class, 'uploadFile'])->name('uploads.create');
    // Route::post('/uploads', [UserController::class, 'storeFile'])->name('uploads.store');
    // Route::post('/uploads/update', [UserController::class, 'updateFile'])->name('uploads.update');
    // // Add other routes as needed

});