<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {

    $events = Event::orderBy('start_datetime', 'desc')->get();

    return response()->json($events, 200);
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|string',
        'location' => 'required|string|max:255',
        'capacity' => 'required|integer|min:1',
        'start_datetime' => 'required|date',
        'end_datetime' => 'required|date|after_or_equal:start_datetime',
        // بنشيل status من الفورم، ونخليه افتراضي
    ]);

    $event = Event::create([
        ...$validated,
        'organizer_id' => Auth::id(),     // ربط الحدث بالمستخدم الحالي
        'status' => 'pending',            // افتراضياً يكون الحدث بانتظار الموافقة
    ]);

    return response()->json([
        'message' => 'Event created successfully',
        'event' => $event
    ], 201);
}


    public function show($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        if ($event->organizer_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($event, 200);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        if ($event->organizer_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
            // لا نسمح بتعديل الحالة من قبل المستخدم
        ]);

        $event->update($validated);

        return response()->json([
            'message' => 'Event updated successfully',
            'event' => $event
        ], 200);
    }

    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        if ($event->organizer_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully'], 200);
    }



}
