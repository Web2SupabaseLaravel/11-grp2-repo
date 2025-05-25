<?php

use App\Http\Controllers\RegistrationController;

Route::get('/registrations', [RegistrationController::class, 'index']);
Route::get('/registrations/{id}', [RegistrationController::class, 'show']);
Route::post('/registrations', [RegistrationController::class, 'store']);
Route::put('/registrations/{id}', [RegistrationController::class, 'update']);
Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy']);
Route::post('/registrations', [RegistrationController::class, 'apiStore']);
