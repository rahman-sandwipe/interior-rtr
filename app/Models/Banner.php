<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'bannerID',
        'title',
        'subtitle',
        'btn_link',
        'description',
        'status',
        'image',
    ];
}
