 <?php

use App\Models\Notifications;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Diff;

function calcul($products_ids)
{

    $value = DB::table('sell_events')
        ->select('sell_events.*')
        ->join('products','products.id','=','sell_events.product_id')
        ->whereIn('sell_events.product_id',array_keys($products_ids))
        ->get();

    return $value;

}

function countQuantiy(array $arrays)
{   $count=0;
    foreach ($arrays as $keys => $value) {
        $count+=$value;
    }
    return $count;
}

function alertQuantity( $product_id)
{
    $quantityA=0;
    $message='';
    $product=Products::find($product_id);
    $value = DB::table('sell_events')
        ->select('sell_events.*')
        ->where('product_id',$product_id)
        ->get();
    $quantityA=$value->sum('quantity');

    $restant=$product->quantity_init-$quantityA;

    if ($restant <=20 ) {
        $message='le produit est en quantité insuffisante';
    }

    if($restant<=0){
        $message='le produit est fini en stock';
    }
    /**if($message!='')
        {Notifications::create([
            'message' => $message,
            'product_id' => $product_id,
        ]);}*/

    return $message;

}

function alertExpiration(Products $item)
{
    $quantityA=0;
    $message='';
    $expirationDate= $item->expiration_date;
    $depotDate=$item->created_at;
    $datework = Carbon::parse($expirationDate);
    $depotDate=Carbon::parse($depotDate);
    $now = Carbon::now();
    //$diff = $now->diffForHumans($datework);
    $diff = $now->diffInDays($datework);
    $result = $now->gt($datework);
    $result1=$now->eq($datework);
    //calcul du pourcentage de progression
    $percentTime=0;
    $totalTime=$depotDate->diffInDays($datework);
    $cal= $now->diffInDays($depotDate);

    $percentTime=intval(($cal*100)/$totalTime);
    //verification de la date de peremption
    if ($result1) {
         $diff = $now->diffForHumans($datework).' peremption';
        $diff = array($diff,'message' => 'le produit a atteint la date d\'expiration');
        $diff = array($diff,'percent' => $percentTime);
        $message='le produit a atteint la date d\'expiration';
    }elseif ($result) {
         $diff = $now->diffForHumans($datework).' peremption';
        $diff = array($diff,'message' => 'le produit a dépassée la date d\'expiration');
        $diff = array($diff,'percent' => 100);
        $message='le produit a dépassée la date d\'expiration';

    }elseif($now->lt($datework) && $now->diffInDays($datework)<=3 && $now->diffInDays($datework)>0){
        $diff = 0;
        $diff = array($diff,'message' => 'warning it\'s stay '.$now->diffForHumans($datework).' peremption');
        $diff = array($diff,'percent' => $percentTime);
        $message='warning it\'s stay '.$now->diffForHumans($datework).' peremption';
    }
    else {
        $diff = $now->diffForHumans($datework).' peremption';
        $diff = array($diff,'message' => '.');
        $diff = array($diff,'percent' => $percentTime);
    }

    return $diff;

}