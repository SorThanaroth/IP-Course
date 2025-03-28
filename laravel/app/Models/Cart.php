<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    //
    use SoftDeletes;
    protected $table = ['carts'];
    protected $fillable = ['quantity', 'product_id', 'customer_id'];
    protected $dates = ['deleted_at']; // Ensure deleted_at is treated as a date

    public function product() {
        return $this->belongTo(Product::class);
    }
    public function customer() {
        return $this->belongTo(Customer::class);
    }
}
