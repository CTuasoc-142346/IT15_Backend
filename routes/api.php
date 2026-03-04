<?php

use App\Http\Controllers\Api\AuthController;

Route::get('/token-test', function () {
    return $user->createToken('test')->plainTextToken;
});

Route::post('/login', [AuthController::class, 'login']);