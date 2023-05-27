<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productColor;
use App\Models\Category;
use App\Models\Order;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Supplier;

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
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function ProductOtherInfos()
    {
        return $this->hasMany(ProductOtherInfo::class,'product_id','id');
    }
    public function productColor()
    {
        return $this->hasMany(ProductColor::class, 'product_id','id');
    }
    public function productSize()
    {
        return $this->hasMany(ProductSize::class,'product_id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_product');
    }

    public function banner()
    {
        return $this->hasOne(Banner::class);
    }

}
