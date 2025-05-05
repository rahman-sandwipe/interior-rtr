<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'bio',
        'website',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }
}
