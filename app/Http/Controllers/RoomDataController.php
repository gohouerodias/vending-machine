<?php

namespace App\Http\Controllers;

use App\Models\RoomData;
use Illuminate\Http\Request;

class RoomDataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          return view('pages.conservation');
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
     * @param  \App\Models\RoomData  $roomData
     * @return \Illuminate\Http\Response
     */
    public function show(RoomData $roomData)
    {
        //

    }

     public function showAll()
    {
        //
          $data=RoomData::get();
        return view('pages.conservation',compact('data'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomData  $roomData
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomData $roomData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomData  $roomData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomData $roomData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomData  $roomData
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomData $roomData)
    {
        //
    }
}
