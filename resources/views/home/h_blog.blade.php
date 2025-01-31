<!DOCTYPE html>
<html lang="en">
   <head>

     @include('home.css')

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif"/></div>
      </div>
      <!-- end loader -->

      <!-- header -->
      <header>
        @include('home.header')
      </header>
      <!-- end header -->

      <!-- blog -->
      @include('home.blog')
      <!-- end blog -->

       
      <!--  footer -->
     @include('home.footer')

 
   </body>
</html>