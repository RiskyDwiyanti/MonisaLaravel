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
        $user = User::create([
            'name' => 'Devan Eka',
            'email' => 'devanprasetian@gmail.com',
            'phone' => '0895801108988',
            'username' => 'devan02',
            'role' => 'Admin',
            'password' => Hash::make('Eef0w4tn')
        ]);

        $user2 = User::create([
            'name' => 'Andre',
            'email' => 'andre@berdikari.asia',
            'phone' => '085821364004',
            'username' => 'andre@berdikari.asia',
            'role' => 'Siswa',
            'password' => Hash::make('berdikari2026')
        ]);

        // Get or create superadmin role and assign permission to it
        Role::firstOrCreate(
            ['name' => 'superadmin', 'guard_name' => 'web']
        );

        $user->assignRole('superadmin');
        $user2->assignRole('superadmin');

        $this->command->info('✓ Superadmin user created: ' . $user->email);
        $this->command->info('✓ Superadmin user created: ' . $user2->email);
    }
}
