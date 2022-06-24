<?php
declare(strict_types=1);
namespace App\Services;

use App\Events\TraineeRegisteredEvent;
use App\Http\Resources\UserResource;
use App\Repositories\TraineeRegistrationRepository;

class UserRegistrationService
{
    private TraineeRegistrationRepository $traineeRegistrationRepo;

    public function __construct()
    {
        $this->traineeRegistrationRepo = new TraineeRegistrationRepository();
    }

    public function createTrainee(array $data): array|bool
    {
        if ($user = $this->traineeRegistrationRepo->createUser($data)) {
            event(new TraineeRegisteredEvent($user));
            return [
                'auth_token' => $user->createToken(config('auth.token_name'))->plainTextToken,
                'user' => UserResource::make($user)
            ];
        }
        return false;
    }
}
