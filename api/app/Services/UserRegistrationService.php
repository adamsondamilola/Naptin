<?php
declare(strict_types=1);
namespace App\Services;

use App\Enums\UserType;
use App\Events\TraineeRegisteredEvent;
use App\Http\GenerahPayload;
use App\Repositories\UserRepository;

class UserRegistrationService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly AuthenticationService $authService,
        private readonly GenerahPayload $payload
    ) {
    }

    public function createUser(array $data): GenerahPayload
    {
        if ($user = $this->userRepository->createUser($data)) {
            if ($data['userType'] === UserType::getTrainer()) {
                $user->assignRole([UserType::getTrainer()]);
            } elseif ($data['userType'] === UserType::getTrainee()) {
                $user->assignRole([UserType::getTrainee()]);
            }

            event(new TraineeRegisteredEvent($user));
            $message = ucfirst($data['userType']) . ' Successfully Registered';
            $data = $this->authService->userDetailWithRoleAndPermissions($user);
            $this->payload->setPayload(true, $message, $data);
        } else {
            $this->payload->setPayload(true, 'Registration failed');
        }
        return $this->payload;
    }
}
