<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::get();
        foreach ($permissions as $key => $value) {
            RolePermission::insert([
                'role_id' => 1,
                'permission_id' => $value->id
            ]);
        }
    }
}
