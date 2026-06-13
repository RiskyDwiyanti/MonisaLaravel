<?php

namespace Database\Seeders;

use App\Models\SchoolMapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolMapel::create([
            'school_id' => 1,
            'master_mapel_id' => 2
        ]);

        SchoolMapel::create([
            'school_id' => 1,
            'master_mapel_id' => 3
        ]);

        SchoolMapel::create([
            'school_id' => 1,
            'master_mapel_id' => 4
        ]);


        SchoolMapel::create([
            'school_id' => 2,
            'master_mapel_id' => 3
        ]);

        SchoolMapel::create([
            'school_id' => 2,
            'master_mapel_id' => 4
        ]);

        SchoolMapel::create([
            'school_id' => 2,
            'master_mapel_id' => 2
        ]);
    }
}
