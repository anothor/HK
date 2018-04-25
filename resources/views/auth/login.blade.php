@extends('layouts.app')

@section('content')
<div class="login-page container">
  <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-login card-plain">

          <form method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
                <div class="header header-primary text-center">
                    <div class="logo-login mb-4">
                      <a href="{{ url('/') }}">
                        <img src="{{ asset('img/herekai-v2.png') }}" alt="HereKai" class="img-rounded">
                      </a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="input-group form-group-no-border input-lg">
                        <span class="input-group-addon">
                            <i class="now-ui-icons users_single-02"></i>
                        </span>
                        <!-- <input type="text" class="form-control" placeholder="First Name..."> -->
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autofocus>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group form-group-no-border input-lg mb-0">
                        <span class="input-group-addon">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                        </span>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('รหัสผ่าน') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>
                <div class="footer text-center">
                    <button type="submit" class="btn btn-info btn-round btn-lg btn-block">
                        {{ __('เข้าสู่ระบบ') }}
                    </button>
                </div>
                <div class="pull-left">
                </div>
                <div class="pull-right">
                    <h6>
                        <a class="link footer-link" href="{{ route('register') }}">{{ __('สมัครสมาชิก') }}</a>
                    </h6>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
