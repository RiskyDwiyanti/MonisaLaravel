<?php

namespace Database\Seeders;

use App\Models\MasterMapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterMapel::create([
            'kode_mapel' => 'MTK',
            'name' => 'Matematika',
        ]);

        MasterMapel::create([
            'kode_mapel' => 'BHSIND',
            'name' => 'Bahasa Indonesia',
        ]);

        MasterMapel::create([
            'kode_mapel' => 'BHSING',
            'name' => 'Bahasa Inggris',
        ]);

        MasterMapel::create([
            'kode_mapel' => 'MULOK',
            'name' => 'Muatan Lokal',
        ]);

        MasterMapel::create([
            'kode_mapel' => 'IPA',
            'name' => 'Ilmu Pengetahuan Alam',
        ]);
    }
}
