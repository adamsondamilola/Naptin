<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'firstName'  =>  $this->resource->first_name,
            'surname'  =>  $this->resource->surname,
            'birthDate'  =>  $this->resource->birth_date,
            'gender'  =>  $this->resource->gender,
            'phoneNumber'  =>  $this->resource->phone_number,
            'avatar'  =>  $this->resource->avatar,
            'signature'  =>  $this->resource->signature,
            'residentialAddress'  =>  $this->resource->residential_address,
            'stateOfResidence'  =>  $this->resource->state_of_residence,
            'stateOfOrigin'  =>  $this->resource->state_of_origin,
            'lgaOfOrigin'  =>   $this->resource->lga_of_origin,
            'createdAt'  =>  $this->resource->created_at
        ];
    }
}
