<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['quantity', 'product_id', 'customer_id'];
    protected $dates = ['deleted_at']; // Ensure deleted_at is treated as a date
}
