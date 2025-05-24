<?php

use App\Http\Controllers\RegistrationController;

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
Route::get('/registration/create', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
