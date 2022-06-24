<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth:sanctum', 'signed'])->name('verification.verify');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('verify/resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
        Route::post('logout', [AuthController::class, 'logout']);
    });

});

Route::fallback(fn () => response()->json(['error' => 'Endpoint Not found'], 404));
