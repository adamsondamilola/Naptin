<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Relationship;

class RelationshipRepository
{

    public function getNameFromId(int $id): string
    {
        return Relationship::where(['id' => $id])->value('name');
    }

    public function getAll(): array
    {
        return Relationship::select(['id', 'name'])->get()->toArray();
    }
}
