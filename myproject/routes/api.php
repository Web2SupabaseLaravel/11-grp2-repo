<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/app-users', [UserController::class, 'index'])->name('app-users.index');
Route::post('/app-users', [UserController::class, 'store'])->name('app-users.store');
Route::put('/app-users/{id}', [UserController::class, 'update'])->name('app-users.update');
Route::delete('/app-users/{id}', [UserController::class, 'destroy'])->name('app-users.destroy');