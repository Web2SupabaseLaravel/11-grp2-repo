<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app-users', [UserController::class, 'index'])->name('app-users.index');
Route::get('/app-users/create', [UserController::class, 'create'])->name('app-users.create');
Route::get('/app-users/{id}/edit', [UserController::class, 'edit'])->name('app-users.edit');