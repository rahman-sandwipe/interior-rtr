<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function products() {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot('quantity', 'price', 'discount', 'total');
    }
    
    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
