<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'parent_id' => 0,
            'title_en' => 'WOMEN',
            'title_ar' => 'نسائي',
            'image' => 'image1.jpg',
            'activeOrNot'=>1,
        ]);

        DB::table('categories')->insert([
            'parent_id' => 0,
            'title_en' => 'MEN',
            'title_ar' => 'رجالي',
            'image' => 'image1.jpg',
            'activeOrNot'=>1,

        ]);

        DB::table('categories')->insert([
            'parent_id' => 0,
            'title_en' => 'MAKEUP',
            'title_ar' => 'مكياج',
            'image' => 'image1.jpg',
            'activeOrNot'=>1,

        ]);

        DB::table('categories')->insert([
            'parent_id' => 0,
            'title_en' => 'CARE',
            'title_ar' => 'العناية بالبشرة',
            'image' => 'image1.jpg',
            'activeOrNot'=>1,

        ]);
    }
}
