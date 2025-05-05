<?php

namespace App\Models;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{   
    /*
     * The table associated with the model.
     * 
     * @var string
     * 
    */
    protected $table = 'services';

    /*
     * The attributes that should be cast.
     * 
     * @var array<string, string>
     * 
    */
    protected $casts = [
        'price' => 'float',
    ];

    /*
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     * 
    */
    protected $fillable = [
        'service_id',
        'user_id',
        'title',
        'img',
        'price',
        'duration',
        'description',
        'visibility'
    ];

    /*
     * Get the user that owns the service.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*
     * Get the appointments for the service.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 
    */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'service_id');
    }
}
