<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>@yield('title') - HereKai</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Prompt:300,400,500" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" /> -->
    <!-- CSS Files -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/now-ui-dashboard.min.css') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
      @include('partials.navbar_admin')
      <div class="main-panel">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top py-4">
              <div class="container-fluid">
                  <div class="navbar-wrapper">
                      <div class="navbar-toggle">
                          <button type="button" class="navbar-toggler">
                              <span class="navbar-toggler-bar bar1"></span>
                              <span class="navbar-toggler-bar bar2"></span>
                              <span class="navbar-toggler-bar bar3"></span>
                          </button>
                      </div>
                      <div class="logo">
                            <a href="{{ url('/setting') }}">
                                <img src="{{ asset('img/herekai-v2.png') }}" alt="" class="img-rounded">
                            </a>
                        </div>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                     
                      <i class="now-ui-icons loader_gear text-white"></i>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end" id="navigation">
                      <ul class="navbar-nav">
                       <!-- Authentication Links -->
                       @auth
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link nav-link btn btn-warning btn-simple dropdown-toggle p-2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="now-ui-icons users_single-02"></i> <strong class="h5">{{ Auth::user()->username }}</strong>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('profile') }}">
                                            <i class="now-ui-icons travel_info"></i> ข้อมูลส่วนตัว
                                        </a>
                                        <a class="dropdown-item" href="{{ url('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <i class="now-ui-icons media-1_button-power"></i> ออกจากระบบ
                                            <!-- {{ __('Logout') }} -->
                                        </a>

                                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            @endauth
                      </ul>
                  </div>
              </div>
          </nav>
          <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        @yield('content')
      </div>
        @include('partials.footer')
      </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('dashboard/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard/js/now-ui-dashboard.js?v=1.0.1') }}"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <!-- <script src="{{ asset('dashboard/demo/demo.js') }}"></script> -->

 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>

<script>
    $(document).ready( function () {
        $('#rewardTable').DataTable({
            "order": [0, 'desc']
        });
    } );
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

  </body>
</html>
