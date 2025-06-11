<?php
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\RegistrationController;

// Routes for Ticket Management
Route::get('/tickets/manage/{event_id}', [TicketTypeController::class, 'manage'])->name('tickets.manage');
Route::post('/tickets/store', [TicketTypeController::class, 'store'])->name('tickets.store');
Route::delete('/tickets/delete/{id}', [TicketTypeController::class, 'delete'])->name('tickets.delete');

// Routes for Registration
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
Route::get('/registration/create', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
