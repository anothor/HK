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

                <div class="collapse navbar-collapse" data-color="blue">

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
                            <a class="nav-link btn btn-warning btn-simple" href="{{ url('profile') }}">
                            <h5 class="m-0"><i class="now-ui-icons users_single-02"></i>
                                {{ Auth::user()->username }}</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-info" href="{{ url('home') }}" data-toggle="tooltip" data-placement="bottom" title="เข้าเล่นเกม" >
                                <i class="now-ui-icons sport_user-run"></i> <p class="d-lg-none">เข้าเล่นเกม</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="{{ url('logout') }}" data-toggle="tooltip" data-placement="bottom" title="ออกจากระบบ" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                <i class="now-ui-icons media-1_button-power"></i> <p class="d-lg-none">ออกจากระบบ</p>
                                <!-- {{ __('Logout') }} -->
                            </a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }} 
                                </form>
                        </li>
                    @endguest
                    </ul>
                </div>

            </div>
        </nav>
        <!-- End Navbar -->
