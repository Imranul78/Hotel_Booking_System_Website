<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking_room;

class HomeController extends Controller
{
    
public function room_details($id)
{
    $room = Room::find($id);
    return view('home.room_details',compact('room'));
}


public function add_booking(Request $request, $id){

      $data = new Booking_room;

      $data->room_id = $id;

      $data->name = $request->name;

      $data->email = $request->email;

      $data->phone = $request->phone;

      $data->start_date = $request->startDate;

      $data->end_date = $request->endDate;

      $data->paid_amount = $request->paid_amount;

      $data->save();

      return redirect()->back()->with('message','Room Booked Successfully');




}







}
