<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TraineeManagementRepository
{
    public function getAllApplicants(): LengthAwarePaginator
    {
        return User::select(['id', 'uuid', 'email', 'registration_number'])
            ->whereHas('roles', function ($query) {
                return $query->where(['name' => UserType::TRAINEE->value]);
            })
            ->with('detail:user_id,first_name,surname,phone_number')
            ->paginate(config('app.paginate'));
    }
}
