<?php


use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\CategoryServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StylistTimeSheetsController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BannerSettingCtl;
use App\Http\Controllers\Admin\resultsController;
use App\Http\Controllers\Client\ClientBookingController;
use App\Http\Controllers\Client\ClientServiceController;
use App\Http\Controllers\Client\PhoneAuthController;
use App\Http\Controllers\Client\LichsucatController;
use App\Http\Controllers\TimeSheetController;
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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(["prefix" => "admin"], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('route.dashboard');


    Route::resource('category', CategoryServiceController::class);
    Route::resource('timesheets', TimesheetController::class);
    // Route::get('admin/delete/{id}',TimesheetController::class,'destroy')->name('route.delete');
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
    Route::resource('timesheet', TimeSheetController::class);
    Route::get('service', [ServiceController::class, 'index'])->name('route.service');
    Route::get('calendar', [CalendarController::class, 'index'])->name('route.calendar');
    Route::get('chat', [ChatController::class, 'index'])->name('route.chat');
    Route::get('user', [UserController::class, 'index'])->name('route.user');

    
    Route::get('stylistTimeSheets', [StylistTimeSheetsController::class, 'index'])->name('route.stylistTimeSheets');

    Route::get('result', [resultsController::class, 'result'])->name('route.result');
    Route::resource('banner', BannerSettingCtl::class);
    Route::resource('review', ReviewController::class);
    Route::match(['GET', 'POST'], 'reply/{id}', [ReviewController::class, 'reply'])->name('replyReview');

    Route::match(['GET', 'POST'], 'destroy/{id}', [BannerSettingCtl::class, 'destroy'])->name('destroy.banner');
    Route::match(['GET', 'POST'], 'edit/{id}', [BannerSettingCtl::class, 'edit'])->name('edit.banner');



    Route::prefix('trash')->group(function (){
       Route::get('category', [TrashController::class, 'category'])->name('trash.category');

       Route::get('stylistTimeSheets', [TrashController::class, 'stylistTimeSheets'])->name('trash.stylistTimeSheets');
       Route::get('user', [TrashController::class, 'user'])->name('trash.user');


        Route::get('service', [TrashController::class, 'Service'])->name('trash.service');
    });

    //Booking
//    Route::get('booking', [BookingController::class, 'index'])->name('route.booking');
//    Route::resource('booking_blade', BookingController::class);
    Route::get('booking_blade/index', [BookingController::class, 'index' ])->name('route.booking_blade');
    Route::get('booking_blade/detail/{id}', [BookingController::class, 'getDetail' ])->name('route.booking_blade.detail');
    Route::post('booking_blade/post/{id}', [BookingController::class, 'fileUpload'])->name('route.booking_blade.post');
//    Route::get('booking_blade/detail?{$id}', [BookingController::class, 'getDetail' ])->name('route.booking_blade.detail');
});



Route::get('services', [ClientServiceController::class, 'services'])->name('services');
Route::get('services-page/{id}', [\App\Http\Controllers\Client\ClientServiceController::class, 'servicesPage'])->name('services-page');

Route::get('services', [ClientServiceController::class,'services'])->name('services');
Route::get('services-page/{id}', [ClientServiceController::class,'servicesPage'])->name('services-page');


Route::group(["prefix" => "user", 'as' => 'client.'], function (){
    Route::get('booking',[ClientBookingController::class, 'index'])->name('booking');
    Route::get('chooseServices', [ClientBookingController::class, 'chooseServices'])->name('chooseServices');
    Route::get('booking/success/{id}', [ClientBookingController::class, 'bookingDone'])->name('bookingDone');
});



// client route
Route::get('/', function () {
    return view('client.display.index');
})->name('index');
Route::get('404', function () {
    return view('client.display.404');
})->name('404');
// Route::get('lichsucat', function () {
//     return view('client.display.lichsucat');
// });
Route::get('lichsucat', [LichsucatController::class, 'shows'])->name('show');
Route::post('lichsucat', [LichsucatController::class, 'create'])->name('lichsucat');
Route::match(['GET', 'POST'],'detailhistory/{id}', [LichsucatController::class, 'DeltailHistory'])->name('detailhistory');

Route::get('about', function () {
    return view('client.display.about');
})->name('about');
Route::get('blog', function () {
    return view('client.display.blog');
})->name('blog');

Route::get('contact', function () {
    return view('client.display.contact');
})->name('contact');

Route::get('faq', function () {
    return view('client.display.faq');
})->name('faq');

Route::get('portfolio', function () {
    return view('client.display.portfolio');
})->name('portfolio');
Route::get('post', function () {
    return view('client.display.post');
})->name('post');
Route::get('pricing', function () {
    return view('client.display.pricing');
})->name('pricing');
Route::get('team', function () {
    return view('client.display.team');
})->name('team');
Route::get('team-details', function () {
    return view('client.display.team-details');
})->name('team-details');




