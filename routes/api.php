<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertyGetTypeController;
use App\Http\Controllers\Api\PropertyGetPriceController;
use App\Http\Controllers\Api\PropertyGetRoomsController;
use App\Http\Controllers\Api\PropertySearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\AddPropertyController;

Route::group(['prefix' => 'property'], function () {

    Route::controller(PropertyGetTypeController::class)->group(function () {
        Route::get('/all', 'showAllProperties')->name('all-properties');
        Route::get('/flats', 'showAllFlatsProperties')->name('flats-properties');
        Route::get('/houses', 'showAllHousesProperties')->name('houses-properties');
        Route::get('/commercial', 'showAllCommercialProperties')->name('commercial-properties');
    });

    Route::controller(PropertyGetPriceController::class)->group(function () {
        Route::get('/cheep', 'showCheepPriceProperties')->name('cheep-properties');
        Route::get('/medium', 'showMediumPriceProperties')->name('medium-properties');
        Route::get('/expensive', 'showExpensivePriceProperties')->name('expensive-properties');
    });

    Route::get('/find', [PropertySearchController::class, 'showSearchedProperties'])->name('filtered-properties');

    Route::get('/{roomsCount}', [PropertyGetRoomsController::class, 'showRoomsCountProperties'])
        ->where('roomsCount', '[0-9]+|more')
        ->name('filtered-rooms-properties');

    Route::middleware('auth:api')->group(function () {
        Route::post('/addProperty', [AddPropertyController::class, 'store'])->name('add-property');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::get('/user', 'user')->name('user')->middleware('auth:api');
});

Route::controller(UserProfileController::class)->group(function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::post('/edit', 'editUserProfileData')->name('edit-profile')->middleware('auth:api');
    });
});
