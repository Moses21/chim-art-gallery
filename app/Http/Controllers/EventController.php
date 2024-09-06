<?php


namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;

/**
 *
 * @group Events
 *@package App\Http\Controllers
 *
 */
class EventController extends Controller
{
    /**
     * Show details of a specific event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the event with its ticket types
        $event = Event::with('ticketTypes')->findOrFail($id);

        // Return the event resource
        return new EventResource($event);
    }

    /**
     * List all events
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all events with their ticket types
        // and paginate the results (can be adjusted)
        $events = Event::with('ticketTypes')->paginate(10);

        // Return the events as a resource collection
        return EventResource::collection($events);
    }

    /**
     * Store a new event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new event
        $event = Event::create($request->only('name', 'description', 'date', 'location'));

        // Attach ticket types with prices and benefits
        foreach ($request->ticket_types as $ticketType) {
            // Attach the ticket type to the event
            $event->ticketTypes()->attach($ticketType['id'], [
                // Set the price of the ticket type
                'price' => $ticketType['price'],
                // Set the benefits of the ticket type
                'benefits' => $ticketType['benefits'],
            ]);
        }

        // Return the event with its ticket types loaded
        return new EventResource($event->load('ticketTypes'));
    }

    /**
     * Update an existing event
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Update the event with the new data
        $event->update($request->only('name', 'description', 'date', 'location'));

        // Sync ticket types with prices and benefits
        $syncData = [];
        foreach ($request->ticket_types as $ticketType) {
            // Build the sync data for the ticket type
            $syncData[$ticketType['id']] = [
                // Set the price of the ticket type
                'price' => $ticketType['price'],
                // Set the benefits of the ticket type
                'benefits' => $ticketType['benefits'],
            ];
        }

        // Sync the ticket types and their data
        $event->ticketTypes()->sync($syncData);

        // Return the updated event with its ticket types
        return new EventResource($event->load('ticketTypes'));
    }

    /**
     * Delete an event
     *
     * @param  int  $id
     *  @response { "message": "Event deleted successfully"}
     *
     */
    public function destroy($id)
    {
        // Retrieve the event by its ID
        $event = Event::findOrFail($id);

        // Delete the event
        $event->delete();

        // Return a successful response message
        return response()->json(['message' => 'Event deleted successfully']);
    }
}
