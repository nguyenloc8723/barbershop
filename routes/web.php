<?php

use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
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
});


