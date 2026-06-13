<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSocialMedia extends Model
{
    use HasFactory;
    protected $table = 'school_social_media';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'link',
        'type',
        'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(Schools::class, 'school_id');
    }
}
