<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abouts extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'video',
        'vision',
        'mission'
    ];
}
