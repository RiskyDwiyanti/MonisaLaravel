<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class,
            ModelHasRoleSeeder::class,
            MenuSeeder::class,
            MenuRoleSeeder::class
        ]);
        // run php artisan migrate:fresh --seed : untuk me-reset table dan seeder
    }
}
