<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSubListController;
use App\Http\Controllers\CourseListController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\CourseAccessController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SendEmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function(){
    Route::get('abc', function(){
        return view('abc', [
            'title' => 'abc',
            'active' => 'abc',
        ]);
    });
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/courses', 'courses');
        Route::get('/course/{course:slug}', 'course');
        Route::get('/categories', 'categories'); // belum
        Route::get('/category/{category:category_slug}', 'category'); // belum
        Route::get('/about', 'about');
    });

    Route::controller(PersonController::class)->group(function () {
        Route::get('/progress', 'progress');
        Route::get('/course', 'course');
        Route::get('/course/access/{course:slug}', 'getLast');
        Route::get('/course/access/{course:slug}/{courselist}', 'access');
        Route::get('/order', 'order');
        Route::get('/course/order/{course:slug}', 'storeOrder');
        Route::get('/payment', 'payment');
        Route::get('/payment/add', 'addPayment');
        Route::post('/payment/add', 'storePayment');
        Route::get('/edit-profile', 'editProfile');
        Route::get('/edit-password', 'editPassword');
        Route::post('/edit-profile', 'storeProfile');
        Route::post('/edit-password', 'storePassword');
    });
});

Route::middleware('auth','isAdmin')->prefix('admin')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index');
        // Route::post('/user', 'store');
        Route::get('/user/{id}', 'show');
        Route::get('/user/reset/{id}', 'reset');
        Route::get('/user/update/{id}', 'edit');
        Route::post('/user/update/{id}', 'update');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('/course', 'index');
        Route::get('/course/add', 'create');
        Route::post('/course/add', 'store');
        Route::get('/course/update/{course:slug}', 'edit');
        Route::post('/course/update/{course:slug}', 'update');
        Route::get('/course/delete/{course:slug}', 'destroy');
    });

    Route::controller(CourseSubListController::class)->group(function () {
        Route::get('/course_sub_list/{course:slug}/add', 'create');
        Route::post('/course_sub_list/{course:slug}/add', 'store');
        Route::get('/course_sub_list/{course:slug}/update/{coursesublist}', 'edit');
        Route::post('/course_sub_list/{course:slug}/update/{coursesublist}', 'update');
        Route::get('/course_sub_list/{course:slug}/delete/{coursesublist}', 'destroy');
    });

    Route::controller(CourseListController::class)->group(function () {
        Route::get('/course_list/{course:slug}', 'index');
        Route::get('/course_list/{course:slug}/add', 'create');
        Route::post('/course_list/{course:slug}/add', 'store');
        Route::get('/course_list/{course:slug}/update/{courselist}', 'edit');
        Route::post('/course_list/{course:slug}/update/{courselist}', 'update');
        Route::get('/course_list/{course:slug}/delete/{courselist}', 'destroy');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'index');
        Route::get('/order/accept/{order_ref}', 'edit');
        Route::get('/order/delete/{order_ref}', 'destroy');
    });

    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payment', 'index');
        Route::get('/payment/{payment:payment_ref}', 'show');
        Route::get('/payment/accept/{payment}', 'edit');
        Route::get('/payment/decline/{payment}', 'destroy');
    });

    Route::controller(CourseAccessController::class)->group(function () {
        Route::get('/course_access', 'index');
        Route::get('/course_access/add', 'create');
        Route::post('/course_access/add', 'store');
        Route::get('/course_access/update/{id}', 'edit');
        Route::post('/course_access/update/{id}', 'update');
        Route::get('/course_access/delete/{id}', 'destroy');
    });

    Route::controller(PaymentMethodController::class)->group(function () {
        Route::get('/payment_method', 'index');
        Route::get('/payment_method/add', 'create');
        Route::post('/payment_method/add', 'store');
        Route::get('/payment_method/update/{paymentmethod}', 'edit');
        Route::post('/payment_method/update/{paymentmethod}', 'update');
        Route::get('/payment_method/delete/{paymentmethod}', 'destroy');
    });

    Route::controller(FinanceController::class)->group(function () {
        Route::get('/transaction', 'index');
        Route::get('/transaction/add', 'create');
        Route::post('/transaction/add', 'store');
        Route::get('/transaction/update/{finance}', 'edit');
        Route::post('/transaction/update/{finance}', 'update');
        Route::get('/transaction/delete/{finance}', 'destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/add', 'create');
        Route::post('/category/add', 'store');
        Route::get('/category/update/{category:category_slug}', 'edit');
        Route::post('/category/update/{category:category_slug}', 'update');
        Route::get('/category/delete/{category:category_slug}', 'destroy');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/role', 'index');
        Route::get('/role/add', 'create');
        Route::post('/role/add', 'store');
        Route::get('/role/update/{id}', 'edit');
        Route::post('/role/update/{id}', 'update');
        Route::get('/role/delete/{id}', 'destroy');
    });
});

Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('login'); // guest
        Route::post('/', 'authenticate');
        Route::get('/register', 'create'); // guest
        Route::post('/register', 'store');
        Route::get('/verify', 'verify'); // guest
        Route::get('/forgotpassword', 'forgotpassword'); // guest
        Route::post('/forgotpassword', 'forgot'); // guest
        Route::get('/reset', 'reset');
        Route::post('/reset', 'updatePassword');
        Route::get('/logout', 'logout');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/resend-email', 'resend'); // guest
});


