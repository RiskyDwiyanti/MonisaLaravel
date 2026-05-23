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
            'gender' => 'male',
            'phone' => '0895801108988',
            'email' => 'devanprasetian@gmail.com',
            'email_verified_at' => now(),
            'username' => 'devanprasetian@gmail.com',
            'password' => Hash::make('Eef0w4tn')
        ]);

        User::create([
            'name' => 'Risky Dwi',
            'gender' => 'female',
            'phone' => '081234567890',
            'email' => 'risky@gmail.com',
            'email_verified_at' => now(),
            'username' => 'Risky123',
            'password' => Hash::make('risky123')
        ]);

        User::create([
            'name' => 'Jhon Doe',
            'gender' => 'male',
            'phone' => '081234567891',
            'email' => 'jhon@gmail.com',
            'email_verified_at' => now(),
            'username' => 'Jhon123',
            'password' => Hash::make('jhon123')
        ]);

    }
}
