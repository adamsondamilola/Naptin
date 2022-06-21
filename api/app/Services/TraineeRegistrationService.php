<?php
declare(strict_types=1);
namespace App\Services;

use App\Repositories\TraineeRegistrationRepository;
use Illuminate\Support\Facades\Log;

class TraineeRegistrationService
{
    private TraineeRegistrationRepository $traineeRegistrationRepo;

    public function __construct()
    {
        $this->traineeRegistrationRepo = new TraineeRegistrationRepository();
    }

    public function createUser(array $data): bool
    {
        try {
            return $this->traineeRegistrationRepo->createUser($data);
        }catch (\Exception $exception) {
            Log::critical($exception->getMessage(), [
                'Trace' => $exception->getTrace()
            ]);
            return false;
        }
    }
}
