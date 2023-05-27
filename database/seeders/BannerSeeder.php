<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Banner;
use Carbon\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'image'=>'banner1.png',
            'link'=>'spring-collection',
            'title_en'=>'title banner 1 en',
            'title_ar'=>'title banner 1 ar',
            'status'=>1,
            'expireBanner'=>Carbon::create('2023', '07', '07'),
            'discountPercentage'=>null,
            'discountAmount'=>5000,
            'brand_id'=>1,
            'product_id'=>1,
            'category_id'>1,
        ]);

        DB::table('banners')->insert([
            'image'=>'banner2.png',
            'link'=>'spring-collection2',
            'title_en'=>'title banner 2 en',
            'title_ar'=>'title banner 2 ar',
            'status'=>0,
            'expireBanner'=>Carbon::create('2023', '06', '06'),
            'discountPercentage'=>25,
            'discountAmount'=>null,
            'brand_id'=>2,
            'product_id'=>2,
            'category_id'>2,
        ]);
    }
}
