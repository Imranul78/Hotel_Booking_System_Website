
    <div class="card-header bg-info text-white text-center">
      <h4 class="mb-0">Booking Details</h4>
    </div>
    <div class="card-body p-4">
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark text-center text-white">
            <tr>
              <th>Booking ID</th>
              <th>Room No</th>
              <th>Room Title</th>
              <th>Customer Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Booking Date and Time</th>
              <th>Check In</th>
              <th>Check Out</th>
              <th>Price</th>
              <th>Pay Amount</th>
              <th>Status</th>
              <th>Status Update</th>
              <th>Delete</th>
              
              
            </tr>
          </thead>
          <tbody>
          
             @foreach($data as  $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->room->room_no}}</td>
              <td>{{$data->room->room_title}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->phone}}</td>
              <td>{{$data->created_at->timezone('Asia/Dhaka')->format('d M Y, h:i A')}}</td>
              <td>{{ \Carbon\Carbon::parse($data->start_date)->timezone('Asia/Dhaka')->format('d M Y') }}</td>
              <td>{{ \Carbon\Carbon::parse($data->end_date)->timezone('Asia/Dhaka')->format('d M Y') }}</td>
              <td>{{$data->room->price}} BDT</td>
              <td>{{$data->paid_amount}}</td>
              <td>

              @if($data->status == 'Approved')
              <span style="color: skyblue;">Approved</span>
              @endif

              @if($data->status == 'Rejected')
              <span style="color: red;">Rejected</span>
              @endif

              @if($data->status == 'waiting')
              <span style="color: yelLow;">Waiting</span>
              @endif

              <td> 
                <a class="btn btn-success mb-2"  href="{{url('approve_book',$data->id)}}">Approved</a>
                <a onclick="return confirm('Are you sure to Reject?');" class="btn btn-warning px-3"  href="{{url('reject_book',$data->id)}}"> Rejected </a>
              </td>

              </td>
              <td> 
                <a onclick="return confirm('Are you sure to delete?');" class="btn btn-danger mt-4"  href="{{url('delete_booking',$data->id)}}">Delete</a>
              </td>

            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>