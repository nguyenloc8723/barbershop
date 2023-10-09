<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\CategoryServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//$object = [
//    'dashboard' => DashboardController::class,
//    'user' => UserController::class,
//    'member' => MemberController::class,
//];


//Route::group(["prefix" => "admin"], function () use ($object) {
//    foreach ($object as $path => $class) {
//        Route::resource($path, $class);
//        Route::get($path, [$class, 'index'])->name('route' . '.' . $path);
//    }
//});


Route::group(["prefix" => "admin"], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('route.dashboard');


    Route::resource('category', CategoryServiceController::class);


    Route::resource('member', MemberController::class);
    Route::get('service', [ServiceController::class, 'index'])->name('route.service');
    Route::get('calendar', [CalendarController::class, 'index'])->name('route.calendar');
    Route::get('chat', [ChatController::class, 'index'])->name('route.chat');
    Route::get('user', [UserController::class, 'index'])->name('route.user');


    Route::prefix('trash')->group(function (){
       Route::get('category', [TrashController::class, 'category'])->name('trash.category');
    });


    //Booking
//    Route::get('booking', [BookingController::class, 'index'])->name('route.booking');
//    Route::resource('booking_blade', BookingController::class);
    Route::get('booking_blade/index', [BookingController::class, 'index' ])->name('route.booking_blade');
    Route::get('booking_blade/detail/{id}', [BookingController::class, 'getDetail' ])->name('route.booking_blade.detail');
    Route::post('booing_blade/post/{id}', [BookingController::class, 'fileUpload'])->name('route.booking_blade.post');
//    Route::get('booking_blade/detail?{$id}', [BookingController::class, 'getDetail' ])->name('route.booking_blade.detail');
});




