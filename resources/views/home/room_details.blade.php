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

            
   
              
<div class="container">
    <div class="row">
        <!-- Room Card 1 -->
        <div class="col-12 col-md-6 mb-4">
            <div id="serv_hover" class="room border p-3">
                <div class="room_img">
                    <figure>
                        <img class="img-fluid" style="height:100%; width:100%;" src="/room/{{$room->image}}" alt="#" />
                    </figure>
                </div>
                <div class="bed_room">
                    <h3>{{$room->room_title}}</h3>
                    <h4>Room No: {{$room->room_no}}</h4>
                    <h4>Free Wifi: {{$room->wifi}}</h4>
                    <h4>Room Type: {{$room->room_type}}</h4>
                    <h4 class="fw-bold">Price: {{$room->price}} BDT</h4>
                    <p class="text-justify">{{$room->description}}</p>
                </div>
            </div>
        </div>

        <!-- Room Card 2 -->
        <div class="col-12 col-md-6 mb-4">
            <div id="serv_hover" class="room border p-3">
                


              

            </div>
        </div>
    </div>
</div>



            
         </div>
      </div>
       
      <!--  footer -->
     @include('home.footer')
   </body>
</html>