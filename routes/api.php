<?php

use App\Http\Controllers\Admin\API\ApiCategoryController;
use App\Http\Controllers\Admin\API\ApiStylistTimeSheetsController;
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


Route::resource('category', ApiCategoryController::class);

Route::prefix('trash')->group(function (){
    Route::get('category', [ApiTrashController::class, 'category']);
    Route::post('category/{id}', [ApiTrashController::class, 'restore']);
    Route::Delete('category/{id}', [ApiTrashController::class, 'destroy']);
});

Route::resource('stylistTimeSheets', ApiStylistTimeSheetsController::class);

Route::prefix('trash')->group(function (){
    Route::get('stylistTimeSheets', [ApiTrashController::class, 'stylistTimeSheets']);
    Route::post('stylistTimeSheets/{id}', [ApiTrashController::class, 'restore']);
    Route::Delete('stylistTimeSheets/{id}', [ApiTrashController::class, 'destroy']);
});

