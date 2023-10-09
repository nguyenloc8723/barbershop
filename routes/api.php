<?php

use App\Http\Controllers\Admin\API\APIBookingController;
use App\Http\Controllers\Admin\API\ApiCategoryController;

use App\Http\Controllers\Admin\API\ApiServiceController;
use App\Http\Controllers\Admin\API\ApiTrashController;
use App\Http\Controllers\Admin\API\Trash\CategoryController;
use App\Http\Controllers\Admin\API\Trash\ServiceController;
use App\Http\Controllers\Client\API\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([],function (){
    Route::get('get/service',[ApiServiceController::class, 'index']);
    Route::post('post/service',[ApiServiceController::class, 'store']);
    Route::get('edit/service/{id}',[ApiServiceController::class, 'show']);
    Route::post('put/service/{id}',[ApiServiceController::class, 'update']);
    Route::delete('delete/service/{id}',[ApiServiceController::class, 'destroy']);
//    Route::get('put/service/{id}',[ApiServiceController::class, 'update']);
    Route::get('getImg/{id}', [ApiServiceController::class, 'getImage']);
});

Route::group([],function (){
    Route::get('get/booking',[ApiBookingController::class, 'index']);
//    Route::post('post/booking',[ApiBookingController::class, 'store']);
//    Route::get('edit/booking/{id}',[ApiBookingController::class, 'show']);
});

Route::resource('category', ApiCategoryController::class);

Route::prefix('trash')->group(function (){
    Route::get('category', [CategoryController::class, 'index']);
    Route::post('category/{id}', [CategoryController::class, 'restore']);
    Route::Delete('category/{id}', [CategoryController::class, 'destroy']);

    Route::get('service', [ServiceController::class, 'index']);
    Route::post('service/{id}', [ServiceController::class, 'restore']);
    Route::Delete('service/{id}', [ServiceController::class, 'destroy']);
    Route::get('deleteImg/{id}', [ServiceController::class, 'deleteImg']);
});


Route::group([],function (){
    Route::get('stylist/booking', [BookingController::class, 'index']);
    Route::get('timeSheet/booking/{id}', [BookingController::class, 'timeSheetDetail']);
    Route::get('stylistDetail/booking/{id}', [BookingController::class, 'stylistDetail']);

    Route::get('service/booking', [BookingController::class, 'loadService']);
    Route::post('pullRequest/booking', [BookingController::class, 'pullRequest']);
    Route::get('booking/success', [BookingController::class, 'bookingDone']);
});

