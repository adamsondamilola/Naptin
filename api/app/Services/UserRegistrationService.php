<?php
declare(strict_types=1);
namespace App\Services;

use App\Enums\UserType;
use App\Events\TraineeRegisteredEvent;
use App\Http\GenerahResponse;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

class UserRegistrationService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly AuthenticationService $authService,
        private readonly GenerahResponse $response
    ) {
    }

    public function createUser(array $data): GenerahResponse
    {
        if ($user = $this->userRepository->createUser($data)) {
            if ($data['userType'] === UserType::getTrainer()) {
                $user->assignRole([UserType::getTrainer()]);
            } elseif ($data['userType'] === UserType::getTrainee()) {
                $user->assignRole([UserType::getTrainee()]);
                event(new TraineeRegisteredEvent($user));
            }

            $this->response->success = true;
            $this->response->message = ucfirst($data['userType']) . ' Successfully Registered';
            $this->response->data = [
                'auth_token' => $this->authService->createAuthToken($user),
                'user' => UserResource::make($user)
            ];
        } else {
            $this->response->success = false;
            $this->response->message = 'Registration failed';
        }

        return $this->response;
    }
}
