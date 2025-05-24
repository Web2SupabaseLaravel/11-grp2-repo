<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::all();
        return view('registration.index', compact('registrations'));
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'user_id' => 'required|exists:app_users,id_user',
            'event_id' => 'required|exists:event,id',
            'status' => 'required|string|in:Confirmed,Cancelled,Transferred',
            'registration_datetime' => 'required|date_format:Y-m-d\TH:i',
        ]);

        Registration::create($validated);

        return redirect()->route('registration.create')->with('success', 'Registration created successfully!');
    }

    public function show($id)
    {
        return Registration::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);

        $validated = $request->validate([
            'status' => 'sometimes|string|in:Confirmed,Cancelled,Transferred',
            'registration_datetime' => 'sometimes|date',
        ]);

        $registration->update($validated);
        return response()->json(['message' => 'Updated', 'data' => $registration]);
    }

    public function destroy($id)
    {
        Registration::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
