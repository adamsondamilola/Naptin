<?php
declare(strict_types=1);
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'applicationUuid' => $this->resource->uuid,
            'traineeUuid' => $this->resource->user->uuid,
            'email' => $this->resource->user->email,
            'firstName' => $this->resource->user->detail->first_name,
            'surname' => $this->resource->user->detail->surname,
            'applicationNumber' => $this->resource->application_number,
            'courseUuid' => $this->resource->course->uuid,
            'courseTitle' => $this->resource->course->title,
            'applicationStatus' => $this->resource->application_status,
            'createdAt' => $this->resource->created_at,
            'updatedAt' => $this->resource->updated_at
        ];
    }
}
