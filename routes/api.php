<?php

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

Route::prefix('check-disk')->group(function () {
    Route::get('/virtual/{id}',[\App\Http\Controllers\DiskPartitionController::class,'checkDisks']);
    Route::get('/get-disk/{id}',[\App\Http\Controllers\DiskPartitionController::class,'getDisks']);
});