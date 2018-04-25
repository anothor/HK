<!-- Navbar -->
<nav class="navbar navbar-toggleable-md bg-white fixed-top navbar-transparent" color-on-scroll="200">
    <div class="container">
        <div class="navbar-translate">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/herekai-v2.png') }}" alt="logo" class="img-rounded">
                <!-- <h2>HereKai</h2> -->
            </a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" data-color="blue">
            <ul class="navbar-nav">

              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a id="btn-play-now" class="nav-link btn btn-info px-4" href="{{ route('login') }}">
                          <p><i class="now-ui-icons sport_user-run"></i> เข้าสู่ระบบ</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a id="btn-topup" class="nav-link btn btn-success px-4" href="{{url('/topup')}}">
                          <p><i class="now-ui-icons business_money-coins"></i> เติมเงิน</p>
                      </a>
                  </li>
                    <!-- <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li> -->
                    <!-- <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> -->
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
