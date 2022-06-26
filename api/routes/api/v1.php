<?php

use App\Http\Controllers\TraineeManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EmailVerificationController;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::controller(EmailVerificationController::class)->group(function () {
            Route::get('verify/{id}/{hash}', 'verify')->middleware(['signed'])->name('verification.verify');
            Route::post('verify/resend', 'resend')->name('verification.resend');
        });
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


Route::group(['prefix' => 'module/trainee-management', 'middleware' => ['auth:sanctum']], function () {
    Route::controller(TraineeManagementController::class)->group(function () {
        Route::get('all-trainees', 'index');
    });
});


Route::fallback(fn () => response()->json(['error' => 'Endpoint Not found'], 404));
