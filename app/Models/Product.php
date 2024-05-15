<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    function Subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    function Brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    function Gallery(){
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }
    function Inventory(){
        return $this->hasMany(Inventory::class, 'product_id', 'id');
    }
    
    public function wishlists()
    {
        return $this->belongsToMany(Customer::class, 'wish_lists', 'product_id', 'customer_id');
    }
}
