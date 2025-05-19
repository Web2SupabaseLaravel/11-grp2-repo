<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Http\Request;

class UserController extends Controller
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
                'gender' => 'nullable|string|in:Male,Female',
                'age' => 'nullable|integer|min:0',
                'role' => 'nullable|string|in:Admin,Organizer,Attendee'            ]);

        $user = AppUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'gender' => $validated['gender'],
            'age' => $validated['age'],
            'role' => $validated['role'],
        ]);

        return redirect()->route('app-users.create')->with('success', 'App user created successfully!');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
