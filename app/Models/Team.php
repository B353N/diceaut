<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;


    protected $fillable = [
        'language_id',
        'photo_id',
        'name',
        'position',
        'facebook',
        'instagram',
        'linkedin',
    ];

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo', 'photo_id');
    }
}
