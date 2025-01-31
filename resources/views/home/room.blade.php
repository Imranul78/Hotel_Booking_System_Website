<div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Single, Double and Triple Bedrooms are generous in size and appealing to the eye.
                     The accommodations at Hotel Baraka are sure to please. Our bright, spacious and well-appointed guest rooms offer a variety of floor plans to choose from with two to three single beds or queen beds. </p>
                  </div>
               </div>
            </div>

            <div class="row">
               @foreach ($room as $rooms)
   
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room card">
                     <div class="room_img">
                        <figure><img style="height:230px; width:400px" src="room/{{$rooms->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$rooms->room_title}}</h3>
                        <h4>Room No: {{$rooms->room_no}}</h4>
                        <h4> Price : {{$rooms->price}} BDT</h4>
                        <p class="text-justify">{!! Str::limit($rooms->description,170) !!}</p>
                        <a class="btn btn-primary mt-3" href="{{url('room_details',$rooms->id)}}">More Details</a>
                     </div>
                  </div>
               </div>
               @endforeach

            </div>
            
         </div>
      </div>