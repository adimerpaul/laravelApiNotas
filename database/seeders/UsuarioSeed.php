<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        $permissionCreate = Permission::create(['name' => 'create']);
        $permissionRead = Permission::create(['name' => 'read']);
        $permissionUpdate = Permission::create(['name' => 'update']);
        $permissionDelete = Permission::create(['name' => 'delete']);

        $user->givePermissionTo($permissionCreate);
        $user->givePermissionTo($permissionRead);
        $user->givePermissionTo($permissionUpdate);
        $user->givePermissionTo($permissionDelete);
    }
}
