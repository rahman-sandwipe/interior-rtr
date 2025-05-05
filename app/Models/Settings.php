<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'DeveloperNumber',
        'DeveloperEmail',
        'AuthorNumber',
        'AuthorEmail',
        'Description',
        'Developer',
        'DarkLogo',
        'Tagline',
        'Favicon',
        'Author',
        'Title',
        'Logo',
        'Tags',
    ];
}
