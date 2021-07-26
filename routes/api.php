<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use \App\Http\Controllers\Api\LoginController;
use \App\Http\Controllers\Api\ShowUserInfoController;
use \App\Http\Controllers\Api\NotificationController;

Route::group(['prefix' => 'v1/users'], function () {
    Route::post('/register', [RegisterController::class, 'store'])->name('api.v1.user.register');
    Route::post('/login', [LoginController::class, 'login'])->name('api.v1.user.login');

    Route::group(['middleware' => ['auth:api']], function() {
        //users info
        Route::get('/show', [ShowUserInfoController::class, 'show'])->name('api.v1.user.show');
        //notifications
        Route::apiResource('/notifications', NotificationController::class)->names('api.v1.notifications');
    });
});
