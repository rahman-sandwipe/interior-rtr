<?php

namespace App\Models;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'service_id',
        'user_id',
        'title',
        'img',
        'starting_price',
        'duration',
        'description',
        'visibility'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'service_id');
    }
}
