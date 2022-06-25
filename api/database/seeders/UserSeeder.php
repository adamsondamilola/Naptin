<?php
declare(strict_types=1);
namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $superAdmin = User::factory()->create([
            'email' => 'superAdmin@example.com'
        ]);

        $userDetail = new UserDetail();
        $userDetail->first_name = 'admin';
        $userDetail->surname = 'super';
        $userDetail->user_id = $superAdmin->id;
        $userDetail->save();

        $superAdmin->assignRole(UserType::SUPER_ADMIN->value);
    }
}
