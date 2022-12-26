<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoController;


Route::prefix('auth')->middleware('guest')->group(function () {
    Route::post('register', [AuthController::class, 'store'])
        ->name('api.auth.store');

    Route::post('login', [AuthController::class, 'login'])
        ->name('api.auth.login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('todos', [TodoController::class, 'index'])
        ->name('api.todos.index');

    Route::post('todos', [TodoController::class, 'store'])
        ->name('api.todos.store');
});
