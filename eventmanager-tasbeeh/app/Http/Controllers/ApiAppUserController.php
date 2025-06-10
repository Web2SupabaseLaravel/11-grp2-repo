<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApiAppUserController extends Controller
{
    public function index()
    {
        $users = AppUser::all();
        return response()->json(['users' => $users]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'role' => 'required|in:Attendee,Organizer,Admin', // Use capitalized values
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = AppUser::create($validated);
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function show(AppUser $appUser)
    {
        return response()->json(['user' => $appUser]);
    }

    public function update(Request $request, AppUser $appUser)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('app_users')->ignore($appUser->id_user, 'id_user')],
            'password' => 'nullable|string|min:8',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'role' => 'required|in:Attendee,Organizer,Admin', // Use capitalized values
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $appUser->update($validated);
        return response()->json(['message' => 'User updated successfully', 'user' => $appUser]);
    }

    public function destroy(AppUser $appUser)
    {
        $appUser->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}