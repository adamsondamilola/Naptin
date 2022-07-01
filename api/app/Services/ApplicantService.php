<?php

namespace App\Services;

use App\Http\GenerahPayload;
use App\Repositories\ApplicantRepository;
use App\Repositories\CourseRepository;

class ApplicantService
{
    public function __construct(
        private readonly CourseRepository $courseRepository,
        private readonly ApplicantRepository $applicantRepository,
        private readonly GenerahPayload $payload
    ) {
    }
    public function createApplication(string $courseUuid): GenerahPayload
    {
        $course = $this->courseRepository->getByUuid($courseUuid);
        $application = $this->applicantRepository->createApplication($course->id, auth()->id());
        return $this->payload->setPayload(true, 'Application successful', $application);
    }

    public function generateApplicationNumber(): string
    {
        return 'APP-' . time() . rand(pow(10, 2), pow(10, 3)-1);
    }
}
