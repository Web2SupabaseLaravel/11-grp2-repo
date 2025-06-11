<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\User;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketConfirmationMail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationController extends Controller
{
    public function index()
    {
        return Registration::all();
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

   public function apiStore(Request $request)
{
    try {
        $validated = $request->validate([
            'user_id' => 'required|exists:app_users,id_user',
            'event_id' => 'required|exists:event,id',
            'ticket_type_id' => 'nullable|exists:ticket_type,id',
            'status' => 'required|string',
        ]);

        $validated['registration_datetime'] = now();

        $registration = Registration::create($validated);

        // QR Code
        $qrText = "Event ID: {$registration->event_id}, Ticket Type ID: {$registration->ticket_type_id}, User ID: {$registration->user_id}";
        $qrCode = QrCode::format('svg')->size(200)->generate($qrText);

        // Email
        $user = \App\Models\User::find($registration->user_id);
        $event = Event::find($registration->event_id);
        $ticket = TicketType::find($registration->ticket_type_id);

        if ($user) {
Mail::to($user->email)->send(new TicketConfirmationMail($registration, $qrCode, $event, $ticket, $user));
        }

        return response()->json(['message' => '✅ Registration successful', 'data' => $registration], 201);
    } catch (\Throwable $e) {
        \Log::error($e);
        return response()->json(['message' => '❌ Registration failed', 'error' => $e->getMessage()], 500);
    }
}


}
