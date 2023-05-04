<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Banner;

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
            'alt'=>'Tops',
            'status'=>1
        ]);

        DB::table('banners')->insert([
            'image'=>'banner2.png',
            'link'=>'spring-collection2',
            'title_en'=>'title banner 2 en',
            'title_ar'=>'title banner 2 ar',
            'alt'=>'discount',
            'status'=>0
        ]);
    }
}
