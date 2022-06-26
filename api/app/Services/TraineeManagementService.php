<?php
declare(strict_types=1);
namespace App\Services;

use App\Http\GenerahPayload;
use App\Http\Resources\UserResource;
use App\Repositories\TraineeManagementRepository;

class TraineeManagementService
{
    public function __construct(
        private readonly GenerahPayload              $payload,
        private readonly TraineeManagementRepository $traineeManagementRepository
    ) {
    }

    public function getAllTrainees(): GenerahPayload
    {
        $data = $this->traineeManagementRepository->getAllTrainees();
        $this->payload->setPayload(success: true, data: UserResource::collection($data));
        return $this->payload;
    }
}
