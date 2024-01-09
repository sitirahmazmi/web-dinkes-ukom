<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/template', function(){
    return view('layouts.template');
});
Route::get('/test', function(){
    return view('test');
});
Route::get('/user/biodata',[UserController::class, 'input'])->name('biodata');
Route::post('/user/biodata/input',[UserController::class, 'store'])->name('biodata.store');
Route::post('/user/biodata/{id}',[UserController::class, 'updateBiodata']);
Route::get('/user/biodata/{id}',[UserController::class, 'updateBiodata'])->name('biodata.update');
Route::get('/user/biodata/edit',[UserController::class, 'editBiodata'])->name('biodata.edit');
Route::get('/user/upload', [UserController::class, 'createUpload'])->name('upload');
Route::post('/user/upload', [UserController::class, 'fileUpload'])->name('fileUpload');

