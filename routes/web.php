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
use App\Http\Controllers\BlogController;
use App\Http\Controllers\client\ClientBlogController;
use App\Http\Controllers\StylistController;

use App\Http\Controllers\TimeSheetController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BannerController;


use App\Http\Controllers\Client\ClientBookingController;
use App\Http\Controllers\Client\ClientServiceController;

use App\Http\Controllers\Client\PhoneAuthController;
use App\Http\Controllers\SearchController;
// use App\Http\Controllers\BookingController;

use App\Http\Controllers\Admin\StatisticalController;

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

Route::resource('stylists',StylistController::class);
Route::resource('blogs',BlogController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('services', [ClientServiceController::class, 'services'])->name('services');
Route::get('services-page/{id}', [ClientServiceController::class, 'servicesPage'])->name('services-page');

Route::get('services', [ClientServiceController::class,'services'])->name('services');
Route::get('services-page/{id}', [ClientServiceController::class, 'servicesPage'])->name('services-page');


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

Route::get('about', function () {
    return view('client.display.about');
})->name('about');
//trang chu
Route::match(['GET', 'POST'], '/test', [App\Http\Controllers\client\ClientIndexController::class, 'index']);
Route::match(['GET', 'POST'], '/teams', [App\Http\Controllers\client\ClientTeamController::class, 'index']);

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
Route::get('blogs-list', [ClientBlogController::class,'index'])->name('blog');

Route::get('detail-blog/{id}', [ClientBlogController::class,'detailBlog'])->name('detail.blog');
Route::get('pricing', function () {
    return view('client.display.pricing');
})->name('pricing');
Route::get('team', function () {
    return view('client.display.team');
})->name('team');
Route::get('team-details', function () {
    return view('client.display.team-details');
})->name('team-details');

Route::get('search', [StylistController::class, 'getSearch'])->name('search');
Route::get('deletes', [StylistController::class, 'deletes'])->name('deletes');


