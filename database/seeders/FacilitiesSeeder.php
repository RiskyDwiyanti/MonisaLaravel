<?php

namespace Database\Seeders;

use App\Models\Facilities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facilities::create([
            'name' => 'Perpustakaan',
            'image' => 'facilities/sch001_perpus.jpg',
            'school_id' => 1
        ]);

        Facilities::create([
            'name' => 'Kelas',
            'image' => 'facilities/sch001_perpus.jpg',
            'school_id' => 1
        ]);

        Facilities::create([
            'name' => 'Lapangan Basket',
            'image' => 'facilities/sch001_perpus.jpg',
            'school_id' => 2
        ]);

        Facilities::create([
            'name' => 'Musholla',
            'image' => 'facilities/sch001_perpus.jpg',
            'school_id' => 2
        ]);
    }
}
