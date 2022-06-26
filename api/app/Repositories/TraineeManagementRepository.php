<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TraineeManagementRepository
{
    public function getAllTrainees(): Collection
    {
        return User::whereHas('roles', function ($query) {
            return $query->where(['name' => UserType::TRAINEE->value]);
        })->get();
    }
}
