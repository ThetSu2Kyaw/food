<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            "id" => $this->id,
            "name"=> $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "password" => $this->password,
            "image" => $this->image,
            "orders" => OrderResource::collection($this->orders),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
