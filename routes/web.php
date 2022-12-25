<?php

use App\Http\Controllers\Admin\CafeController;
use App\Http\Controllers\Owner\CapsterController;
use App\Http\Controllers\Owner\FacilityController;
use App\Http\Controllers\Owner\OrderController;
use App\Http\Controllers\Owner\ServiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Owner\CafeController as OwnerCafeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('canvas', function () {
    return view('pages.user.canvas');
});

Route::redirect('/', 'login');

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register'])->name('register');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('cafes/{cafe}/order', [CafeController::class, 'order'])->name('cafes.order');
    Route::get('cafes/{cafe}/facilites', [CafeController::class, 'facilities'])->name('cafes.facilities');
    Route::get('cafes/{cafe}/services', [CafeController::class, 'services'])->name('cafes.services');
    Route::get('cafes/{cafe}/capsters', [CafeController::class, 'capsters'])->name('cafes.capsters');
    Route::resource('cafes', CafeController::class)->except('show');
    Route::resource('users', UsersController::class)->except('show');
});

Route::group(['middleware' => ['auth', 'owner'], 'as' => 'owner.', 'prefix' => 'owner'], function () {
    Route::resource('capsters', CapsterController::class)->except(['show']);
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');
    Route::post('orders/{order}', [OrderController::class, 'update'])->name('order.update');
    Route::resource('facilities', FacilityController::class)->except(['show']);
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::get('cafe', [OwnerCafeController::class, 'edit'])->name('cafe.edit');
    Route::put('cafe/{cafe}', [OwnerCafeController::class, 'update'])->name('cafe.update');
});

Route::group(['middleware' => ['auth', 'user'], 'as' => 'user.'], function () {
    Route::get('home',                  [UserController::class, 'index'])->name('home');
    Route::get('detail/{cafe}',       [UserController::class, 'detail'])->name('detail');
    Route::get('capsters/{cafe}',      [UserController::class, 'capster'])->name('capster');
    Route::get('booking/{cafe}',      [UserController::class, 'booking'])->name('booking');
    Route::post('booking/{cafe}',     [UserController::class, 'bookingStore'])->name('booking.store');
    Route::get('profile',               [UserController::class, 'profile'])->name('profile');
    Route::get('about',                 [UserController::class, 'about'])->name('about');
    Route::post('review',               [UserController::class, 'review'])->name('review');
    Route::post('cancel',               [UserController::class, 'cancel'])->name('cancel');
    Route::get('search',                 [UserController::class, 'search'])->name('search');

});
