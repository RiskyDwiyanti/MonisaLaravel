<?php

namespace Database\Seeders;

use App\Models\Schools;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = Schools::all();

        foreach ($schools as $school) {
            Teacher::factory(5)->create([
                'school_id' => $school->id,
            ]);
        }
    }
}
