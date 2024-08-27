<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use App\Http\Requests\StoreTicketTypeRequest;
use App\Http\Requests\UpdateTicketTypeRequest;
use Illuminate\Http\Request;

/**
 * @group Ticket Types Management
 *
 * API endpoints for managing ticket types.
 */
class TicketTypeController extends Controller
{
    /**
     * Display a listing of the ticket types.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketTypes = TicketType::all();
        return response()->json($ticketTypes);
    }

    /**
     * Show the form for creating a new ticket type.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // If you're using a web form, you could return a view here.
        return view('ticket_types.create');
    }

    /**
     * Store a newly created ticket type in storage.
     *
     * @param  \App\Http\Requests\StoreTicketTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketTypeRequest $request)
    {
        $ticketType = TicketType::create($request->validated());
        return response()->json(['message' => 'Ticket Type created successfully', 'ticketType' => $ticketType]);
    }

    /**
     * Display the specified ticket type.
     *
     * @param  \App\Models\TicketType  $ticketType
     * @return \Illuminate\Http\Response
     */
    public function show(TicketType $ticketType)
    {
        return response()->json($ticketType);
    }

    /**
     * Show the form for editing the specified ticket type.
     *
     * @param  \App\Models\TicketType  $ticketType
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketType $ticketType)
    {
        // If you're using a web form, you could return a view here.
        return view('ticket_types.edit', compact('ticketType'));
    }

    /**
     * Update the specified ticket type in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketTypeRequest  $request
     * @param  \App\Models\TicketType  $ticketType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketTypeRequest $request, TicketType $ticketType)
    {
        $ticketType->update($request->validated());
        return response()->json(['message' => 'Ticket Type updated successfully', 'ticketType' => $ticketType]);
    }

    /**
     * Remove the specified ticket type from storage.
     *
     * @param  \App\Models\TicketType  $ticketType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketType $ticketType)
    {
        $ticketType->delete();
        return response()->json(['message' => 'Ticket Type deleted successfully']);
    }
}
