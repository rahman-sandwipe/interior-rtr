<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['auth_id','Title','Link','Icon','Status'];
}
