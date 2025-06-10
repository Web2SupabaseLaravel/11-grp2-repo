<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('app_users', AppUserController::class);