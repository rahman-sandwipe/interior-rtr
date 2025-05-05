<?php

namespace App\Models;
use App\Models\UserInfo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'avatar',
        'password',
        'visibility',
        'role',
        'otp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'otp' => 'nullable',
        ];
    }
    /**
     * The attributes that should be appended to the model's array form.
     *
     * @return array<string>
     */
    public function user() {
        return $this->hasMany(UserInfo::class, 'user_id', 'user_id');
    }
}
