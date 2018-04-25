@extends('templates.main')
@section('title', 'Profile')
@section('keywords', 'ข้อมูลส่วนตัว')
@section('description', 'ข้อมูลส่วนตัว')

@section('header')
    <div class="page-header page-header-mini" filter-color="blue">
        <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/bg20.jpg') }}');"></div>
        
        <div class="content-center">
                                <div class="row">
                                    <div class="col-md-8 ml-auto mr-auto">
                                        <h1 class="title" data-rellax-speed="-1">เปลี่ยนระหัสผ่าน</h1>
                                    </div>
                                </div>
                            </div>
    </div>
@endsection

@section('content')
<div class="section py-5">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col col-md-8">
                <div class="card">
                    <div class="card-body text-center px-5">
                    @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changepassword') }}">
                            {{ csrf_field() }}
    
                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="current-password" class="control-label">รหัสผ่านปัจจุบัน</label>
                                <input id="current-password" type="password" class="form-control" name="current-password" required>
    
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                            </div>
    
                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="control-label">รหัสผ่านใหม่</label>
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                                
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label for="new-password-confirm" class="control-label">ยืนยันรหัสผ่านใหม่</label>
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                        เปลี่ยนรหัสผ่าน
                                    </button>
                                
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                     <a class="btn btn-default ml-5" href="{{ url('profile') }}"><< กลับ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection
