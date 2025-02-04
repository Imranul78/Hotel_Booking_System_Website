<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
     @include('home.css')

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->

      <!-- header -->
      <header>
        @include('home.header')
      </header>
      <!-- end header -->
       
      <div class="container mt-4 px-4 py-3" style="max-width: 600px; background: rgba(0, 0, 0, 0.6); border-radius: 10px;">
         <h2 class="text-white text-center">Check Room Availability</h2>
         <form action="{{ route('rooms.checkAvailability') }}" method="GET" class="row g-3">
            <div class="col-md-6">
               <label for="start_date" class="form-label text-white">Check In</label>
               <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="col-md-6">
               <label for="end_date" class="form-label text-white">Check Out</label>
               <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <div class="col-12">
               <button type="submit" class="btn btn-primary w-100 mt-3">Check Availability</button>
            </div>
         </form>
      </div>
   </div>

   
      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               <div class="d-flex justify-content-between align-items-center mb-3">
               <h1 class="h2 fw-bold">Available Rooms from {{ $startDate }} to {{ $endDate }}</h1>
               </div>
            </div>

            @if($availableRooms->isEmpty())
        <div class="alert alert-danger">No rooms available for the selected dates, please try different dates.</div>
        @else
            <div class="row">
               @foreach ($availableRooms as $room)
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room card">
                     <div class="room_img">
                        <figure><img style="height:230px; width:400px" src="room/{{$room->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <h4>Room No: {{$room->room_no}}</h4>
                        <h4> Price : {{$room->price}} BDT</h4>
                        <p class="text-justify">{!! Str::limit($room->description,170) !!}</p>
                        <a class="btn btn-primary mt-3" href="{{url('room_details',$room->id)}}">More Details</a>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            
            @endif



         </div>
      </div>  
      <!--  footer -->
     @include('home.footer')
   </body>
</html>