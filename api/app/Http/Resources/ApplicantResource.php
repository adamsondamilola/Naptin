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
            'uuid' => $this->resource->uuid,
            'applicationNumber' => $this->resource->application_number,
            'traineeId' => $this->resource->trainee_id,
            'courseId' => $this->resource->course_id,
            'applicationStatus' => $this->resource->application_status,
            'createdAt' => $this->resource->created_at,
            'updatedAt' => $this->resource->updated_at
        ];
    }
}
