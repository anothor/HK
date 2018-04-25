    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-cloud fixed-top navbar-transparent" color-on-scroll="200">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/herekai-v2.png') }}" alt="" class="img-rounded">
                        <!-- <h2>HereKai</h2> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                    
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link btn btn-info" href="{{ url('login') }}">
                                <h5 class="m-0"><i class="now-ui-icons sport_user-run"></i> เข้าสู่ระบบ</h5>
                                </a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning btn-simple py-1" href="#" >
                                <h3 class="m-0">฿{{ Auth::user()->money }}</h3>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle btn btn-info" id="navbarDropdownMenuLink" data-toggle="dropdown">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>{{ Auth::user()->username }}</p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ url('home') }}">
                                    <i class="now-ui-icons sport_user-run"></i> เข้าเล่นเกม
                                </a>
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    <i class="now-ui-icons travel_info"></i> ข้อมูลส่วนตัว
                                </a>
                                @if(Auth::user()->is_admin)
                                    <a class="dropdown-item" href="{{ url('setting') }}">
                                    <i class="now-ui-icons ui-1_settings-gear-63"></i> ตั้งค่าระบบ
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="now-ui-icons media-1_button-power"></i> ออกจากระบบ
                                </a>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }} 
                                        </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
