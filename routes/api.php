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
    // I considered using a prefixed group that has prefix "todos"...
    // But I didn't like it. It felt unnatural as I had to read the prefix then add the route url to the prefix. Didn't like it.

    Route::get('todos', [TodoController::class, 'index'])
        ->name('api.todos.index');

    Route::post('todos', [TodoController::class, 'store'])
        ->name('api.todos.store');

    Route::get('todos/{todo}', [TodoController::class, 'show'])
        ->name('api.todos.show');

    Route::patch('todos/{todo}', [TodoController::class, 'update'])
        ->name('api.todos.update');

    Route::delete('todos/{todo}', [TodoController::class, 'destroy'])
        ->name('api.todos.destroy');
});
