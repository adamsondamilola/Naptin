<?php
declare(strict_types=1);
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ApplicantResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'applicants' => parent::toArray($request),
            'meta' => [
                'total' => $this->resource->total(),
                'count' => $this->resource->count(),
                'perPage' => $this->resource->perPage(),
                'currentPage' => $this->resource->currentPage(),
                'totalPages' => $this->resource->lastPage(),
                'nextPage' => $this->resource->nextPageUrl(),
                'previousPage' => $this->resource->previousPageUrl(),
            ]
        ];
    }
}
