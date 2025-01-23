<!DOCTYPE html>
<html>
  <head> 

  <base href="/public">
   @include('admin.css')

  </head>
  <body>

    @include('admin.header')

    
    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    
      
 <div class="page-content">

<div class="container mt-5">
  <div class="card shadow-lg border-0">
    <div class="card-header bg-success text-white text-center">
      <h4 class="mb-0">Update Room</h4>
    </div>
    <div class="card-body p-4">
      <form action="{{url('edit_room', $data->id)}}" method="Post" enctype="multipart/form-data">

      @csrf

        <!-- Room No -->
        <div class="mb-4">
          <label class="form-label fw-bold">Room No</label>
          <input type="text" name="No" required value="{{$data->room_no}}" class="form-control border " placeholder="Enter room number"/>
        </div>

        <!-- Room Title -->
        <div class="mb-4">
          <label class="form-label fw-bold">Room Title</label>
          <input
            type="text" name="title" required value="{{$data->room_title}}" class="form-control border" placeholder="Enter room title"/>
        </div>

        <!-- Description -->
        <div class="mb-4">
          <label class="form-label fw-bold">Description</label>
          <textarea name="description" required class="form-control border" rows="3" placeholder="Enter room description">{{$data->description}}</textarea>
        </div>

        <!-- Price -->
        <div class="mb-4">
          <label class="form-label fw-bold">Price</label>
          <input type="number" name="price" required value="{{$data->price}}" class="form-control border" placeholder="Enter price"
          />
        </div>

        <!-- Room Type -->
        <div class="mb-4">
          <label class="form-label fw-bold">Room Type</label>
          <select name="type" required class="form-select border">

           <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>

            <option value="regular">Regular</option>
            <option value="premium">Premium</option>
            <option value="deluxe">Deluxe</option>
          </select>
        </div>

        <!-- Free Wifi -->
        <div class="mb-4">
          <label class="form-label fw-bold">Free Wifi</label>
          <select name="wifi" required class="form-select border">

          <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>

        <!-- Upload Image -->

        <div class="mb-4">
          <label class="form-label fw-bold">Current Image</label>
          <img width="100" height="100" src="/room/{{$data->image}}" alt="">
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold">Upload Image</label>
          <input type="file" name="image" class="form-control border p-1"/>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" class="btn btn-success px-5 shadow-sm">
            Update Room
          </button>
        </div>
      </form>
    </div>
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