<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;
    protected $table = 'orders';
    protected $fillable = ['order_date', 'total_price', 'customer_id'];
    protected $date = ['deleted_at'];

    
    protected function orderDate(): Attribute
    {
        return Attribute::make(
            // Mutator: Convert input format to MySQL format before saving
            set: fn ($value) => Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s'),
            
            // Accessor: Convert database format to user format when retrieving
            get: fn ($value) => Carbon::parse($value)->format('d-m-Y H:i:s')
        );
    }

    public function order_Products() {
        return $this->hasMany(OrderProduct::class);
    }
    public function payments() {
        return $this->hasMany(Payment::class);
    }
    public function customers() {
        return $this->belongsTO(Customer::class);
    }
}
