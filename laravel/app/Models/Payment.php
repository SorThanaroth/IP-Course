<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    use HasFactory;
    protected $fillable = ['payment_date', 'payment_method', 'amount', 'order_id', 'customer_id'];
}
