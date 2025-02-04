<section class="banner_main d-flex align-items-center justify-content-center position-relative" style="height: 100vh;">
   <div id="myCarousel" class="carousel slide w-100 h-100" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner h-100">
         <div class="carousel-item active h-100">
            <img class="d-block w-100 h-100 img-fluid" style="object-fit: cover;" src="images/banner1.jpg" alt="First slide">
         </div>
         <div class="carousel-item h-100">
            <img class="d-block w-100 h-100 img-fluid" style="object-fit: cover;" src="images/banner2.jpg" alt="Second slide">
         </div>
         <div class="carousel-item h-100">
            <img class="d-block w-100 h-100 img-fluid" style="object-fit: cover;" src="images/banner3.jpg" alt="Third slide">
         </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>

   <!-- Centered Text and Availability Form -->
   <div class="position-absolute w-100 text-center px-3" style="top: 50%; transform: translateY(-50%);">
      <h1 class="text-white font-weight-bold responsive-heading"
         style="text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8); font-family: 'Georgia', serif; letter-spacing: 2px; font-size: 32px;">
         Book online to get the best price and best availability offer
      </h1>
      <p class="text-white mt-3"
         style="font-size: 1.25rem; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.6);">
         Experience luxury like never before
      </p>

      <a href="{{ url('our_rooms') }}" class="btn btn-dark btn-lg mt-4"
         style="font-size: 13px; text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);">
         View Rooms >
      </a>

      <!-- Availability Form -->
      <div class="container mt-4 px-4 py-3" style="max-width: 600px; background: rgba(0, 0, 0, 0.6); border-radius: 10px;">
         <h2 class="text-white">Check Room Availability</h2>
         <form action="{{ route('rooms.checkAvailability') }}" method="GET" class="row g-3">
            <div class="col-md-6">
               <label for="start_date" class="form-label text-white">Check In</label>
               <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="col-md-6">
               <label for="end_date" class="form-label text-white">Check Out</label>
               <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <div class="col-12">
               <button type="submit" class="btn btn-primary w-100 mt-3">Check Availability</button>
            </div>
         </form>
      </div>
   </div>
</section>

