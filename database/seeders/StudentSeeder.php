<?php

namespace Database\Seeders;

use App\Models\Schools;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = Schools::all();

        foreach ($schools as $school) {
            Student::factory(10)->create([
                'school_id' => $school->id,
            ]);
        }
    }
}
