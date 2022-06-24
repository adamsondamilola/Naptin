<?php
declare(strict_types=1);
namespace App\Services;

use App\Enums\UserType;
use App\Events\TraineeRegisteredEvent;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

class UserRegistrationService
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function createTrainee(array $data): array|bool
    {
        if ($user = $this->userRepository->createUser($data)) {
            if ($data['userType'] === UserType::getTrainer()) {
                //TODO:: Assign Trainer Role and Set Permissions
            }
            event(new TraineeRegisteredEvent($user));
            return [
                'auth_token' => $user->createToken(config('auth.token_name'))->plainTextToken,
                'user' => UserResource::make($user)
            ];
        }
        return false;
    }
}
