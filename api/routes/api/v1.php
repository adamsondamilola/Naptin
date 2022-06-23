<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function() {
    Route::post('register', [AuthController::class, 'register']);
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth:sanctum', 'signed'])->name('verification.verify');
    Route::post('verify/resend', [EmailVerificationController::class, 'resend'])->middleware(['auth:sanctum'])->name('verification.resend');
});

Route::fallback(fn () => response()->json(['error' => 'Not found'], 404));
