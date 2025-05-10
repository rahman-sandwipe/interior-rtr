<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    // Customer fillable
    protected $fillable = ['customer_id', 'avatar', 'name', 'email', 'phone', 'address', 'status'];

    // Customer model
    public function orders() {
        return $this->hasMany(Order::class);
    }
}
