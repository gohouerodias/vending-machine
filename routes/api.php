<?php


use App\Http\Controllers\RoomDataController;
use App\Models\Card_Subscribers;
use App\Models\Products;
use App\Models\RoomData;
use App\Models\SellEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/', function (Request $request) {
    info($request);

    SellEvent::create([
        'quantity' => $request['temperature'],
        'card_Subcribers_id' => $request['temperature'],
    ]);
    return $request;
});
Route::get('/reset', function (Request $request) {

    if ($request) {
        $card1 = Card_Subscribers::find(1);
        $card2 = Card_Subscribers::find(2);
        $produitRestant1 = Products::find(1);
        $produitRestant2 = Products::find(2);

        return response()->json([
            'id1' => $card1->idUninque,
            'solde1' => $card1->solde,
            'id2' => $card2->idUninque,
            'solde2' => $card2->solde,

        ]);
    } else {
        info("fausse alerte");
    }
});

//Route::post('/', 'RoomDataController@store');