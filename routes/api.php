<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/users'], function () {
    Route::post('/register', [RegisterController::class, 'store'])->name('api.v1.register');

    Route::group(['middleware' => ['auth:passport']], function() {

    });
});
