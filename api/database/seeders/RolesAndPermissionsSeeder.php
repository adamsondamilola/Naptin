<?php
declare(strict_types=1);
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'trainee management']);
        Permission::create(['name' => 'trainer management']);
        Permission::create(['name' => 'training program module management']);
        Permission::create(['name' => 'training center module']);
        Permission::create(['name' => 'training center module management']);
        Permission::create(['name' => 'messaging module management']);
        Permission::create(['name' => 'Support and helpdesk module management']);
        Permission::create(['name' => 'trainee company management module']);
        Permission::create(['name' => 'report module']);

        Role::create(['name' => 'trainee']);
        Role::create(['name' => 'trainer']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super admin']);
    }
}
