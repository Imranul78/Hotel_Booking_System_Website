

<!DOCTYPE html>
<html lang="en">
   <head>

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

     
    <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h2 fw-bold">Booking History</h1>
    </div>

    
   

    <!-- Booking History Table -->
    <div class="table-responsive">
        @if ($history->isNotEmpty()) 
        

    <div class="row">
        <!-- User Info Section -->
        <div class="col-md-6  p-3 rounded">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>

        <!-- Payment Info Section -->
        <div class="col-md-6 p-3 rounded">
            <h1 class="text-dark"><strong>How to Make Payment</strong></h1>
            <p class="text-justify">
                "To confirm the booking, you need to pay <strong>50% of the total amount</strong>. 
                After confirming your booking, we will contact you via phone or email to finalize your booking confirmation."
            </p>
        </div>


            <!-- history table-->
            </div>
            <table class="table table-bordered table-striped table-hover shadow">
                <thead class="bg-info text-white">
                    <tr class="text-center">
                        <th>Booking ID</th>
                        <th>Room No</th>
                        <th>Room Title</th>
                        <th>Booking Date and Time</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Price</th>
                        <th>Pay Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $item)
                    <tr class="text-center">
                        <td class="fw-bold">{{ $item->id }}</td>
                        <td>{{ $item->room->room_no }}</td>
                        <td>{{ $item->room->room_title }}</td>
                        <td>{{ $item->created_at->timezone('Asia/Dhaka')->format('d M Y, h:i A')}}</td>
                        <td>{{ \Carbon\Carbon::parse($item->start_date)->timezone('Asia/Dhaka')->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->end_date)->timezone('Asia/Dhaka')->format('d M Y') }}</td>
                        <td class="text-success fw-bold">{{ $item->room->price }} BDT</td>
                        <td class="text-success fw-bold">{{ $item->paid_amount }} BDT</td>
                        <td>
                            @if($item->status == 'Approved')
                                <span class="badge bg-success">Confirmed</span>
                            @elseif($item->status == 'Rejected')
                                <span class="badge bg-danger text-dark">Rejected</span>
                                @elseif($item->status == 'waiting')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info text-center shadow-lg">
                <h4 class="mb-2">No Booking History Found</h4>
                <p>You haven’t booked any rooms yet. Start exploring our rooms and make your first booking today!</p>
                <a href="{{ url('our_rooms') }}" class="btn btn-primary mt-2">Book Rooms</a>
            </div>
        @endif
    </div>





</div>
      <!--  footer -->
     @include('home.footer')

     <script>
      $(window).on('scroll', function () {
      sessionStorage.setItem('scrollTop', $(this).scrollTop());
      });

       $(document).ready(function () {
     const scrollTop = sessionStorage.getItem('scrollTop');
      if (scrollTop !== null) {
      $(window).scrollTop(scrollTop);
     }
      });

     </script>

   </body>
</html>



















