<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EmailVerificationController;

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth:sanctum', 'signed'])->name('verification.verify');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('verify/resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('courses', [CourseController::class, 'store']);
        Route::put('courses/{id}', [CourseController::class, 'update']);
        Route::delete('courses/{id}', [CourseController::class, 'destroy']);
        Route::post('announcements', [AnnouncementController::class, 'store']);
        Route::put('announcements/{id}', [AnnouncementController::class, 'update']);
        Route::delete('announcements/{id}', [AnnouncementController::class, 'destroy']);
    });
});

Route::get('courses', [CourseController::class, 'index']);
Route::get('courses/{id}', [CourseController::class, 'show']);
Route::get('courses/search/{title}', [CourseController::class, 'search']);
Route::get('announcements', [AnnouncementController::class, 'index']);
Route::get('announcements/{id}', [AnnouncementController::class, 'show']);
Route::get('announcements/search/{title}', [AnnouncementController::class, 'search']);

Route::fallback(fn () => response()->json(['error' => 'Endpoint Not found'], 404));
