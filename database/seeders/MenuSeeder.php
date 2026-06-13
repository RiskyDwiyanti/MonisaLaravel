<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::insert([
            [
                'name'=>'Dashboard',
                'route'=>'dashboard',
                'icon'=>'fas fa-home',
                'parent_id'=>null,
                'order'=>1
            ],
            [
                'name'=>'User Management',
                'route'=>null,
                'icon'=>'fas fa-users',
                'parent_id'=>null,
                'order'=>2
            ],
            [
                'name'=>'Users',
                'route'=>'users.index',
                'icon'=>'fas fa-user',
                'parent_id'=>2,
                'order'=>1
            ],
            [
                'name'=>'Roles',
                'route'=>'roles.index',
                'icon'=>'fas fa-user-tag',
                'parent_id'=>2,
                'order'=>2
            ],
        ]);
    }
}
