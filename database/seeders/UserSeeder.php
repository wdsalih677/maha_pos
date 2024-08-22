<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Ahmed Mohamed',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role_name' => 'admin',
            'status' => 1,
            ]);

        $role = Role::create(['name' => 'admin']);
        $permission = Permission::pluck('id','id')->all();
        $role->syncPermissions($permission);
        $user->assignRole($role->id);
    }
}
