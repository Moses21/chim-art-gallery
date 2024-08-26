<?php


namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Show details of a specific event
    public function show($id)
    {
        $event = Event::with('ticketTypes')->findOrFail($id);
        return new EventResource($event);
    }

    // List all events
    public function index()
    {
        $events = Event::with('ticketTypes')->paginate(10); // Pagination can be adjusted
        return EventResource::collection($events);
    }

    // Store a new event
    public function store(Request $request)
    {
        $event = Event::create($request->only('name', 'description', 'date', 'location'));

        // Attach ticket types with prices and benefits
        foreach ($request->ticket_types as $ticketType) {
            $event->ticketTypes()->attach($ticketType['id'], [
                'price' => $ticketType['price'],
                'benefits' => $ticketType['benefits'],
            ]);
        }

        return new EventResource($event->load('ticketTypes'));
    }

    // Update an existing event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->only('name', 'description', 'date', 'location'));

        // Sync ticket types with prices and benefits
        $syncData = [];
        foreach ($request->ticket_types as $ticketType) {
            $syncData[$ticketType['id']] = [
                'price' => $ticketType['price'],
                'benefits' => $ticketType['benefits'],
            ];
        }
        $event->ticketTypes()->sync($syncData);

        return new EventResource($event->load('ticketTypes'));
    }

    // Delete an event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
