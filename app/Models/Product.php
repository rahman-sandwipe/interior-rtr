<?php

namespace App\Models;

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
        'tags'
    ];
}
