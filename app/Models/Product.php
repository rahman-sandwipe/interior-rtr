<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'sku',
        'category',
        'title',
        'description',
        'weight',
        'quantity',
        'stock',
        'cost_price',
        'saleing_price',
        'tax',
        'descount_type',
        'descount',
        'profit',
        'images',
        'visibility',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
    
    public function orders() {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity', 'price', 'discount', 'total');
    }
}
