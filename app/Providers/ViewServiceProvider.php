<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cat;
use App\Models\Setting;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    public function register(): void
    {
        //من غير مككرة ف كل مكان  cats يستخدم ف اي مكان ف اي صفحة هقدر استخدم ال متغير ال اسمة  Front.inc.Header لم ملف ده 
        view()->composer('Front.inc.Header',function($view){

            $view->with('cats',Cat::select('id','name')->get());
            
            $view->with('sett',Setting::select('logo','favicon')->first());

        });

        view()->composer('Front.inc.Footer',function($view){

            $view->with('sett',Setting::select('logo','favicon','city','address','phone','fb','twitter','instagram','email')->first());
            // $view->with('sett',Setting::first());
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
