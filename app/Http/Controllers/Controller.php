<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function showAll()
    {
        //shows all products
        $input=array("primary","danger","success ", "info","secondary","warning");
        $rand_keys=array_rand($input,2);
        $str= $input[$rand_keys[0]]."";

        $products_ids=[];
        $prods=Products::get();
        foreach($prods as $product){
            $products_ids[$product->id]=$product;
        }

        $quantityS=calcul($products_ids);
        foreach ($quantityS as $quantity ) {
           $products_ids[$quantity->product_id]->quantitySell[]=$quantity->quantity;
        }

        //calcul du chiffre d'affaire mensuel
        $array[] = ['nom', 'totalSell'];
        foreach($prods as $key => $value)
        {
          $value2=countQuantiy($value->quantitySell)*$value->price_unit;
          $array[++$key] = [$value->name,$value2 ];
        }
        $tab=googleLineGraph();

        return view('welcome',compact('prods','str'))->with('array', json_encode($array))->with('tab', json_encode($tab));
    }

}
