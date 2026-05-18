<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createSuperAdminUser();
    }

    private function createSuperAdminUser(): void
    {
        User::create([
            'name' => 'Devan Eka',
            'email' => 'devanprasetian@gmail.com',
            'phone' => '0895801108988',
            'username' => 'devan02',
            'role' => 'Admin',
            'password' => Hash::make('Eef0w4tn')
        ]);

        User::create([
            'name' => 'Andre',
            'email' => 'andre@berdikari.asia',
            'phone' => '085821364004',
            'username' => 'andre@berdikari.asia',
            'role' => 'Admin',
            'password' => Hash::make('berdikari2026')
        ]);

        User::create([
            'name' => 'Risky Dwi',
            'email' => 'risky@gmail.com',
            'phone' => '081234567890',
            'username' => 'Risky123',
            'role' => 'Student',
            'password' => Hash::make('risky123')
        ]);

        User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhon@gmail.com',
            'phone' => '081234567891',
            'username' => 'Jhon123',
            'role' => 'Teacher',
            'password' => Hash::make('jhon123')
        ]);
        
    }
}
