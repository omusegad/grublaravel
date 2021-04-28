<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporatemealsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
            'id'             => $this->id,
            'meal_name'      => $this->meal_name,
            'meal_image_ur'  => $this->meal_image_ur,
            'description'    => $this->description,
            'inStock'        => $this->inStock,
            'price'          => $this->price
        ];
    }
}
