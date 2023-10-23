<?php


use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\CategoryServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StylistTimeSheetsController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BannerController;


use App\Http\Controllers\Client\ClientBookingController;
use App\Http\Controllers\Client\ClientServiceController;

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ProfileController;

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



Route::group([],function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('route.dashboard');
    Route::resource('category', CategoryServiceController::class);
    Route::resource('timesheets', TimesheetController::class);
    Route::get('/admin/timesheets/{id}/delete', [TimeSheetController::class,'delete'])->name('timesheets.delete');
    Route::match(['GET', 'POST'],'/admin/timesheets/{id}/edit', [TimeSheetController::class, 'edit'])->name('timesheets.edit');
    //setting
    Route::resource('settings', SettingController::class);
    Route::get('/admin/settings/{id}/delete', [SettingController::class,'delete'])->name('settings.delete');
    Route::match(['GET', 'POST'],'/admin/settings/{id}/edit', [SettingController::class, 'edit'])->name('settings.edit');
    //banner
    Route::resource('banners', BannerController::class)->withTrashed();
    Route::get('/admin/banners/{id}/delete', [BannerController::class,'delete'])->name('banners.delete');
    Route::match(['GET', 'POST'],'/admin/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');

    Route::resource('stylistTimeSheets', StylistTimeSheetsController::class);
    Route::resource('user', UserController::class);



    Route::resource('member', MemberController::class);
    Route::get('service', [ServiceController::class, 'index'])->name('route.service');
    Route::get('calendar', [CalendarController::class, 'index'])->name('route.calendar');
    Route::get('chat', [ChatController::class, 'index'])->name('route.chat');
    Route::get('user', [UserController::class, 'index'])->name('route.user');
    Route::get('stylistTimeSheets', [StylistTimeSheetsController::class, 'index'])->name('route.stylistTimeSheets');

    Route::prefix('trash')->group(function (){
        Route::get('category', [TrashController::class, 'category'])->name('trash.category');
        Route::get('stylistTimeSheets', [TrashController::class, 'stylistTimeSheets'])->name('trash.stylistTimeSheets');
        Route::get('user', [TrashController::class, 'user'])->name('trash.user');
        Route::get('service', [TrashController::class, 'Service'])->name('trash.service');
    });
    Route::get('booking_blade/index', [BookingController::class, 'index' ])->name('route.booking_blade');
    Route::get('booking_blade/detail/{id}', [BookingController::class, 'getDetail' ])->name('route.booking_blade.detail');
    Route::post('booking_blade/post/{id}', [BookingController::class, 'fileUpload'])->name('route.booking_blade.post');


    Route::group([],function (){
        Route::get('roles', [RoleController::class, 'index' ])->name('role');
        Route::get('roles/create', [RoleController::class, 'create' ])->name('role.create');
        Route::post('roles/store', [RoleController::class, 'store' ])->name('role.store');
        Route::get('roles/edit/{id}', [RoleController::class, 'edit' ])->name('role.edit');
        Route::post('roles/update/{id}', [RoleController::class, 'update' ])->name('role.update');
        Route::post('roles/destroy/{id}', [RoleController::class, 'destroy' ])->name('role.destroy');
    });
});









