<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return redirect()->route('register');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
Route::view('/', 'dashboard')->name('dashboard');
});

Route::prefix('profile')->middleware(['auth'])->group(function () {
Route::view('/', 'profile')->name('profile');
});

Route::prefix('users')->middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
Route::view('/', 'users')->name('users');
Route::get('create', \App\Livewire\Modules\Users\Create::class)->name('users.create');
Route::get('{user_id}/edit', \App\Livewire\Modules\Users\Edit::class)->name('users.edit');
});

Route::prefix('tasks')->middleware(['auth', 'verified'])->group(function () {
Route::view('/', 'tasks')->name('tasks');
Route::get('create', \App\Livewire\Modules\tasks\Create::class)->middleware(['auth', 'verified', AdminMiddleware::class])->name('tasks.create');
Route::get('{task_id}/edit', \App\Livewire\Modules\tasks\Edit::class)->middleware(['auth', 'verified', AdminMiddleware::class])->name('tasks.edit');
});

require __DIR__ . '/auth.php';
