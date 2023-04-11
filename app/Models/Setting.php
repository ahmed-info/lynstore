<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function checkSetting()
    {
        $settings = Self::all();
        if(count($settings) <1){
            $data = [
                'id'=>1,
            ];
            foreach(config('app.languages') as $key=>$value){
                $data[$key]['title'] = $value;
            }
            Self::create($data);
        }
        return Self::first();
    }
}
