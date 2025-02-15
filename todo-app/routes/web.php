<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('users', 'users')
    ->middleware(['auth', 'verified'])
    ->name('users');

// Create user route
Route::get('users/create', \App\Livewire\Modules\Users\Create::class)
    ->middleware(['auth', 'verified'])
    ->name('users.create');

// Edit user route
Route::get('users/{user_id}/edit', \App\Livewire\Modules\Users\Edit::class)
    ->middleware(['auth', 'verified'])
    ->name('users.edit');


Route::view('tasks', 'tasks')
    ->middleware(['auth', 'verified'])
    ->name('tasks');

require __DIR__ . '/auth.php';
