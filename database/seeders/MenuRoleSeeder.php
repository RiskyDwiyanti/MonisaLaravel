<?php

namespace Database\Seeders;

use App\Models\MenuRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuRole::insert([
            [
                'menu_id'=>1,
                'role_id'=>1,
            ],
            [
                'menu_id'=>2,
                'role_id'=>1,
            ],
            [
                'menu_id'=>3,
                'role_id'=>1,
            ],
        ]);
    }
}
