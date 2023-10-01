<?php

use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
//use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ServiceController;


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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(["prefix" => "admin"],function (){
    Route::get('/dashboard', DashboardController::class)->name('route.dashboard');
    Route::get('/table', ComboController::class)->name('route.table');
    Route::resource('/member', MemberController::class);
    Route::get('/service', [ServiceController::class, 'index'])->name('route.service');
    Route::get('/service-combo', [ServiceController::class, 'serviceCombo'])->name('route.service-combo');

    Route::get('/calendar', [CalendarController::class, 'index'])->name('route.calendar');
    Route::get('/chat', [ChatController::class, 'index'])->name('route.chat');
});


//Route::get('services', function () {
//    return view('client.display.services');
//})->name('services');
Route::get('services', [ServiceController::class,'services'])->name('services');
Route::get('services-page/{id}', [ServiceController::class,'servicesPage'])->name('services-page');

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


Route::get('services', function () {
    return view('client.display.services');
})->name('services');
Route::get('services-page', function () {
    return view('client.display.services-page');
})->name('services-page');
>>>>>>> 9318ecf7e7c0cdacb5425e7f410ba660b6d30b99
Route::get('team', function () {
    return view('client.display.team');
})->name('team');
Route::get('team-details', function () {
    return view('client.display.team-details');
})->name('team-details');
