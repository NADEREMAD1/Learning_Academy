<?php

use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Front\CourseController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\MessagesController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CatController;
use App\Http\Controllers\admin\CoursesController;
use App\Http\Controllers\admin\StudentsController;
use App\Http\Controllers\admin\TrainerController;
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
        Route::get('/', 'index')->name('admin.home');

        Route::get('/login', 'login')->name('admin.login');

        Route::post('/do-login', 'doLogin')->name('admin.doLogin');

        Route::get('/dashboard/logout', 'logout')->name('admin.logout');
        // ->middleware(['adminAuth','admin'])
    });

    Route::controller(CatController::class)->prefix('dashboard')->group(function () {

            // Route::middleware(['adminAuth','admin'])->group(function(){

                Route::get('/cats', 'index')->name('admin.cats.index');

                Route::get('/cats/create', 'create')->name('admin.cats.create');

                Route::post('/cats/store', 'store')->name('admin.cats.store');

                Route::get('/cats/edit/{id}', 'edit')->name('admin.cats.edit');

                Route::post('/cats/update', 'update')->name('admin.cats.update');

                Route::get('/cats/delete/{id}', 'delete')->name('admin.cats.delete');

                // });

});

    //  Start Trainer Route
Route::controller(TrainerController::class)->prefix('dashboard')->group(function () {

        // Route::middleware(['adminAuth','admin'])->group(function(){

             // select  Trainer info
            Route::get('/trainers', 'index')->name('admin.trainers.index');

            // Start Show Table Trainer
           Route::post('/trainers/store', 'store')->name('admin.trainers.store');

           // create trainers
            Route::get('/trainers/create', 'create')->name('admin.trainers.create');

            // edit trainers
            Route::get('/trainers/edit/{id}', 'edit')->name('admin.trainers.edit');

            // update trainers
            Route::post('/trainers/update', 'update')->name('admin.trainers.update');

            // delete trainers
            Route::get('/trainers/delete/{id}', 'delete')->name('admin.trainers.delete');

            // });

});

    //  Start Courses Route

    Route::controller(CoursesController::class)->prefix('dashboard')->group(function () {

        // Route::middleware(['adminAuth','admin'])->group(function(){

             // select courses info
            Route::get('/courses', 'index')->name('admin.courses.index');

            // Start Table Show Trainer
            Route::get('/courses/create', 'create')->name('admin.courses.create');

           // create trainers
            Route::post('/courses/store', 'store')->name('admin.courses.store');

            // edit trainers
            Route::get('/courses/edit/{id}', 'edit')->name('admin.courses.edit');

            // update trainers
            Route::post('/courses/update', 'update')->name('admin.courses.update');

            // delete trainers
            Route::get('/courses/delete/{id}', 'delete')->name('admin.courses.delete');

            // });

    });

    //  Start Courses Route

    Route::controller(StudentsController::class)->prefix('dashboard')->group(function () {

        // Route::middleware(['adminAuth','admin'])->group(function(){

             // select courses info
            Route::get('/students', 'index')->name('admin.students.index');

            // Start Table Show Trainer
            Route::get('/students/create', 'create')->name('admin.students.create');

           // create trainers
            Route::post('/students/store', 'store')->name('admin.students.store');

            // edit trainers
            Route::get('/students/edit/{id}', 'edit')->name('admin.students.edit');

            // update trainers
            Route::post('/students/update', 'update')->name('admin.students.update');

            // delete trainers
            Route::get('/students/delete/{id}', 'delete')->name('admin.students.delete');
            // showCourses
            Route::get('/students/show-Courses/{id}', 'showCourses')->name('admin.students.showCourses');
            Route::get('/students/{id}/courses/{c_id}/approve', 'approveCourses')->name('admin.students.approveCourses');

            Route::get('/students/{id}/courses/{c_id}/reject', 'rejectCourses')->name('admin.students.rejectCourses');

            Route::get('/students/{id}/addToCourse', 'addToCourse')->name('admin.students.addToCourse');

            Route::post('/students/{id}/addToCourse', 'storeCourse')->name('admin.students.storeCourse');

            // });

    });
