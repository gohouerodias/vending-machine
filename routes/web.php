<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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



Route::get('/conservation', [App\Http\Controllers\RoomController::class, 'show'])->name('conservation');
Route::get('profileC/{id}', [App\Http\Controllers\RoomController::class, 'showOne'])->name('profileC');
Route::put('update_room/{id}', [RoomController::class, 'edit']);

//processus de reinitialisation de mot de passe
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $email= $request->only('email');
    $status = Password::sendResetLink($email);

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
