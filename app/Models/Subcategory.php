<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    function Products(){
        return $this->hasMany(Product::class, 'subcategory_id');
    }
}
