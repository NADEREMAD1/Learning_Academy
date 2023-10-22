<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Front\CourseController;
use App\Http\Controllers\Front\MessagesController;
use Illuminate\Support\Facades\Route;

// HomepageController group

Route::controller(HomepageController::class)->group(function () {

    Route::get('/', 'index')->name('front.homepage');
});

Route::controller(CourseController::class)->group(function () {

    // show All Courses
    Route::get('/cat/{id}', 'cat')->name('front.cat');

    // show only Courses

    Route::get('/cat/{id}/courses/{c_id}', 'show')->name('front.show');

});

// HomepageController group

Route::controller(ContactController::class)->group(function () {

    Route::get('/contact', 'index')->name('front.contact');

});

Route::controller(MessagesController::class)->group(function () {


    Route::POST('/message/newsletter', 'newsletter')->name('front.message.newsletter');

    Route::POST('/message/contact', 'contactMessage')->name('front.message.contact');

    Route::POST('/message/enroll', 'enroll')->name('front.message.enroll');
});


    // Admin Web
Route::controller(AdminController::class)->group(function () {

    // Route::get('/dashboard', 'index')->name('admin.home')->middleware(['adminAuth','admin']);
});

// Auth Controller
    Route::controller(AuthController::class)->prefix('dashboard')->group(function () {
        // 
        Route::get('/login', 'login')->name('admin.login');

        Route::post('/dashboard/do-login', 'doLogin')->name('admin.doLogin');

        Route::get('/', 'index')->name('admin.home')->middleware(['adminAuth','admin']);

    Route::get('/dashboard/logout', 'logout')->name('admin.logout')->middleware(['adminAuth','admin']);

});


