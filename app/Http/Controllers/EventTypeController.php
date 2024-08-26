<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    // List all ticket types
    public function index()
    {
        return TicketType::all();
    }

    // Show a specific ticket type
    public function show($id)
    {
        $ticketType = TicketType::findOrFail($id);
        return $ticketType;
    }

    // Store a new ticket type
    public function store(Request $request)
    {
        $ticketType = TicketType::create($request->only('name', 'description'));
        return $ticketType;
    }

    // Update an existing ticket type
    public function update(Request $request, $id)
    {
        $ticketType = TicketType::findOrFail($id);
        $ticketType->update($request->only('name', 'description'));
        return $ticketType;
    }

    // Delete a ticket type
    public function destroy($id)
    {
        $ticketType = TicketType::findOrFail($id);
        $ticketType->delete();

        return response()->json(['message' => 'Ticket Type deleted successfully']);
    }
}
