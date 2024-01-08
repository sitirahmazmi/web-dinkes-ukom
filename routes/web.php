<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/user/biodata',[App\Http\Controllers\UserController::class, 'input'])->name('biodata');
Route::post('/user/biodata/input',[App\Http\Controllers\UserController::class, 'store'])->name('biodata.store');
Route::post('/user/biodata/{id}}',[App\Http\Controllers\UserController::class, 'updateBiodata'])->name('biodata.update');
Route::get('/user/biodata/{id}}',[App\Http\Controllers\UserController::class, 'updateBiodata'])->name('biodata.update');
Route::get('/user/biodata/edit}',[App\Http\Controllers\UserController::class, 'editBiodata'])->name('biodata.edit');


