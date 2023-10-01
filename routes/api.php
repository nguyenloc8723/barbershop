<?php

use App\Http\Controllers\Admin\API\ApiCategoryController;

use App\Http\Controllers\Admin\API\ApiServiceController;
use App\Http\Controllers\Admin\API\ApiTrashController;
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
    Route::post('post/service',[ApiServiceController::class, 'store']);
//    Route::get('post/service',[ApiServiceController::class, 'store']);

});

Route::resource('category', ApiCategoryController::class);

Route::prefix('trash')->group(function (){
    Route::get('category', [ApiTrashController::class, 'category']);
    Route::post('category/{id}', [ApiTrashController::class, 'restore']);
    Route::Delete('category/{id}', [ApiTrashController::class, 'destroy']);
});

