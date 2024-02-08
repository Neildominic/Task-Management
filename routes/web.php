<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\TaskListingImageController;

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

Route::resource('listing', ListingController::class)
    ->middleware('auth');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'create'])
    ->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'store'])
    ->name('login.store');
Route::delete('logout', [\App\Http\Controllers\AuthController::class, 'destroy'])
    ->name('logout');

Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);
