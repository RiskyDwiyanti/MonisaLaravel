<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMapel extends Model
{
    use HasFactory;
    protected $table = 'school_mapels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'school_id',
        'master_mapel_id'
    ];

    public function school()
    {
        return $this->belongsTo(Schools::class, 'school_id');
    }

    public function masterMapel()
    {
        return $this->belongsTo(MasterMapel::class, 'master_mapel_id');
    }
}
