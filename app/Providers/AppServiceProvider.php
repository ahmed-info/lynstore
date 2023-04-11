<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\view;
use App\Models\Setting;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!app()->runningInConsole()){
            $setting = Setting::firstOr( function(){
                return Setting::create([
                    'phone'=>'+9647508394124',
                    'whatsapp'=>'https://api.whatsapp.com/send/?phone=%2B9647509713041&text&type=phone_number&app_absent=0',
                    'instagram'=>'https://www.instagram.com/lyn.company_/?igshid=YmMyMTA2M2Y%3D',
                    'facebook'=>'https://www.facebook.com/people/Lyn-company/100090402375756/?mibextid=LQQJ4d',
                    'tiktok'=>'https://www.tiktok.com/@lyn_shpping?_t=8awKLoMNHnx&_r=1'
                ]);
            });

            view()->share('setting', $setting);
        }

    }
}
