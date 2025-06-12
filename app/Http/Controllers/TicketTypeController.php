<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;

class TicketTypeController extends Controller
{
    public function manage($event_id)
    {
        $tickets = TicketType::where('event_id', $event_id)->get();
        return view('tickets.manage', compact('tickets', 'event_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ticket' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'event_id' => 'required|exists:event,id',
        ]);

        TicketType::create($request->all());
        return redirect()->back()->with('success', '✅ Ticket added successfully.');
    }

    public function delete($id)
    {
        TicketType::findOrFail($id)->delete();
        return redirect()->back()->with('success', '🗑️ Ticket deleted.');
    }

    // ✅ جلب التذاكر حسب الحدث
    public function getByEvent($event_id)
    {
        $tickets = TicketType::where('event_id', $event_id)->get();
        return response()->json($tickets);
    }
}
