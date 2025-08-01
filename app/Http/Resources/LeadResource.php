<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
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
            'full_name' => $this->name . ' ' . $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country,
            'registration_date' => $this->created_at->toDateTimeString(),
        ];
    }
}
