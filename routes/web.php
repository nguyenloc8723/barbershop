<?php

use App\Http\Controllers\Admin\BannerSettingCtl;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\CategoryServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\resultsController;
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

    Route::get('result', [resultsController::class, 'result'])->name('route.result');
    Route::resource('banner', BannerSettingCtl::class);
    Route::match(['GET', 'POST'], 'destroy/{id}', [BannerSettingCtl::class, 'destroy'])->name('destroy.banner');
    Route::match(['GET', 'POST'], 'edit/{id}', [BannerSettingCtl::class, 'edit'])->name('edit.banner');


    Route::prefix('trash')->group(function (){
       Route::get('category', [TrashController::class, 'category'])->name('trash.category');
        Route::get('service', [TrashController::class, 'Service'])->name('trash.service');
    });
});




