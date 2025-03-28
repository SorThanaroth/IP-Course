<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Customer extends Model
{
    //
    use SoftDeletes;
    protected $table = 'customers';
    protected $fillable = ['name', 'email', 'address', 'phone'];

    public function carts() {
        return $this->hasMany(Cart::class);
    }
    public function wishlists() {
        return $this->hasMany(Wishlist::class);
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }
    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
