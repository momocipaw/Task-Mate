<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

use App\Http\Controllers\TaskController;

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

require __DIR__.'/auth.php';
