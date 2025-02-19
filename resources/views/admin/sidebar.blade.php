<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('images/logo-.png')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <a href="{{ url('home') }}"><h1 class="h5">The Grand Haven Resort</h1></a>
           
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                 <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ url('home') }}"> <i class="icon-home"></i> Home </a>
                 </li>

                 <li class="{{ Request::is('create_room') || Request::is('view_room') ? 'active' : '' }}">
                   <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"><i class="icon-windows"></i> Hotel Rooms</a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                         <li class="{{ Request::is('create_room') ? 'active' : '' }}"><a href="{{ url('create_room') }}">Add Rooms</a></li>
                         <li class="{{ Request::is('view_room') ? 'active' : '' }}"><a href="{{ url('view_room') }}">View Rooms</a></li>
                      </ul>
                 </li>             

                <li class="{{ Request::is('view_gallary') ? 'active' : '' }}">
                    <a href="{{ url('view_gallary') }}"> <i class="icon-windows"></i> Gallary </a>
                </li>

                <li class="{{ Request::is('all_messages') ? 'active' : '' }}">
                    <a href="{{ url('all_messages') }}"> <i class="icon-windows"></i> Messages </a>
                </li>
        </ul>

</nav>