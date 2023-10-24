Asst => public فانكشن بتجبلي الحجات ال جوة ال public

model category
model corses
model trainer
model students


-- مفيش لوج ان للطالب وفي لوج ان للادمن
-- لكاتوجري جواها اكتر من كورس والكورس بيكون في كاتوجري واحدة العلاقة m-1

--   Cat -> m => corses -> 1

--   1 trainer -> m curses

--   m student -> m curses

--   corses m -> student m

// بسختدمة لو عايز اخلي الابلكيشن كلة يشوف حاجه معينة

php artisan make:provider ViewServiceProvider -> Create New Providers

// fun create Provider

-*- app -> ProviderName

public function register(): void
         {
        //من غير مككرة ف كل مكان  cats يستخدم ف اي مكان ف اي صفحة هقدر استخدم ال متغير ال اسمة  Front.inc.Header لم ملف ده
        view()->composer('Front.inc.Header',function($view){

            $view->with('cats',Cat::select('id','name')->get());

        });
    }

// Provider لازم اعرف الابلكيشن اني شغال بال
-*- config ->  app.php

 ->  App\Providers\ViewServiceProvider::class,

------------------
<header class="main_menu @if (Route::currentRouteName() == 'front.homepage') home_menu @else single_page_menu @endif">

// single_page_menu غير كده خلية  home_menu خليلي الناف بار  homepage بقولو لو انتا ف روت اسمة
------------------------
--  protected $guarded =['id']; بستخدمه ف اي

 =======================================
 instal Library intervention img

1-  composer require intervention/image => مكتبة خاصة برفع الصور

2- config => app.php =>
-- $providers
=> Intervention\Image\ImageServiceProvider::class
-- $aliases
=> 'Image' => Intervention\Image\Facades\Image::class

-*- ال form لم بيكون في رفع صور لازم اديلو تاج ال  enctype="multipart/form-data"



