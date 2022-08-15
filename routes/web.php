<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoomController;
use App\Models\SellEvent;
use App\Models\User;
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

Route::get("/demo", function () {
    SellEvent::create([
        'quantity' => 2,
        'Card_Subscribers_id' => 2,
        'product_id' => 3,
    ]);
});

// Route::post("/send", function (Request $request) {

//     SellEvent::create([
//         'quantity' => 2,
//         'Card_Subscribers_id' => 2,
//         'product_id' => 3,
//     ]);
//     return $request;
// });

Route::get('/', [App\Http\Controllers\Controller::class, 'showAll']);

Route::get('/card', function () {
    return view('pages.card_validation');
});

Route::get('/profile product', function () {
    return view('pages.profileP');
});



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\ProductsController::class, 'showAll'])->name('home');

Route::get('profileP/{id}', [App\Http\Controllers\ProductsController::class, 'showOne'])->name('profileP');
Route::post('update_product/{id}', [ProductsController::class, 'update']);
Route::post('image-upload-product/{id}', [ProductsController::class, 'imageUploadPost'])->name('image.upload.product.post');

Route::get('/sellevent', [App\Http\Controllers\SellEventController::class, 'show'])->name('sellevent');


Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/updateprofile', [App\Http\Controllers\HomeController::class, 'profileUpdate'])->middleware(['auth', 'verified']);
Route::post('image-upload', [App\Http\Controllers\HomeController::class, 'imageUploadPost'])->name('image.upload.post');

Route::post('/updatePassword', [App\Http\Controllers\HomeController::class, 'changePassword']);


Route::get('/conservation', [App\Http\Controllers\RoomController::class, 'show'])->name('conservation');
Route::get('profileC/{id}', [App\Http\Controllers\RoomController::class, 'showOne'])->name('profileC');
Route::put('update_room/{id}', [RoomController::class, 'edit']);

//processus de reinitialisation de mot de passe
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $email = $request->only('email');

    $user = User::where('email', $email)->exists();

    if (!$user) {
        return  back()->withErrors(['email' => __("Email doesn't exist")]);
    } else {
        $status = Password::sendResetLink($email);
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
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