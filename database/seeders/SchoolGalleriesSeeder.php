<?php

namespace Database\Seeders;

use App\Models\SchoolGalleries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolGalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolGalleries::create([
            'school_id' => 1,
            'name' => 'Foto Kegiatan 1',
            'link' => 'school_galleries/sch001_1.jpg',
        ]);

        SchoolGalleries::create([
            'school_id' => 2,
            'name' => 'Foto Kegiatan 2',
            'link' => 'school_galleries/sch002_1.jpg',
        ]);

        SchoolGalleries::create([
            'school_id' => 2,
            'name' => 'Foto Kegiatan 3',
            'link' => 'school_galleries/sch002_1.jpg',
        ]);
    }
}
