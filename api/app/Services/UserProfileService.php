<?php
declare(strict_types=1);
namespace App\Services;

use App\Http\GenerahPayload;
use App\Repositories\RelationshipRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;

class UserProfileService
{

    public function __construct(
        private readonly GenerahPayload $payload,
        private readonly UserRepository $userRepository,
        private readonly RelationshipRepository $relationshipRepository
    ) {
    }

    public function updateAddress(array $data): GenerahPayload
    {
        return $this->userRepository->updateAddress($data)
            ? $this->payload->setPayload(true, 'Address successfully updated')
            : $this->payload->setPayload(false, 'Error Updating Address');
    }

    public function updateNextOfKin(array $data): GenerahPayload
    {
        $data['relationship'] = $this->relationshipRepository->getNameFromId($data['relationship']);
        return $this->userRepository->updateNextOfKin($data)
            ? $this->payload->setPayload(true, 'Next of kin successfully updated')
            : $this->payload->setPayload(false, 'Error Updating Next of kin');
    }

    public function getAllRelationship(): GenerahPayload
    {
        $relationships = $this->relationshipRepository->getAll();
        return $this->payload->setPayload(true, 'Fetched all relationships', $relationships);
    }

    public function updateKit(array $data): GenerahPayload
    {
        return $this->userRepository->updateKit($data)
            ? $this->payload->setPayload(true, 'Kit successfully updated')
            : $this->payload->setPayload(false, 'Error updating kit');
    }

    public function updateEducationLevel(array $data): GenerahPayload
    {
        if (!empty($data['document'])) {
            if ($educationLevel = $this->userRepository->getOneEducationalLevel($data['level'])) {
                Storage::delete(config('app.educational_level_document_path') .'/'. $educationLevel->document);
            }
            $data['document'] = pathinfo($data['document']->store(config('app.educational_level_document_path')), PATHINFO_BASENAME);
        }
        $this->userRepository->updateEducationLevel($data);
        return $this->payload->setPayload(true, 'Educational Level successfully updated');
    }
}
