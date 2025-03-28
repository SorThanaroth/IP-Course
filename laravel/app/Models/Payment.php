<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;


class Payment extends Model
{
    //
    use SoftDeletes;
    protected $table = 'payments';
    protected $fillable = ['payment_date', 'payment_method', 'amount', 'order_id', 'customer_id'];

    public function order() {
        return $this->belongsTo(Order::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    protected function orderDate(): Attribute
    {
        return Attribute::make(
            // Mutator: Convert input format to MySQL format before saving
            set: fn ($value) => Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s'),
            
            // Accessor: Convert database format to user format when retrieving
            get: fn ($value) => Carbon::parse($value)->format('d-m-Y H:i:s')
        );
    }

}
