<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    use HasFactory;
    protected $table = 'schools';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_sekolah',
        'nama',
        'alamat_lengkap',
        'provinsi',
        'kota_kabupaten',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'latitude',
        'longitude',
        'no_telepon',
        'email',
        'link_website',
        'photo'
    ];

    public function galleries()
    {
        return $this->hasMany(SchoolGalleries::class, 'school_id');
    }

    public function socialMedia()
    {
        return $this->hasMany(SchoolSocialMedia::class, 'school_id');
    }

    public function majors()
    {
        return $this->hasMany(Major::class, 'school_id');
    }

    public function schoolMapels()
    {
        return $this->hasMany(SchoolMapel::class, 'school_id');
    }

    public function facilities()
    {
        return $this->hasMany(Facilities::class, 'school_id');
    }
}
