<?php

use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ServiceController;
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
Route::group(["prefix" => "admin"],function (){
    Route::get('/dashboard', DashboardController::class)->name('route.dashboard');
    Route::get('/table', ComboController::class)->name('route.table');
    Route::resource('/member', MemberController::class);
    Route::get('/service', [ServiceController::class, 'index'])->name('route.service');
    Route::get('/service-combo', [ServiceController::class, 'serviceCombo'])->name('route.service-combo');

    Route::get('/calendar', [CalendarController::class, 'index'])->name('route.calendar');
    Route::get('/chat', [ChatController::class, 'index'])->name('route.chat');
});


