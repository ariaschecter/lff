<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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