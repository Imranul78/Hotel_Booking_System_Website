 <!-- header inner -->
 <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="{{url('/')}}"><img src="{{asset('images/logo-.png')}}" alt="" class="img-fluid" style="max-width: 150px; height: 70px;"/></a>
                               
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">

                           <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                          <a class="nav-link" href="{{ url('/') }}">Home</a>
                             </li>
                        <li class="nav-item {{ Request::is('our_rooms') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('our_rooms') }}">Our Room</a>
                       </li>
                       <li class="nav-item {{ Request::is('hotel_gallary') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('hotel_gallary') }}">Gallery</a>
                         </li>
                      <!-- <li class="nav-item {{ Request::is('h_blog') ? 'active' : '' }}">
                       <a class="nav-link" href="{{ url('h_blog') }}">Blog</a>
                       </li> -->
                      
                       <li class="nav-item {{ Request::is('contact_us') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ url('contact_us') }}">Contact Us</a>
                     </li>

                     <li class="nav-item {{ Request::is('history') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ url('history') }}">History</a>
                     </li>


                     @if (Route::has('login'))
                          @auth
                        <li class="nav-item" style="margin-top: -15px;">
                            <x-app-layout></x-app-layout>
                        </li>
                    @else
                        <li class="nav-item" style="margin: 2px 0px 0px 20px;">
                            <a class="btn btn-success" href="{{url('login')}}">LOGIN</a>
                        </li>
                
                        @if (Route::has('register'))
                            <li class="nav-item" style="margin: 2px 0px 0px 20px;">
                                <a class="btn btn-primary" href="{{url('register')}}">REGISTER</a>
                            </li>
                        @endif
                    @endauth
                    @endif


                           </ul>
                        </div>
                        
                     </nav>
                  </div>
               </div>
            </div>
         </div>