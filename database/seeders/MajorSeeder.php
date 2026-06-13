<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::create([
            'kode_jur' => 'RPL',
            'name' => 'Rekayasa Perangkat Lunak',
            'school_id' => 1
        ]);

        Major::create([
            'kode_jur' => 'TKJ',
            'name' => 'Teknik Komputer dan Jaringan',
            'school_id' => 2
        ]);
    }
}
