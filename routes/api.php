<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(PropertyController::class)->group(function () {
    Route::group(['prefix' => '/property'], function () {
        Route::get('/all', 'showAllProperties');
        Route::get('/flats', 'showAllFlatsProperties');
    });
});
