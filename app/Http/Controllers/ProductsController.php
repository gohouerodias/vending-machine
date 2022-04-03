<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


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
        $input=array("primary","danger","success ", "info","secondary");
        $rand_keys=array_rand($input,2);
        $str= $input[$rand_keys[0]]."";
        $prods=Products::get();
        return view('pages.home',compact('prods','str'));
    }



    public function showOne($id)
    {
        $prod=Products::find($id);
        return view('pages.profileP',compact('prod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $products = Products::find($id);
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->quantity_init = $request->input('quantity');
        $products->price_unit = $request->input('price');
        $products->expiration_date = $request->input('expiration_date');
        $products->update();
        return redirect()->back()->with('status','Products Updated Successfully');
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