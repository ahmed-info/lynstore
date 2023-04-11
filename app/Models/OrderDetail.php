<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function order()
    {
        return $this->belongs(Order::class);
    }

    public function productColorSize()
    {
        return $this->belongsTo(ProductColorSize::class);
    }

}
