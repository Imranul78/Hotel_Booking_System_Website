<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    /* Add styling for active class */
/* ul.list-unstyled li.active > a {
    background-color: #007bff;
    color: #fff;
}

ul.list-unstyled li.active > a:hover {
    background-color: #0056b3;
} */

   </style>
  </head>
  <body>

    @include('admin.header')

    
    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    
      
      <div class="page-content">

      <!-- main body part start-->
     @include("admin.booking")

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