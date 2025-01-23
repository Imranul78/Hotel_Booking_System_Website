<div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>

                  @if (session()->has('message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{ session()->get('message') }}
                 </div>
                 @endif


               </div>
            </div>
            <div class="row">
               <div class="col-md-6">

                  <form id="request" class="main_form" action="{{url('contact')}}" method="post">

                  @csrf
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="type" name="name" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="email" name="email" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" name="message" required ></textarea>
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>

               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/place/Shewrapara/@23.7909652,90.3667223,15z/data=!4m6!3m5!1s0x3755c734c7c43a49:0xc015d831a1def368!8m2!3d23.790966!4d90.375476!16s%2Fg%2F11kjgqr8dt?authuser=0&entry=ttu&g_ep=EgoyMDI0MTAyOS4wIKXMDSoASAFQAw%3D%3D" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>