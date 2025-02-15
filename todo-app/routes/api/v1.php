<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('tasks', [TaskController::class, 'index']);
        Route::post('add-task', [TaskController::class, 'store']);
        Route::put('update-task', [TaskController::class, 'update']);
        Route::delete('delete-task/{id}', [TaskController::class, 'destroy']);
    });
});
