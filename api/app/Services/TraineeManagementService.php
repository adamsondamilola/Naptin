<?php
declare(strict_types=1);
namespace App\Services;

use App\Http\GenerahPayload;
use App\Http\Resources\UserMinInfoCollection;
use App\Repositories\TraineeManagementRepository;

class TraineeManagementService
{
    public function __construct(
        private readonly GenerahPayload              $payload,
        private readonly TraineeManagementRepository $traineeManagementRepository
    ) {
    }

    public function getAllApplicants(): GenerahPayload
    {
        $data = $this->traineeManagementRepository->getAllApplicants();
        return $this->payload->setPayload(true, 'Trainee minimum data returned', new UserMinInfoCollection($data));
    }
}
