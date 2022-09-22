<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenusResource extends JsonResource
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
            'menu_category' => $this->menuCategory,
            'restaurant' => $this->restaurant,
            'name' => $this->name, 
            'description' => $this->description,
            'price' => $this->price
        ];
    }
}
