<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/app-users', [UserController::class, 'index'])->name('app-users.index');
Route::get('/app-users/create', [UserController::class, 'create'])->name('app-users.create');
Route::post('/app-users', [UserController::class, 'store'])->name('app-users.store');