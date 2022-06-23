<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth:sanctum', 'signed'])->name('verification.verify');
    Route::post('verify/resend', [EmailVerificationController::class, 'resend'])->middleware(['auth:sanctum'])->name('verification.resend');
});

Route::fallback(fn () => response()->json(['error' => 'Endpoint Not found'], 404));
