<?php

use App\Http\Controllers\ApiAppUserController;
use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

Route::get('/test', fn() => response()->json(['message' => 'API works']));

Route::prefix('app_users')->group(function () {
    Route::get('/', [ApiAppUserController::class, 'index'])->name('api.app_users.index');
    Route::post('/', [ApiAppUserController::class, 'store'])->name('api.app_users.store');
    Route::get('/{appUser}', [ApiAppUserController::class, 'show'])->name('api.app_users.show');
    Route::put('/{appUser}', [ApiAppUserController::class, 'update'])->name('api.app_users.update');
    Route::delete('/{appUser}', [ApiAppUserController::class, 'destroy'])->name('api.app_users.destroy');
});

Route::get('/user', fn() => response()->json(['message' => 'Not authenticated']));

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    $user = AppUser::where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        // Check if user is Admin
        if ($user->role === 'Admin') {
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => $user,
                'is_admin' => true
            ]);
        } 
        else {
            return response()->json([
                'message' => 'User is not an admin',
                'is_admin' => false,
                'user' => $user
            ], 403);
        }
    }

    return response()->json(['error' => 'Unauthorized'], 401);
});