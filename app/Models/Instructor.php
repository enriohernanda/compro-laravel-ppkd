<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'image',
        'name',
        'major',
        'social',
        'sosmed_urls'
    ];

    protected $casts = [
        'social' => 'array',
        'sosmed_urls' => 'array'
    ];
}
