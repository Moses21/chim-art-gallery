<?php
namespace App\Http\Controllers;

use App\Models\EventTicket;
use App\Http\Resources\EventTicketResource;
use Illuminate\Http\Request;

/**
 * @group Event Tickets
 * @package  App\Http\Controllers
 */

class EventTicketController extends Controller
{
    /**
     * List all tickets for an event
     *
     * @param  int  $eventId
     * @return \Illuminate\Http\Response
     */
    public function index($eventId)
    {
        // Retrieve all tickets for the given event
        $tickets = EventTicket::where('event_id', $eventId)->get();

        // Return the collection of tickets as resources
        return EventTicketResource::collection($tickets);
    }

    /**
     * Show a specific ticket
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve a specific ticket by its id
        $ticket = EventTicket::findOrFail($id);

        // Return the ticket as a resource
        return new EventTicketResource($ticket);
    }

    // Store a new ticket
    public function store(Request $request)
    {
        $ticket = EventTicket::create([
            'event_id' => $request->event_id,
            'ticket_type_id' => $request->ticket_type_id,
        // Create a new ticket
        // The ticket belongs to the given event
        // The ticket has the given ticket type
        // The ticket is assigned to the given user
        // The ticket has the given price
        // The ticket has the given status (default is 'pending')
            'user_id' => $request->user_id,
            'price' => $request->price,
            'status' => $request->status ?? 'pending',
        ]);

        return new EventTicketResource($ticket);
    }

    /**
     * Update an existing ticket
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Retrieve a specific ticket by its id
        $ticket = EventTicket::findOrFail($id);

        // Update the ticket with the given price and status
        // The price and status are updated in the database
        $ticket->update($request->only('price', 'status'));

        // Return the ticket as a resource
        return new EventTicketResource($ticket);
    }

    /**
     * Delete a ticket
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a specific ticket by its id
        $ticket = EventTicket::findOrFail($id);

        // Delete the ticket
        // The ticket is removed from the database
        $ticket->delete();

        // Return a JSON response with a success message
        // The message is a string that is returned to the client
        return response()->json(['message' => 'Ticket deleted successfully']);
    }
}
