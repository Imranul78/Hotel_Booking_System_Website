<div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>

            <div class="row">
               @foreach ($room as $rooms)
   
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img style="height:200px; width:350px" src="room/{{$rooms->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$rooms->room_title}}</h3>
                        <h4>Room No: {{$rooms->room_no}}</h4>
                        <h4>Price : {{$rooms->price}} BDT</h4>
                        <p class="text-justify">{!! Str::limit($rooms->description,170) !!}</p>
                        <a class="btn btn-primary mt-3" href="{{url('room_details',$rooms->id)}}">More Details</a>
                     </div>
                  </div>
               </div>
               @endforeach

            </div>
         </div>
      </div>