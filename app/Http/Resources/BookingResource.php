<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'user' => $this->user->phone_number,
            'date' => date('d/m/Y', strtotime($this->date)),
            'status' => $this->status === 1 ? '<span class="badge bg-primary">Hoàn thành</span>' : '<span class="badge bg-danger">Chưa hoàn thành</span>',
            'stylist' => $this->stylist->name,
        ];
    }
}
