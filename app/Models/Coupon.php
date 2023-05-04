<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $dates = ['start_date','expire_date'];
    public function status()
    {
        return $this->status ? 'Active':'Inactive';
    }

}
