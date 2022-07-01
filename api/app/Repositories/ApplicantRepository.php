<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use App\Services\ApplicantService;
use Illuminate\Support\Str;

class ApplicantRepository
{
    public function __construct(private readonly ApplicantService $applicantService)
    {
    }

    public function createApplication(int $courseId, int $traineeId): array
    {
        return Application::create([
            'uuid' => Str::uuid(),
            'applicatin_number' => $this->applicantService->generateApplicationNumber(),
            'trainee_id' => $traineeId,
            'course_id' => $courseId,
            'Status' => ApplicationStatus::PROSPECTIVE->value
        ])->toArray();
    }
}
