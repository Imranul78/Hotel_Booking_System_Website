<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    /* Add styling for active class */
ul.list-unstyled li.active > a {
    background-color: #007bff;
    color: #fff;
}

ul.list-unstyled li.active > a:hover {
    background-color: #0056b3;
}

   </style>
  </head>
  <body>

    @include('admin.header')

    
    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">



    <div class="card-header bg-success text-white text-center">
      <h1>Gallary</h1>
    </div>
   
    <div class="row m-3">
    
@foreach ($gallary as $gallary)


<div class="col-md-3 mb-3">
<img style="height: 200px!important; width: 260px!important; margin: 5px;" src="/gallary/{{$gallary->image}}">
<a class="btn btn-danger ml-1" href="{{url('delete_gallary', $gallary->id )}}">Delete Image</a>
</div>

@endforeach

</div>


<div class="card-body p-4">
      <form action="{{url('upload_gallary')}}" method="Post" enctype="multipart/form-data">

      @csrf

        <!-- Upload Image -->
        <div class="mb-4">
          <label class="form-label fw-bold">Upload Image</label>
          <input type="file" name="image" class="form-control border p-1" required/>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" class="btn btn-success px-5 shadow-sm">
          Add image
          </button>
        </div>
      </form>
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