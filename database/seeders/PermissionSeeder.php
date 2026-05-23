<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            [
                'name' => 'user-view',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user-update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user-delete',
                'guard_name' => 'web'
            ],
        ]);
    }
}
