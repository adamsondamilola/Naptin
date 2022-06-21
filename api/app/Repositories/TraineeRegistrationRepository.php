<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TraineeRegistrationRepository
{

    /**
     * @param array $data
     * @throws \Exception
     * @return bool
     */
    public function createUser(array $data): bool
    {
        DB::transaction(function() use($data) {
            $userDetail = new UserDetail();
            $userDetail->first_name = strtolower($data['firstName']);
            $userDetail->surname = strtolower($data['surname']);
            $userDetail->birth_date = new Carbon($data['dateOfBirth']);
            $userDetail->gender = strtolower($data['gender']);
            $userDetail->phone_number = $data['phoneNumber'];
            $userDetail->save();

            $user = new User();
            $user->uuid = Str::uuid()->toString();
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->user_detail_id = $userDetail->id;
            $user->save();
        });
        return true;
    }
}
