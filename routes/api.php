<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use \App\Http\Controllers\Api\LoginController;
use \App\Http\Controllers\Api\ShowUserInfoController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/users'], function () {
    Route::post('/register', [RegisterController::class, 'store'])->name('api.v1.register');
    Route::post('/login', [LoginController::class, 'login'])->name('api.v1.login');

    Route::group(['middleware' => ['auth:api']], function() {
        Route::get('/show', [ShowUserInfoController::class, 'show'])->name('api.v1.showUserInfo');
    });
});
