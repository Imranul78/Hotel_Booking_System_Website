<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('home.css')

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   </head>
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

      <div class="our_room">
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
                           <p>Room No: {{$room->room_no}}</p>
                           <p>Free Wifi: {{$room->wifi}}</p>
                           <p>Room Type: {{$room->room_type}}</p>
                           <h4 id="price" class="fw-bold fs-4">Price Per Room/Night: <span id="roomPrice">{{$room->price}}</span> BDT</h4>
                           <p class="text-justify">{{$room->description}}</p>
                        </div>
                     </div>
                  </div>

                  <!-- Room Booking Form -->
                  <div class="col-12 col-md-6">
                     <div class="card-body p-4">
                        <h1 class="h2 fw-bold">Book Room</h1>

                       <div>
            @if (session('message'))
                         <div class="alert @if(session('status') === 'success') alert-success @elseif(session('status') === 'warning') alert-warning @endif alert-dismissible fade show" role="alert">
                             <strong>@if(session('status') === 'success') @elseif(session('status') === 'warning') @endif</strong> {{ session('message') }}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         @endif

                       </div>  

                        <form action="{{url('add_booking',$room->id)}}" method="Post" id="bookingForm">

                        @csrf
                           <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" id="name" name="name" class="form-control rounded" placeholder="Enter your name" 
                              @if (Auth::id())
                              value="{{Auth::user()->name}}"
                              @endif>
                           </div>

                           <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" id="email" name="email" class="form-control rounded" placeholder="Enter your email address"
                              @if (Auth::id())
                              value="{{Auth::user()->email}}"
                              @endif>
                           </div>

                           <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="number" id="phone" name="phone" class="form-control rounded" placeholder="Enter your phone number"
                              @if (Auth::id())
                              value="{{Auth::user()->phone}}"
                              @endif>
                           </div>

                           <div class="mb-3">
                              <label for="startDate" class="form-label">Check in</label>
                              <input type="date" id="startDate" name="startDate" class="form-control rounded">
                           </div>

                           <div class="mb-3">
                              <label for="endDate" class="form-label">Check out</label>
                              <input type="date" id="endDate" name="endDate" class="form-control rounded">
                           </div>

                           <div class="mb-3">
                              <h3 class="fw-bold fs-4"> Total Amount : <input type="text" id="totalAmount" name="paid_amount" readonly class="border-0 bg-transparent fw-bold fs-4" ></h3>  
                           </div>

                           <p id="errorMessage" class="text-danger" style="display: none;">🚫 **End Date must be after Start Date!**</p>

                           <div>

                           <h5>How to Make Payment</h5>
                           <p class="text-justify"> "To confirm the booking, you need to pay 50% of the total amount. Confirming your booking, we will contact you via phone or email to finalize your booking confirmation."</p>
                           </div>

                           <div class="text-center">
                              <button type="submit" class="btn btn-success px-5 w-100 shadow-sm">Book Now</button>
                           </div>
                        </form>
                     </div>
                  </div>

               </div>
            </div>

         </div>
      </div>
       
      <!--  footer -->
      @include('home.footer')

      <script>
         document.addEventListener("DOMContentLoaded", () => {
            const dtToday = new Date();

            let month = dtToday.getMonth() + 1;
            let day = dtToday.getDate();
            const year = dtToday.getFullYear();

            if (month < 10) month = `0${month}`;
            if (day < 10) day = `0${day}`;

            const minDate = `${year}-${month}-${day}`;
            document.getElementById('startDate').setAttribute('min', minDate);
            document.getElementById('endDate').setAttribute('min', minDate);



            const startDateInput = document.getElementById('startDate');
            const endDateInput = document.getElementById('endDate');
            const totalAmountInput = document.getElementById('totalAmount');
            const roomPrice = parseFloat(document.getElementById('roomPrice').textContent);
            const errorMessage = document.getElementById('errorMessage');
            const bookingForm = document.getElementById('bookingForm');

            function updateEndDateMin() {
                const startDate = new Date(startDateInput.value);
                if (!isNaN(startDate)) {
                    startDate.setDate(startDate.getDate() + 1);
                    const minEndDate = startDate.toISOString().split('T')[0];
                    endDateInput.setAttribute('min', minEndDate);
                }
            }

            function calculateTotalAmount() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (startDate && endDate && startDate < endDate) {
                    const timeDifference = endDate - startDate;
                    const totalDays = Math.ceil(timeDifference / (1000 * 60 * 60 * 24)); 
                    const totalAmount = totalDays * roomPrice;
                    totalAmountInput.value = totalAmount + ' BDT';
                    errorMessage.style.display = 'none';
                } else {
                    totalAmountInput.value = '';
                    errorMessage.style.display = 'block';
                }
            }

            function validateForm(event) {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (startDate >= endDate) {
                    errorMessage.style.display = 'block';
                    event.preventDefault(); 
                }
            }

            startDateInput.addEventListener('change', () => {
                updateEndDateMin();
                calculateTotalAmount();
            });

            endDateInput.addEventListener('change', calculateTotalAmount);
            bookingForm.addEventListener('submit', validateForm);
         });

      </script>





      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

   </body>
</html>
