<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    /**Culumns that are mass assignable */    
    protected $fillable = ['supplierID', 'company', 'logo', 'name', 'email', 'phone', 'address', 'status'];
}
