<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    function Customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    function BillingAddress(){
        return $this->belongsTo(BillingAddress::class, 'billing_id');
    }
    function ShippingAddress(){
        return $this->belongsTo(ShippingAddress::class, 'shipping_id');
    }
    function Products(){
        return $this->hasMany(OrderProduct::class, 'order_id', 'order_id');
    }
}
