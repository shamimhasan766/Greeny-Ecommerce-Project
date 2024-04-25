<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    function Subcategory(){
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }
    function Products(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
