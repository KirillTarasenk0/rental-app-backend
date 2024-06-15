<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertyGetTypeController;
use App\Http\Controllers\Api\PropertyGetPriceController;
use App\Http\Controllers\Api\PropertyGetRoomsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'property'], function () {

    Route::controller(PropertyGetTypeController::class)->group(function () {
        Route::get('/all', 'showAllProperties');
        Route::get('/flats', 'showAllFlatsProperties');
        Route::get('/houses', 'showAllHousesProperties');
        Route::get('/commercial', 'showAllCommercialProperties');
    });

    Route::controller(PropertyGetPriceController::class)->group(function () {
        Route::get('/cheep', 'showCheepPriceProperties');
        Route::get('/medium', 'showMediumPriceProperties');
        Route::get('/expensive', 'showExpensivePriceProperties');
    });

    Route::get('/{roomsCount}', [PropertyGetRoomsController::class, 'showRoomsCountProperties']);
});
