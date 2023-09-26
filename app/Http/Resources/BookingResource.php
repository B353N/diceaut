<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'carPlate' => $this->car_plate,
            'phone' => $this->phone,
            'hour' => $this->hour,
            'day' => $this->day,
            'service' => $this->service,
            'status' => $this->status,
        ];
    }
}