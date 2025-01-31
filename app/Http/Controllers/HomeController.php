<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking_room;

use App\Models\Contact;

use App\Models\Gallary;

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

      $data->paid_amount = $request->paid_amount;


    
      $startDate = $request->startDate;

      $endDate = $request->endDate;

      $isBooked = booking_room::where('room_id', $id)
      ->where('start_date', '<', $endDate)
      ->where('end_date', '>', $startDate)
      ->where('status', '!=', 'rejected') // Exclude rejected bookings
      ->exists();
  
  if ($isBooked) {
      return redirect()->back()->with([
          'message' => 'Sorry, this room is already booked for the selected dates, please try different dates.',
          'status' => 'warning'
      ]);
  } else {
      $data->start_date = $request->startDate;
      $data->end_date = $request->endDate;
      $data->save();
      
      return redirect()->back()->with([
          'message' => 'Your booking has been successfully confirmed. Thank you for choosing our service!',
          'status' => 'success'
      ]);
  }
   
}


public function contact(Request $request){

$contact = new Contact;

$contact->name = $request->name;
$contact->email = $request->email;
$contact->phone = $request->phone;
$contact->message = $request->message;

$contact-> save();

return redirect()->back()->with('message', 'Message Sent Successfully!');

}




public function our_rooms(){
  $room = Room::all();
  return view('home.our_rooms', compact('room'));
}


public function hotel_gallary(){
    $gallary = Gallary::all();
    return view('home.hotel_gallary', compact('gallary'));
  }



public function contact_us(){
    return view('home.contact_us');
}

public function h_blog(){
    return view('home.h_blog');
}



}


