<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/profile product', function () {
    return view('pages.profileP');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\ProductsController::class, 'showAll'])->name('home');
Route::get('profileP/{id}', [App\Http\Controllers\ProductsController::class, 'showOne'])->name('profileP');
Route::put('update_product/{id}', [ProductsController::class, 'update']);


Route::get('/sellevent', [App\Http\Controllers\SellEventController::class, 'show'])->name('sellevent');


Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/updateprofile',[App\Http\Controllers\HomeController::class, 'profileUpdate']);



Route::get('/conservation', [App\Http\Controllers\RoomDataController::class, 'showAll'])->name('conservation');