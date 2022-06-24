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
            'id' => $this->resource->uuid,
            'email' => $this->resource->email,
            'detail' => UserDetailResource::make($this->resource->detail)
        ];
    }
}
