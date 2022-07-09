<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\SellEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnValue;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     *
     */
    public function showAll()
    {
        //shows all products
        $input = array("primary", "danger", "success ", "info", "secondary", "warning");
        $rand_keys = array_rand($input, 2);
        $str = $input[$rand_keys[0]] . "";

        $products_ids = [];
        $prods = Products::get();
        foreach ($prods as $product) {
            $products_ids[$product->id] = $product;
        }

        $quantityS = calcul($products_ids);
        foreach ($quantityS as $quantity) {
            $products_ids[$quantity->product_id]->quantitySell[] = $quantity->quantity;
        }

        //calcul du chiffre d'affaire mensuel
        $array[] = ['nom', 'totalSell'];
        foreach ($prods as $key => $value) {
            $value2 = countQuantiy($value->quantitySell) * $value->price_unit;
            $array[++$key] = [$value->name, $value2];
        }
        $tab = googleLineGraph();
        /** foreach ($prods as $key ) {
          countQuantiy($key->quantitySell);
        } **/
        return view('pages.home', compact('prods', 'str'))->with('array', json_encode($array))->with('tab', json_encode($tab));
    }



    public function showOne($id)
    {
        $products_ids = [];
        $prod = Products::find($id);
        $products_ids[$id] = $prod;
        $quantityS = calcul($products_ids);

        foreach ($quantityS as $quantity) {
            $products_ids[$quantity->product_id]->quantitySell[] = $quantity->quantity;
        }


        $SumMP = SellEvent::select(
            DB::raw("(SUM(quantity)) as quantity"),
            DB::raw("MONTHNAME(sold_at) as month_name")
        )
            ->whereYear('sold_at', date('Y'))
            ->where('product_id', $id)
            ->orderBy('sold_at', 'ASC')
            ->groupBy(DB::raw("MONTHNAME(sold_at)"))
            ->pluck('quantity', 'month_name');

        $labels = $SumMP->keys();
        $data = $SumMP->values();
        return view('pages.profileP', compact('prod', 'labels', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        $products->name = request('name', null);
        $products->description = request('description', null);
        $products->quantity_init = request('quantity', null);;
        $products->price_unit = request('price', null);;
        $products->expiration_date = request('expiration_date', null);;
        $products->update();
        return redirect()->back()->with('status', 'Products Updated Successfully');
    }

    public function imageUploadPost(Request $request, $id)
    {
        $products = Products::find($id);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $name = str_replace(' ', '', $products->name);
        $imageName = $name . '.' . $request->image->extension();
        /* Store $imageName name in DATABASE from HERE */
        $products->image = $imageName;
        $products->save();
        $request->image->move(public_path('images'), $imageName);
        return back()
            ->with('success', 'You have successfully upload image.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}