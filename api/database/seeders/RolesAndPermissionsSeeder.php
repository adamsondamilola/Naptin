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
        Permission::create(['name' => 'training program management']);
        Permission::create(['name' => 'training center management']);
        Permission::create(['name' => 'messaging management']);
        Permission::create(['name' => 'Support and helpdesk management']);
        Permission::create(['name' => 'trainee company management']);
        Permission::create(['name' => 'report']);

        Role::create(['name' => 'trainee']);
        Role::create(['name' => 'trainer']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super admin']);
    }
}
