<?php
declare(strict_types=1);
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserMinInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->uuid,
            'email' => $this->resource->email,
            'registrationNumber' => $this->resource->registration_number,
            'firstName' => $this->resource->detail->first_name,
            'surname' => $this->resource->detail->surname,
            'phone' => $this->resource->detail->phone_number
        ];
    }
}
