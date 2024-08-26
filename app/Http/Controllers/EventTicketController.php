<?php
namespace App\Http\Controllers;

use App\Models\EventTicket;
use App\Http\Resources\EventTicketResource;
use Illuminate\Http\Request;

class EventTicketController extends Controller
{
    // List all tickets for an event
    public function index($eventId)
    {
        $tickets = EventTicket::where('event_id', $eventId)->get();
        return EventTicketResource::collection($tickets);
    }

    // Show a specific ticket
    public function show($id)
    {
        $ticket = EventTicket::findOrFail($id);
        return new EventTicketResource($ticket);
    }

    // Store a new ticket
    public function store(Request $request)
    {
        $ticket = EventTicket::create([
            'event_id' => $request->event_id,
            'ticket_type_id' => $request->ticket_type_id,
            'user_id' => $request->user_id,
            'price' => $request->price,
            'status' => $request->status ?? 'pending',
        ]);

        return new EventTicketResource($ticket);
    }

    // Update an existing ticket
    public function update(Request $request, $id)
    {
        $ticket = EventTicket::findOrFail($id);
        $ticket->update($request->only('price', 'status'));

        return new EventTicketResource($ticket);
    }

    // Delete a ticket
    public function destroy($id)
    {
        $ticket = EventTicket::findOrFail($id);
        $ticket->delete();

        return response()->json(['message' => 'Ticket deleted successfully']);
    }
}
