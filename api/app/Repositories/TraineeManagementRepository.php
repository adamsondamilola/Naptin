<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Enums\UserType;
use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TraineeManagementRepository
{
    public function getAllApplicants(): LengthAwarePaginator
    {
        return Application::with('user:id,uuid,email', 'user.detail:user_id,first_name,surname', 'course:id,uuid,title')->paginate(config('app.paginate'));
    }
}
