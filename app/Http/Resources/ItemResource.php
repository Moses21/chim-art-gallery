<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[

            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'clean_description' => strip_tags($this->description),
            'price' => 'MWK '.number_format($this->price, 2),
            'pretty_price' => $this->price,
            'created_at' => $this->created_at->diffForHumans(),
            'dimensions' => $this->dimensions,
            'avatar' => $this->getFirstMediaUrl('items'),
            'category' => $this->category ? $this->category->name : '',
        ];
    }
}
