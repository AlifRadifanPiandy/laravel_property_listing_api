<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyCharacteristicsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'PropertyCharacteristics',
            'attributes' => [
                'price' => $this->price,
                'bedrooms' => $this->bedrooms,
                'bathrooms' => $this->bathrooms,
                'sqft' => $this->sqft,
                'price_sqft' => $this->price_sqft,
                'property_type' => $this->property_type,
                'status' => $this->property_status
            ],
        ];
    }
}
