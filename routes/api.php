<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketTypeController;

Route::post('/registrations', [RegistrationController::class, 'apiStore']);
Route::get('/registrations', [RegistrationController::class, 'index']);
Route::get('/registrations/{id}', [RegistrationController::class, 'show']);
Route::put('/registrations/{id}', [RegistrationController::class, 'update']);
Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/search', [EventController::class, 'search']);

// ✅ تأكد من هذا الراوت
Route::get('/tickets/by-event/{event_id}', [TicketTypeController::class, 'getByEvent']);
