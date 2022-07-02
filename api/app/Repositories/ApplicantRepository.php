<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use App\Services\ApplicantService;
use Illuminate\Support\Str;

class ApplicantRepository
{
    public function createApplication(int $courseId, int $traineeId): Application
    {
        return Application::create([
            'uuid' => Str::uuid(),
            'application_number' => ApplicantService::generateApplicationNumber(),
            'trainee_id' => $traineeId,
            'course_id' => $courseId,
            'application_status' => ApplicationStatus::PROSPECTIVE->value
        ]);
    }

    public function hasTraineeAlreadyApplied(int $courseId, int $traineeId): bool
    {
        return (bool) Application::where(['course_id' => $courseId, 'trainee_id' => $traineeId])->count();
    }
}
