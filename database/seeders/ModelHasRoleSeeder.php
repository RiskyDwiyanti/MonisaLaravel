<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // ambil user
        $user = User::find(1);

        // ambil role
        $role = Role::where('name', 'superadmin')->first();

        // assign role ke user
        $user->assignRole($role);
    }
}
