<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking_room;

use App\Models\Contact;

use App\Models\Gallary;
use DeepCopy\f008\B;

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

      $data->user_id = $request->user_id;

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




public function history() {
    $history = Booking_room::where('user_id', Auth::id())->get(); 
    return view('home.history', compact('history'));
}


public function checkAvailability(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $request->validate([
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ]);

    // Query rooms that are not booked during the selected dates
    // and exclude rooms with rejected bookings
    $availableRooms = Room::whereDoesntHave('bookings', function ($query) use ($startDate, $endDate) {
        $query->where(function ($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                  ->orWhereBetween('end_date', [$startDate, $endDate])
                  ->orWhere(function ($query) use ($startDate, $endDate) {
                      $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                  });
        })
        ->where('status', '!=', 'Rejected'); // Exclude rejected bookings
    })->get();

    return view('home.available-rooms', compact('availableRooms', 'startDate', 'endDate'));
}



}