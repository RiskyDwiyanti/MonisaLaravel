<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMapel extends Model
{
    use HasFactory;
    protected $table = 'master_mapels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_mapel',
        'name'
    ];

    public function schoolMapels()
    {
        return $this->hasMany(SchoolMapel::class, 'master_mapel_id');
    }
}
