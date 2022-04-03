<?php

namespace App\Http\Controllers;

use App\Models\SellEvent;
use Illuminate\Http\Request;

class SellEventController extends Controller
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
     * @param  \App\Models\SellEvent  $sellEvent
          */
    public function show(SellEvent $sellEvent)
    {
     $historique=SellEvent::orderBy('id','desc')->paginate(2);

     return view('pages.historique',['historique'=>$historique]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellEvent  $sellEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(SellEvent $sellEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellEvent  $sellEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellEvent $sellEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellEvent  $sellEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellEvent $sellEvent)
    {
        //
    }
}