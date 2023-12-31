<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishListController;
use App\Models\WishList;
use Filament\Http\Controllers;

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

Route::get('/', function () {return view('frontpage');});
Route::put('/wishlist/{id}/edit', 'WishListController@edit')->middleware('checkWishListOwnership');
// Route::get('/wishlist', 'WishListController@userWishListsEdit');
Route::get('/wishlist/{wishlist}', [WishListController::class, 'show'])->name('wishlist.show');





