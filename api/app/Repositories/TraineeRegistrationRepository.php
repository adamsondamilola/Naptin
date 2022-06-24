<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TraineeRegistrationRepository
{
    public function createUser(array $data): ?User
    {
        try {
            return DB::transaction(function() use ($data) {
                $user = new User();
                $user->uuid = Str::uuid()->toString();
                $user->email = $data['email'];
                $user->password = Hash::make($data['password']);
                $user->save();

                $userDetail = new UserDetail();
                $userDetail->user_id = $user->id;
                $userDetail->first_name = strtolower($data['firstName']);
                $userDetail->surname = strtolower($data['surname']);
                $userDetail->birth_date = new Carbon($data['dateOfBirth']);
                $userDetail->gender = strtolower($data['gender']);
                $userDetail->phone_number = $data['phoneNumber'];
                $userDetail->save();

                return $user;
            });
        }catch (\Exception $e) {
            Log::error($e->getMessage(), [
                'Trace' => $e->getTrace()
            ]);
            return null;
        }
    }
}
