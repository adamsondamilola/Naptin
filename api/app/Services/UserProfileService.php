<?php
declare(strict_types=1);
namespace App\Services;

use App\Http\GenerahPayload;
use App\Repositories\UserRepository;

class UserProfileService
{
    public function __construct(
        private readonly GenerahPayload $payload,
        private readonly UserRepository $userRepository
    ) {
    }

    public function updateAddress(array $data): GenerahPayload
    {
        return $this->userRepository->updateAddress($data)
            ? $this->payload->setPayload(true, 'Address successfully updated')
            : $this->payload->setPayload(false, 'Error Updating Address');
    }
}
