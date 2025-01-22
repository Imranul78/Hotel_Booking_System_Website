<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

use App\Models\Booking_room;

use App\Models\Gallary;



class AdminController extends Controller
{
    

    public function index()
    {

      if(Auth::id())
      {
          $usertype = Auth()->user()-> usertype;

          if($usertype == 'user')
          {
            $room = Room::all();

            return view('home.index',compact('room'));
          
          }

          else if($usertype == 'admin')
          {
            return view('admin.index');
          }

          else {
            return redirect()->back();
          }


      }

    }

public function home()
{

  $room = Room::all();

  return view('home.index',compact('room'));
}

public function create_room(){
  return view('admin.create_room');
}


public function add_room(Request $request)
{
  $data = new Room;

  $data->room_no = $request->No;
  $data->room_title = $request->title;
  $data->description = $request->description;
  $data->price = $request->price;
  $data->wifi = $request->wifi;
  $data->room_type = $request->type;
  
  $image=$request->image;
  if($image)
  {
    $imagename=time().'.'.$image->getClientOriginalExtension();

    $request->image->move('room',$imagename);

    $data->image=$imagename;

  }


  $data->save();

  return redirect()->back();
  
}

public function view_room(){

 $data = Room::all();

  return view('admin.view_room', compact('data'));
}

public function room_delete($id){

  $data = Room::find($id);

  $data->delete();

  return redirect()->back();

}

public function room_update($id){

  $data = Room::find($id);

  return view('admin.update_room',compact('data'));

}

public function edit_room(Request $request, $id)
{
  $data = Room::find($id);

  $data->room_no = $request->No;
  $data->room_title = $request->title;
  $data->description = $request->description;
  $data->price = $request->price;
  $data->wifi = $request->wifi;
  $data->room_type = $request->type;


  $image=$request->image;
  if($image)
  {
    $imagename=time().'.'.$image->getClientOriginalExtension();

    $request->image->move('room',$imagename);

    $data->image=$imagename;

  }

  
  $data->save();

  return redirect()->back();
  
}


public function bookings(){

  $data = Booking_room::all();
  
  return view('admin.booking',compact('data'));
}



public function delete_booking($id){

  $data = Booking_room::find($id);

  $data->delete();

  return redirect()->back();

}

public function approve_book($id){

  $booking = Booking_room::find($id);
  
  $booking->status='Approved';
  $booking->save();
  return redirect()->back();
}


public function reject_book($id){

  $booking = Booking_room::find($id);
  
  $booking->status='Rejected';
  $booking->save();
  return redirect()->back();
}



public function view_gallary(){

  $gallary = Gallary::all();

  return view('admin.gallary', compact('gallary'));
}


public function upload_gallary(request $request){

  
$data = new Gallary;

$image = $request->image;

  if($image)
  {
    $imagename=time().'.'.$image->getClientOriginalExtension();

    $request->image->move('Gallary',$imagename);

    $data->image=$imagename;

    $data->save();

    return redirect()->back();

  }
  
}


public function delete_gallary($id){
  $data = Gallary::find($id);
  $data->delete();
  return redirect()->back();

}






}
