<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CorporateResource extends JsonResource
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
            'id'                      => $this->id,
            'subscriptions_name'      => $this->subscriptions_name,
            'subscriptions_image_url' => asset('public/'.$this->subscriptions_image_url),
            'email'                   => $this->email,
            'phoneNumber'             => $this->phoneNumber,
            'location'                => $this->location,
            'meals'                   => CorporatemealsResource::collection($this->Corporatemeals)

        ];
    }
}
