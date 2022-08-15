<?php


use App\Http\Controllers\RoomDataController;
use App\Models\Card_Subscribers;
use App\Models\Products;
use App\Models\RoomData;
use App\Models\SellEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
Route::post("/send", function (Request $request) {

    info($request);

    $idCard = DB::table('card_subscribers')->where('idUninque', $request->idUser)->get();
    $sold = $idCard->solde - 1;

    $idCard->solde = $sold;
    $idCard->update();
    SellEvent::create([
        'quantity' => (int) $request->quantity,
        'Card_Subscribers_id' => (int) $idCard->id,
        'product_id' => (int)$request->produitId,
    ]);
    return $request;
});

Route::get('/reset', function (Request $request) {

    if ($request) {
        $card1 = Card_Subscribers::find(1);
        $card2 = Card_Subscribers::find(2);
        $produit1 = Products::find(3);
        $produit2 = Products::find(4);

        info($produit1->quantity_init);

        $restant1 = $produit1->quantity_init - countQuantiy($produit1->quantitySell);
        $restant2 = $produit2->quantity_init - countQuantiy($produit2->quantitySell);

        return response()->json([
            'id1' => $card1->idUninque,
            'solde1' => $card1->solde,
            'id2' => $card2->idUninque,
            'solde2' => $card2->solde,
            'prodA' => $restant1,
            'prodB' => $restant2
        ]);
    } else {
        info("fausse alerte");
    }
});

//Route::post('/', 'RoomDataController@store');
