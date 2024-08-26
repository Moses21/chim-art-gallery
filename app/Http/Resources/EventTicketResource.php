<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request):array
    {
        return [
            'id' => $this->id,
            'event' => new EventResource($this->whenLoaded('event')),
            'ticket_type' => new TicketTypeResource($this->whenLoaded('ticketType')),
            'user' => $this->user_id,
            'price' => $this->price,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
