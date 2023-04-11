<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create::table('users')->insert([
        //     'name' => 'ahmed razzaq',
        //     'email' => 'ahmed.razzaq.yahya@gmail.com',
        //     'password' => Hash::make('123456aa'),
        //     'phone'=>'07810085854',
        //     'address'=>'العراق بغداد المنصور'
        // ]);

        DB::table('users')->insert([
            'name' => 'ahmed razzaq',
            'email' => 'ahmed.razzaq.yahya@gmail.com',
            'password' => Hash::make('123456aa'),
            'phone' => '07810085854',
            'address'=>'العراق',
            'status'=> 'admin',
            'type'=>0,
            'activeOrNot'=>true,
        ]);
    }
}
