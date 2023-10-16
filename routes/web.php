<?php

use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Front\CourseController;
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



