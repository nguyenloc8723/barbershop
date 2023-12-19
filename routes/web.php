<?php
use App\Http\Controllers\Client\ClientBookingController;
use App\Http\Controllers\Client\ClientIndexController;
use App\Http\Controllers\Client\ClientServiceController;
use App\Http\Controllers\client\ClientTeamController;
use App\Http\Controllers\Client\PhoneAuthController;
use App\Http\Controllers\Client\LichsucatController;
use App\Http\Controllers\Client\ClientBlogController;
use App\Http\Controllers\Admin\StylistController;

use App\Http\Controllers\NotificationController;

use App\Http\Controllers\Client\paymentController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

require __DIR__.'/auth.php';
Route::get('services', [ClientServiceController::class, 'services'])->name('services');
Route::get('services-page/{id}', [ClientServiceController::class, 'servicesPage'])->name('services-page');

Route::group(["prefix" => "user", 'as' => 'client.'], function (){
    Route::get('booking',[ClientBookingController::class, 'index'])->name('booking');
    Route::get('chooseServices', [ClientBookingController::class, 'chooseServices'])->name('chooseServices');
    Route::get('booking/success/{id}', [ClientBookingController::class, 'bookingDone'])->name('bookingDone');


    //lich su cat
    Route::get('lichsucat', [LichsucatController::class, 'shows'])->name('show');
    Route::post('lichsucat', [LichsucatController::class, 'create'])->name('lichsucat');
    Route::match(['GET', 'POST'], 'detailhistory/{id}', [LichsucatController::class, 'DeltailHistory'])->name('detailhistory');



    Route::get('index-payment/{user_phone}',[paymentController::class, 'index'])->name('indexPayment');
    Route::post('create-vnpay',[paymentController::class, 'create_vnpay'])->name('create.vnpay');
    Route::match(['GET','POST'],'return',[paymentController::class, 'return'])->name('return.vnpay');
});

Route::get('notification',[NotificationController::class, 'demoNotification']);
Route::get('admin/all-notification',[NotificationController::class, 'index'])->name('route.notification');
Route::get('/delete-notification/{id}', [NotificationController::class, 'delete']);
Route::get('/lay-so-luong-thong-bao', [NotificationController::class, 'laySoLuongThongBao']);
Route::post('/confirm-booking/{id}', [NotificationController::class,'confirmBooking']);
//mail
Route::get('/bill', function () {
    return view('client.email.bill');
});
// client route
// Route::get('about', function () {
//     return view('client.display.about');
// })->name('about');
//trang chu
//Route::match(['GET', 'POST'], '/', [App\Http\Controllers\client\ClientIndexController::class, 'index']);
Route::get('/' , [App\Http\Controllers\client\ClientIndexController::class, 'index'])->name('index');
Route::get('about' , [App\Http\Controllers\client\ClientIndexController::class, 'about'])->name('about');
Route::get('portfolio' , [App\Http\Controllers\client\ClientIndexController::class, 'portfolio'])->name('portfolio');
Route::get('faq' , [App\Http\Controllers\client\ClientIndexController::class, 'faq'])->name('faq');
Route::get('pricing' , [App\Http\Controllers\client\ClientIndexController::class, 'pricing'])->name('pricing');
Route::get('portfolio' , [App\Http\Controllers\client\ClientIndexController::class, 'portfolio'])->name('portfolio');
Route::get('/team', [App\Http\Controllers\client\ClientIndexController::class, 'team'])->name('team');
Route::get('team-details/{id}', [ClientTeamController::class, 'detailbarber'])->name('team-details');
Route::get('/' , [ClientIndexController::class, 'index'])->name('index');
Route::get('about' , [ClientIndexController::class, 'about'])->name('about');
Route::get('portfolio' , [ClientIndexController::class, 'portfolio'])->name('portfolio');
Route::get('faq' , [ClientIndexController::class, 'faq'])->name('faq');
Route::get('pricing' , [ClientIndexController::class, 'pricing'])->name('pricing');
Route::get('portfolio' , [ClientIndexController::class, 'portfolio'])->name('portfolio');
Route::get('/team', [ClientIndexController::class, 'team'])->name('team');

Route::get('contact', function () {
    return view('client.display.contact');
})->name('contact');

Route::get('post', function () {
    return view('client.display.post');
})->name('post');
Route::get('blogs-list', [ClientBlogController::class,'index'])->name('blog');
Route::get('detail-blog/{id}', [ClientBlogController::class,'detailBlog'])->name('detail.blog');

Route::get('team-details', function () {
    return view('client.display.team-details');
})->name('team-details');

Route::get('search', [StylistController::class, 'getSearch'])->name('search');

