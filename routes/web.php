<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserBaseController;

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [UserBaseController::class, 'index']);
    Route::get('/home', [UserBaseController::class, 'index'])->name('home');
    Route::get('/users', [UserBaseController::class, 'index'])->name('users');

    Route::post('/users', [UserBaseController::class, 'store'])->name('users.store');
    Route::get('/userbase/edit/{id}', [UserBaseController::class, 'edit'])->name('users.edit');
    Route::put('/userbase/update/{id}', [UserBaseController::class, 'update'])->name('users.update');
    Route::delete('/userbase/delete/{id}', [UserBaseController::class, 'destroy'])->name('users.delete');
});
