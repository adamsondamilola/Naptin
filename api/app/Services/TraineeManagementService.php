<?php
declare(strict_types=1);
namespace App\Services;

use App\Http\GenerahResponse;
use App\Http\Resources\UserResource;
use App\Repositories\TraineeManagementRepository;

class TraineeManagementService
{
    public function __construct(
        private readonly GenerahResponse $response,
        private readonly TraineeManagementRepository $traineeManagementRepository
    ) {
    }

    public function getAllTrainees(): GenerahResponse
    {
        $data = $this->traineeManagementRepository->getAllTrainees();
        $this->response->success = true;
        $this->response->data =  UserResource::collection($data);

        return $this->response;
    }
}
