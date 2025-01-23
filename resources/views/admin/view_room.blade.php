<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
  </head>
  <body>

    @include('admin.header')

    
    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    
      
      <div class="page-content">

    <div class="card-header bg-info text-white text-center">
      <h4 class="mb-0">Room Details</h4>
    </div>
    <div class="card-body p-4">
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark text-center text-white">
            <tr>
              
              <th>Room No</th>
              <th>Room Title</th>
              <th>Description</th>
              <th>Price</th>
              <th>Wifi</th>
              <th>Room Type</th>
              <th>Image</th>
              <th>Delete</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
          
          @foreach ($data as $data)
            <tr>
              <td>{{$data->room_no}}</td>
              <td>{{$data->room_title}}</td>
              <td>{!! Str::limit($data->description,100) !!}</td>
              <td>{{$data->price}} BDT</td>
              <td>{{$data->wifi}}</td>
              <td>{{$data->room_type}}</td>
              <td>
                <img width="60" height="70" src="room/{{$data->image}}" alt="Not Found">
              </td>
              <td> 
                <a onclick="return confirm('Are you sure to delete?');" class="btn btn-danger"  href="{{url('room_delete',$data->id)}}">Delete</a>
              </td>
              <td> 
                <a class="btn btn-warning"  href="{{url('room_update',$data->id)}}">Update</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>



       <!-- footer start -->
        @include('admin.footer')
        <!-- footer end -->
      </div>
    </div>
    
      <!-- JavaScript files-->
   @include('admin.js')
   
  </body>
</html>