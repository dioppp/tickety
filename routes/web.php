<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
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

Route::get('/', [GuestController::class, 'index'])->name('index');

Route::resource('/event', EventController::class);

// Route::get('/account', function () {
//     return view('pages.account');
// });

// Route::get('/checkout', function () {
//     return view('pages.checkout');
// });

// Route::get('/products', function () {
//     return view('pages.product');
// });

// Route::get('/wishlist', function () {
//     return view('pages.wishlist');
// });
