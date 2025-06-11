<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::where('status', 'approved')->get();
    }

public function search(Request $request)
{
    $query = $request->input('q');

    try {
        return Event::where('status', 'approved')
                    ->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($query) . '%'])
                    ->get();
    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], 500);
    }
}


}
