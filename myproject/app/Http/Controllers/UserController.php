<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $users = AppUser::paginate($perPage);

        if ($request->wantsJson()) {
            return response()->json([
                'data' => $users->items(),
                'meta' => [
                    'current_page' => $users->currentPage(),
                    'per_page' => $users->perPage(),
                    'total' => $users->total(),
                    'last_page' => $users->lastPage()
                ]
            ], 200);
        }

        return view('app_users.index', compact('users'));
    }

    public function create()
    {
        return response()->json([
            'message' => 'This endpoint is intended for web views. Use POST /api/app-users to create a user.'
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|string|in:Male,Female',
            'age' => 'nullable|integer|min:0',
            'role' => 'nullable|string|in:Admin,Organizer,Attendee',
        ]);

        $user = AppUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'gender' => $validated['gender'],
            'age' => $validated['age'],
            'role' => $validated['role'],
        ]);

        return response()->json([
            'message' => 'App user created successfully!',
            'user' => $user
        ], 201);
    }

    public function edit(string $id)
    {
        $user = AppUser::findOrFail($id);

        return response()->json([
            'message' => 'User data retrieved for editing.',
            'user' => $user
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $user = AppUser::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:app_users,email,' . $user->id_user . ',id_user',
            'password' => 'nullable|string|min:8',
            'gender' => 'required|string|in:Male,Female',
            'age' => 'nullable|integer|min:0',
            'role' => 'nullable|string|in:Admin,Organizer,Attendee',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'age' => $validated['age'],
            'role' => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = bcrypt($validated['password']);
        }

        $user->update($data);

        return response()->json([
            'message' => 'App user updated successfully!',
            'user' => $user
        ], 200);
    }

    public function destroy(string $id)
    {
        $user = AppUser::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'App user deleted successfully!',
            'success' => true
        ], 200);
    }
}