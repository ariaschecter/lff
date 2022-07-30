<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;

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

Route::get('/dashboard', function () {
    return view('welcome',[
        'active' => 'dashboard',
        'title' => 'Users',
        'sub' => 'All Users',
    ]);
});

Route::prefix('admin')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index');
        Route::get('/user/{id}', 'show');
        Route::post('/user', 'store');
        Route::get('/user/reset/{id}', 'reset');
        Route::get('/user/update/{id}', 'edit');
        Route::post('/user/update/{id}', 'update');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/add', 'create');
        Route::post('/category/add', 'store');
        Route::get('/category/update/{id}', 'edit');
        Route::post('/category/update/{id}', 'update');
        Route::get('/category/delete/{id}', 'destroy');
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
        Route::get('/', 'index');
        Route::post('/', 'cekAuth');
        Route::get('/register', 'create');
        Route::post('/register', 'store');
    });
});
