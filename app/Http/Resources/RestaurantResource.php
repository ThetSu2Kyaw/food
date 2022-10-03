<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RestaurantResource extends JsonResource
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
            "township_id" => $this->township_id,
            "restaurant_category_id" => $this->restaurant_category_id,
            "name" => $this->name,
            "address" => $this->address,
            "phone" => $this->phone,
            "is_open" => $this->is_open,
            "is_promotion" => $this->is_promotion,
            "image" => $this->image,
            "image_src" => Storage::url($this->image),
            "menus" => MenuResource::collection($this->whenLoaded('menus')),
            "restaurant_category" => $this->restaurant_category,
            "township" => $this->township
        ];
    }
}
