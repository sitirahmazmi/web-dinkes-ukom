<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;


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
})->middleware('guest');

Auth::routes();

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/logout', function() {
    auth()->logout();

// Redirect the user to the home page or wherever you prefer.
return redirect('/');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/template', function(){
    return view('layouts.template');
});
Route::get('/test', function(){
    return view('test');
});
Route::get('/uploadCoba', [FileController::class, 'index'])->name('home');
Route::post('file/upload', [FileController::class,'store'])->name('upload');
Route::get('/user/dashboard',[UserController::class, 'dashboardUser']);
Route::get('/user/lihatData',[UserController::class, 'lihatData'])->name('lihat.data');
Route::get('/user/biodata',[UserController::class, 'input'])->name('biodata');
Route::post('/user/biodata/input',[UserController::class, 'store'])->name('biodata.store');
Route::post('/user/biodata/{id}',[UserController::class, 'updateBiodata']);
Route::get('/user/biodata/{id}',[UserController::class, 'updateBiodata'])->name('biodata.update');
Route::get('/user/biodata/{id}/edit',[UserController::class, 'editBiodata'])->name('biodata.edit');
Route::post('/user/file/{id}',[FileController::class, 'updateFile']);
Route::get('/user/file/{id}',[FileController::class, 'updateFile'])->name('file.update');
Route::get('/user/file/{id}/edit',[FileController::class, 'editFile'])->name('file.edit');
//Route::get('/uploads', [UserController::class, 'indexFile'])->name('uploads.index');
Route::get('/uploads/create', [FileController::class, 'create'])->name('uploads.create');
Route::post('/uploads', [FileController::class, 'store'])->name('uploads.store');
Route::post('/uploads/update', [UserController::class, 'updateFile'])->name('uploads.update');
// Add other routes as needed
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home',function(){
//     if (Auth::user()->hasRole('admin')) {
//         return redirect()->route('admin.dashboard');
//     }else if (Auth::user()->hasRole('peserta')) {
//         return redirect()->route('peserta.dashboard');
//     }else {
//         return 'Anda Tidak Punya Role';
//     }

    
// });
// // Route::get('/user/upload', [UserController::class, 'createUpload'])->name('upload');
// // Route::post('/user/upload', [UserController::class, 'fileUpload'])->name('fileUpload');


// @include('admin.php');
// @include('peserta.php');