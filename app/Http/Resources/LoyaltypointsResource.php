<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoyaltypointsResource extends JsonResource
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
            'id'          => $this->iUserId,
            'first_name'  => $this->vName,
            'last_name'   => $this->vLastName,
            'email'       => $this->vEmail,
            'phone'       => '+254' . $this->vPhone,
            'totalPoints' => pointBalance($this->iUserId),

        ];
    }
}
