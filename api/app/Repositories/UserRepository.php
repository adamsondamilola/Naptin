<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Kit;
use App\Models\NextOfKin;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserRepository
{
    public function getById(int $id): ?User
    {
        return User::find($id);
    }

    public function getByEmail(string $email): ?User
    {
        return User::whereEmail($email)->first();
    }

    public function getByUuid(string $uuid): ?User
    {
        return User::whereUuid($uuid)->first();
    }

    public function createUser(array $data): ?User
    {
        try {
            return DB::transaction(function () use ($data) {
                $user = new User();
                $user->uuid = Str::uuid()->toString();
                $user->email = $data['email'];
                $user->registration_number = $data['registrationNumber'];
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
        } catch (\Exception $e) {
            Log::error($e->getMessage(), [
                'Trace' => $e->getTrace()
            ]);
            return null;
        }
    }

    public function updateAddress(array $data): bool
    {
        return (bool)UserDetail::whereUserId(Auth::id())->update([
            'state_of_residence' => $data['stateOfResidence'],
            'lga_of_residence' => $data['lgaOfResidence'],
            'state_of_origin' => $data['stateOfOrigin'],
            'lga_of_origin' => $data['lgaOfOrigin'],
            'residential_address' => $data['homeAddress']
        ]);
    }

    public function updateNextOfKin(array $data): bool
    {
        $nextOfKin = NextOfKin::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'first_name' => $data['firstName'],
                'surname' => $data['surname'],
                'relationship' => $data['relationship'],
                'address' => $data['address'],
                'phone_number' => $data['phoneNumber']
            ]
        );

        return $nextOfKin->exists;
    }

    public function updateKit(array $data): bool
    {
        $nextOfKin = Kit::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'shoe_size' => $data['shoeSize'],
                'overall_size' => $data['overallSize'],
                't_shirt_size' => $data['tShirtSize']
            ]
        );

        return $nextOfKin->exists;
    }
}
