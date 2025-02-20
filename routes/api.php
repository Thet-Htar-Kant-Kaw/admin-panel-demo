<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserBaseController;

Route::middleware('auth:api')->group(function () {
    Route::get('/users', [UserBaseController::class, 'index']);
    Route::post('/users', [UserBaseController::class, 'store']);
    Route::get('/users/{id}', [UserBaseController::class, 'show']);
    Route::put('/users/{id}', [UserBaseController::class, 'update']);
    Route::delete('/users/{id}', [UserBaseController::class, 'destroy']);
});
