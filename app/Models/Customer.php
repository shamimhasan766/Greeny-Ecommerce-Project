<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];

    protected $guard = 'customer';
    function City(){
        return $this->belongsTo(City::class, 'city_id');
    }
    function Cart(){
        return $this->hasMany(Cart::class, 'customer_id');
    }
    function ShippingAddress(){
        return $this->hasMany(ShippingAddress::class, 'customer_id');
    }
    function Orders(){
        return $this->hasMany(Order::class, 'customer_id');
    }
    function BillingAddress(){
        return $this->hasOne(BillingAddress::class);
    }
    public function wishlists()
    {
        return $this->belongsToMany(Product::class, 'wish_lists', 'customer_id', 'product_id');
    }
}
