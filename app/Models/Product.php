<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productColor;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function productColorSize()
    {
        return $this->hasMany(ProductColorSize::class,'product_id');
    }
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }
    public function productColor()
    {
        return $this->hasMany(ProductColor::class, 'product_id','id');
    }
    public function productSize()
    {
        return $this->hasMany(ProductSize::class,'product_id');
    }

}
