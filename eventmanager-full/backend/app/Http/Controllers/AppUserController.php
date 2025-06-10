<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AppUserController extends Controller
{
    public function index()
    {
        $users = AppUser::all();
        return view('app_users.index', compact('users'));
    }

    public function create()
    {
        return view('app_users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'role' => 'required|in:Attendee,Organizer,Admin',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        AppUser::create($validated);
        return redirect()->route('app_users.index')->with('success', 'User created successfully.');
    }

    public function show(AppUser $appUser)
    {
        return view('app_users.show', compact('appUser'));
    }

    public function edit(AppUser $appUser)
    {
        return view('app_users.edit', compact('appUser'));
    }

    public function update(Request $request, AppUser $appUser)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('app_users')->ignore($appUser->id_user, 'id_user')],
            'password' => 'nullable|string|min:8',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'role' => 'required|in:Attendee,Organizer,Admin',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $appUser->update($validated);
        return redirect()->route('app_users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(AppUser $appUser)
    {
        $appUser->delete();
        return redirect()->route('app_users.index')->with('success', 'User deleted successfully.');
    }
}