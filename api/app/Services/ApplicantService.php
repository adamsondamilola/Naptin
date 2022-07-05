<?php

namespace App\Services;

use App\Http\GenerahPayload;
use App\Http\Resources\ApplicantResource;
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
        if ($this->applicantRepository->hasTraineeAlreadyApplied($course->id, auth()->id())) {
            return $this->payload->setPayload(false, 'There is already an application for this course');
        }
        $application = $this->applicantRepository->createApplication($course->id, auth()->id());
        return $this->payload->setPayload(true, 'Application successful', ApplicantResource::make($application));
    }

    public static function generateApplicationNumber(): string
    {
        return 'APP-' . time() . rand(pow(10, 2), pow(10, 3)-1);
    }
}
