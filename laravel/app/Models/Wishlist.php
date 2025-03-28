<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['product_id', 'customer_id'];

    public function products() {
        return $this->belongsTO(Product::class);
    }
    public function customers() {
        return $this->belongsTO(Customer::class);
    }

}
