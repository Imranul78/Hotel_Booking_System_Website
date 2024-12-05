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

      <!-- main body part start-->
     @include("admin.mainbody")

    <!-- main body part end-->

       <!-- footer start -->
        @include('admin.footer')
        <!-- footer end -->
      </div>
    </div>
    
      <!-- JavaScript files-->
   @include('admin.js')
   
  </body>
</html>