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
      <h4 class="mb-0"> Mail send to {{$data->name}} </h4>
    </div>
    <div class="card-body p-4">
     
    <form action="{{url('mail',$data->id)}}" method="Post">

      @csrf

        <div class="mb-4">
          <label class="form-label fw-bold">Greeting</label>
          <input
            type="text" name="greeting" required  class="form-control border" placeholder=""/>
        </div>

       
        <div class="mb-4">
          <label class="form-label fw-bold">Body</label>
          <textarea name="body" required class="form-control border" rows="3" placeholder=""></textarea>
        </div>

    
        <div class="mb-4">
          <label class="form-label fw-bold">Action Text</label>
          <input type="text" name="action_text" required class="form-control border" placeholder=""
          />
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold">Action Url</label>
          <input type="text" name="action_url" required class="form-control border" placeholder=""
          />
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold">End Line</label>
          <input type="text" name="endline" required class="form-control border" placeholder=""
          />
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" class="btn btn-success px-5 shadow-sm">
            Send
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
   <script>
  // Check if there is a success message
  @if(session('success'))
    // Hide the success message after 2 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.classList.remove('show');
            successMessage.classList.add('fade');
        }
    }, 5000);  // 2000 milliseconds = 2 seconds
  @endif
</script>

  </body>
</html>