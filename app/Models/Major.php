<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'majors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_jur',
        'name',
        'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(Schools::class, 'school_id');
    }
}
