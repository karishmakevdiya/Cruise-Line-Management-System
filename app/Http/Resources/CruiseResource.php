<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CruiseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'ship_id' => $this->ship_id,
            'duration' => $this->duration,
            'price_tiers' => $this->price_tiers,
            'departure_date' => $this->departure_date,
            'embarkation_port_id' => $this->embarkation_port_id,
            'created_at' => $this->created_at,
        ];
        // return parent::toArray($request);
    }
}
