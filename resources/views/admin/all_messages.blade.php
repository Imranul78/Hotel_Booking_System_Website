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
      <h4 class="mb-0">Messages</h4>
    </div>
    <div class="card-body p-4">
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark text-center text-white">
            <tr>
              
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Message</th>
              <th>Send Email</th>
            </tr>
          </thead>
          <tbody>
          
          @foreach ($data as $data)
            <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->phone}}</td>
              <td>{{$data->message}}</td>
              <td>
              <div class="d-flex justify-content-center align-items-center vh-100">
               <a class="btn btn-success" href="{{url('send_mail',$data->id)}}">Reply</a>
              </div>
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