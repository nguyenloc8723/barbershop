<?php

use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\CategoryServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\ClientBookingController;
use App\Http\Controllers\Client\ClientServiceController;
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
        Route::get('service', [TrashController::class, 'Service'])->name('trash.service');
    });

});



//Route::get('services', function () {
//    return view('client.display.services');
//})->name('services');
Route::get('services', [ClientServiceController::class,'services'])->name('services');
Route::get('services-page/{id}', [ClientServiceController::class,'servicesPage'])->name('services-page');


Route::group(["prefix" => "client", 'as' => 'client.'], function (){
    Route::get('booking',[ClientBookingController::class, 'index'])->name('booking');
    Route::get('chooseServices', [ClientBookingController::class, 'chooseServices'])->name('chooseServices');
    Route::get('booking/success', [ClientBookingController::class, 'bookingDone'])->name('bookingDone');
});


// client route
Route::get('/', function () {
    return view('client.display.index');
})->name('index');
Route::get('404', function () {
    return view('client.display.404');
})->name('404');


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


