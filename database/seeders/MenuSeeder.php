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
                'route'=>'dashboard.index',
                'icon'=>'fas fa-home',
                'parent_id'=>null,
                'order'=>1
            ],
            [
                'name'=>'Settings',
                'route'=>null,
                'icon'=>'fas fa-users',
                'parent_id'=>null,
                'order'=>2
            ],
            [
                'name'=>'Menus',
                'route'=>'menus.index',
                'icon'=>'fas fa-user',
                'parent_id'=>2,
                'order'=>1
            ],
        ]);
    }
}
