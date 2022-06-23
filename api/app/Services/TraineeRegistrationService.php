<?php
declare(strict_types=1);
namespace App\Services;

use App\Events\TraineeRegistered;
use App\Models\User;
use App\Repositories\TraineeRegistrationRepository;
use Illuminate\Support\Facades\Log;

class TraineeRegistrationService
{
    private TraineeRegistrationRepository $traineeRegistrationRepo;

    public function __construct()
    {
        $this->traineeRegistrationRepo = new TraineeRegistrationRepository();
    }

    public function createUser(array $data): User|bool
    {
        try {
            $user = $this->traineeRegistrationRepo->createUser($data);
            event(new TraineeRegistered($user));
            return $user;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), [
                'Trace' => $exception->getTrace()
            ]);
            return false;
        }
    }
}
