<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'restaurant_id' => $this->restaurant_id,
            'total' => $this->total,
            'remark' => $this->remark,
            'created_at' => $this->created_at->format('d/m/y h:i a'),
            'restaurant' => new RestaurantResource($this->restaurant),
            'order_details' => OrderDetailResource::collection($this->order_details)
        ];
    }
}
