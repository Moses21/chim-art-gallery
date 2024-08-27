<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * List all ticket types
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Return all ticket types
        return TicketType::all();
    }

    /**
     * Show a specific ticket type
     *
     * @param int $id The ID of the ticket type to show
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Find the ticket type by its ID and return it
        $ticketType = TicketType::findOrFail($id);
        return $ticketType;
    }

    /**
     * Store a new ticket type
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Create a new ticket type
        $ticketType = TicketType::create($request->only('name', 'description'));

        // Return the newly created ticket type
        return $ticketType;
    }

    /**
     * Update an existing ticket type
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the ticket type to update
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Retrieve the ticket type by its ID
        $ticketType = TicketType::findOrFail($id);

        // Update the ticket type with the new data
        $ticketType->update($request->only('name', 'description'));

        // Return the updated ticket type
        return $ticketType;
    }

    /**
     * Delete a ticket type
     *
     * @param int $id The ID of the ticket type to delete
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Retrieve the ticket type by its ID
        $ticketType = TicketType::findOrFail($id);

        // Delete the ticket type
        $ticketType->delete();

        // Return a successful response message
        return response()->json(['message' => 'Ticket Type deleted successfully']);
    }
}
