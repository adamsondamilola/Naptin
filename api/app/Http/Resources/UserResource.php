<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'uuid' => $this->resource->uuid,
            'email' => $this->resource->email,
            'regNumber' => $this->resource->registration_number,
            'firstName'  =>  $this->resource->detail->first_name,
            'surname'  =>  $this->resource->detail->surname,
            'birthDate'  =>  $this->resource->detail->birth_date,
            'gender'  =>  $this->resource->detail->gender,
            'phoneNumber'  =>  $this->resource->detail->phone_number,
            'avatar'  =>  $this->resource->detail->avatar,
            'signature'  =>  $this->resource->detail->signature,
            'residentialAddress'  =>  $this->resource->detail->residential_address,
            'stateOfResidence'  =>  $this->resource->detail->state_of_residence,
            'stateOfOrigin'  =>  $this->resource->detail->state_of_origin,
            'lgaOfOrigin'  =>   $this->resource->detail->lga_of_origin,
            'createdAt'  =>  $this->resource->detail->created_at
        ];
    }
}
