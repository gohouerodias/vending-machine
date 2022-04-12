<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomData;
use Illuminate\Http\Request;

class RoomController extends Controller
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
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $room1 = Room::find(1);

        $room2=Room::find(2);
        $data1=RoomData::orderBy('id', 'DESC')->where('room_id','1')->first();
        $data2=RoomData::orderBy('id', 'DESC')->where('room_id','2')->first();

        return view('pages.conservation',compact('room1','room2','data1','data2'));
    }


    public function showOne($id)
    {
        $room=Room::find($id);
        $data=$room->products;
        return view('pages.profileC',compact('room','data'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $room = Room::find($id);

        $room->nom = $request->input('name');
        $room->description = $request->input('description');
        $room->update();
        return redirect()->back()->with('status','Products Updated Successfully');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}