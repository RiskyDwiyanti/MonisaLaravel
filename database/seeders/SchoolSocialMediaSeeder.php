<?php

namespace Database\Seeders;

use App\Models\SchoolSocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolSocialMedia::create([
            'name' => 'YouTube SMA Negeri 1 Percobaan',
            'link' => 'https://www.youtube.com/channel/UC1234567890',
            'type' => 'yt',
            'school_id' => 1
        ]);

        SchoolSocialMedia::create([
            'name' => 'Tiktok SMA Negeri 2 Percobaan',
            'link' => 'https://www.tiktok.com/@sman2percobaan',
            'type' => 'tiktok',
            'school_id' => 2
        ]);
    }
}
