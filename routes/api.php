<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ServiceRecordController;

Route::apiResource('cars', CarController::class);
Route::get('cars/{car_id}/services', [ServiceRecordController::class, 'index']);
Route::post('cars/{car_id}/services', [ServiceRecordController::class, 'store']);
Route::get('cars/{car_id}/services/{id}', [ServiceRecordController::class, 'show']);
Route::put('cars/{car_id}/services/{id}', [ServiceRecordController::class, 'update']);
Route::delete('cars/{car_id}/services/{id}', [ServiceRecordController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
