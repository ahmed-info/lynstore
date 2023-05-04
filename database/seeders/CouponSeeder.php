<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            'code'=>'LYN200',
            'type'=>'fixed',
            'value'=>200,
            'description_en'=>'discount 200 usd',
            'description_ar'=>'discount 200 usd',
            'use_times'=>20,
            'status'=>'1',
            'start_date'=>Carbon::now(),
            'expire_date'=>Carbon::now()->addMonth(),
            'graeter_than'=>600
        ]);

        DB::table('coupons')->insert([
            'code'=>'FiftyFifty',
            'type'=>'percentage',
            'value'=>50,
            'description_en'=>'discount 50% in your sales',
            'description_ar'=>'discount 50% in your sales',
            'use_times'=>5,
            'status'=>'1',
            'start_date'=>Carbon::now(),
            'expire_date'=>Carbon::now()->addWeek(),
            'graeter_than'=>null,

        ]);
    }
}
